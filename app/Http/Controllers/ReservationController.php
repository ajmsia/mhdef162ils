<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Models\Rooms;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservations::with('rooms')->get();
        $rooms = Rooms::all(); 
        return view('reservations.index', compact('reservations', 'rooms'));
    }

    public function create() // For librarian view of reservation form //
    {
        $rooms = Rooms::all(); 
        return view('reservations.create', compact('rooms'));
    }

    public function usercreate() // For user view of reservation form //
    {
        $rooms = Rooms::all(); 
        return view('reservations.usercreate', compact('rooms'));
    }

    // Updated store method with custom validation and logic
    public function store(Request $request)
    {
        // Validate and save the reservation
        $validatedData = $request->validate([
            'userFirstName' => 'required|string|max:255',
            'userLastName' => 'required|string|max:255',
            'userMiddleName' => 'nullable|string|max:255',
            'upmail' => 'required|email|max:255',
            'userType' => 'required|string',
            'college' => 'required|string',
            'roomID' => 'required|integer',
            'reserveTime' => 'required|string',
            'reserveDate' => 'required|date',
            'purpose' => 'required|string',
        ]);

        // Create the reservation using the validated data
        Reservations::create($validatedData);

        // Redirect to appropriate page with a success message
        return redirect()->route('reservations.usercreate')->with('success', 'Reservation successfully added!');
    }

    public function show(Reservations $reservations, $id) 
    {
        $reservation = Reservations::find($id);
        $rooms = Rooms::all();

        // For message if reservation isn't found
        if (!$reservation) {
            return redirect()->route('reservations.index')->with('error', 'Reservation not found.');
        }
        return view('reservations.show', compact('reservation', 'rooms'));
    }

    // No edit view for reservation. Editing would be for the status only, which is handled through buttons in librarian index page
    public function edit(Request $request, $id)
    {
        // Logic for edit can go here if necessary
    }

    // For the status/action buttons
    public function update(Request $request, $id)
    {
        $reservations = Reservations::findOrFail($id);

        if ($request->has('status')) {
            $reservations->status = $request->input('status');
            $reservations->save();

            return redirect()->route('reservations.index')->with('success', 'Reservation status updated to ' . $reservations->status . '!');
        }

        return redirect()->route('reservations.index')->with('error', 'No status provided!');
    }

    // For 'archiving' reservations
    public function destroy($id)
    {
        $reservations = Reservations::findOrFail($id);

        $reservations->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation archived successfully!');
    }
}
