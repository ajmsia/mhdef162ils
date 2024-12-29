<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = rooms::get();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'roomName' => 'required',
            'roomCapacity' => 'required|numeric',
            'image' => 'required|image|mips:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $room = new Room;
        $room->roomName = $request->roomName;
        $room->roomCapacity = $request->roomCapacity;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room-images', 'public');
            $room->image = $imagePath;
        }

        $room->save();

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(rooms $rooms, $id)
    {
        $rooms = rooms::find($id);
        return view('rooms.show', compact('rooms'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rooms = rooms::findOrFail($id);
        return view('rooms.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
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
                // Debug old image
                \Log::info('Old image path: ' . $rooms->image);
                
                // Delete old image if exists
                if ($rooms->image && Storage::disk('public')->exists($rooms->image)) {
                    Storage::disk('public')->delete($rooms->image);
                    \Log::info('Old image deleted');
                }
                
                // Store new image
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                
                // Debug storage path
                \Log::info('Attempting to store file: ' . $fileName);
                
                // Try to store and get the path
                $filePath = $file->storeAs('room-images', $fileName, 'public');
                
                // Debug the returned path
                \Log::info('File stored at: ' . $filePath);
                
                // Update the model
                $rooms->image = $filePath;
                
                // Debug the model update
                \Log::info('Model image path updated to: ' . $rooms->image);
                
            } catch (\Exception $e) {
                \Log::error('Image upload failed: ' . $e->getMessage());
                return back()->with('error', 'Failed to upload image: ' . $e->getMessage());
            }
        }
    
        $rooms->roomName = $request->roomName;
        $rooms->roomCapacity = $request->roomCapacity;
        
        // Debug final save
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


    /**
     * Remove the specified resource from storage.
     */
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
