<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    
    public function index()
    {
        $rooms = rooms::get();
        return view('rooms.index', compact('rooms'));
    }

    
    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'roomName' => 'required',
            'roomCapacity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'  
        ]);

        $rooms = new Rooms;
        $rooms->roomName = $request->input('roomName');
        $rooms->roomCapacity = $request->input('roomCapacity');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room-images', 'public');
            $rooms->image = $imagePath;
        }

        $rooms->save();

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }


    public function show(rooms $rooms, $id)
    {
        $rooms = rooms::find($id);
        return view('rooms.show', compact('rooms'));
    }


    public function edit($id)
    {
        $rooms = rooms::findOrFail($id);
        return view('rooms.edit', compact('rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'roomName' => 'required',
            'roomCapacity' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $rooms = Rooms::findOrFail($id);
        
        if ($request->hasFile('image')) {
            try {
                
                \Log::info('Old image path: ' . $rooms->image);
                
                if ($rooms->image && Storage::disk('public')->exists($rooms->image)) {
                    Storage::disk('public')->delete($rooms->image);
                    \Log::info('Old image deleted');
                }
                
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                
                \Log::info('Attempting to store file: ' . $fileName);
                
                $filePath = $file->storeAs('room-images', $fileName, 'public');
                
                \Log::info('File stored at: ' . $filePath);
                
                $rooms->image = $filePath;
                
                \Log::info('Model image path updated to: ' . $rooms->image);
                
            } catch (\Exception $e) {
                \Log::error('Image upload failed: ' . $e->getMessage());
                return back()->with('error', 'Failed to upload image: ' . $e->getMessage());
            }
        }
    
        $rooms->roomName = $request->roomName;
        $rooms->roomCapacity = $request->roomCapacity;
        
        try {
            $rooms->save();
            \Log::info('Room saved successfully with image: ' . $rooms->image);
        } catch (\Exception $e) {
            \Log::error('Save failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to save room: ' . $e->getMessage());
        }
    
        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully');
    }


    public function destroy($id)
    {
        $rooms = rooms::findOrFail($id);

        // Delete associated image if exists
        if ($rooms->image) {
            Storage::disk('public')->delete($rooms->image);
        }

        $rooms->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
