<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use Illuminate\Http\Request;

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
        $roomsData = $request->validate([
            'roomName' => 'required|string|max:50',
            'roomCapacity' => 'required|integer|max:500',
        ]);

        rooms::create($roomsData);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(rooms $rooms)
    {
        //
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
        $rooms = rooms::findOrFail($id);
        
        $roomsData = $request->validate([
            'roomName' => 'required|string|max:50',
            'roomCapacity' => 'required|integer|max:500',
        ]);

        $rooms->update($roomsData);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rooms = rooms::findOrFail($id);
        $rooms->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
