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
        $reservationData = $request->validate([
            'userFirstName' => 'required|string|max:255',
            'userLastName' => 'required|string|max:255',
            'userMiddleName' => 'nullable|string|max:255',
            'upmail' => 'required|email|max:255',
            'userType' => 'required|string',
            'college' => 'required|string',
            'roomID' => 'required|integer',
            'reserveTime' => 'required|string',
            'reserveDate' => 'required|date',
            'purpose' => 'required|string'
        ]);

        // Create the reservation using the validated data
        Reservations::create($reservationData);

        // Redirect to appropriate page with a success message
        return redirect()->route('user.reservations.usershow')->with('success', 'Reservation successfully added!');
    }

    // Corrected show method with route model binding
    public function show(Reservations $reservation) 
    {
        $rooms = Rooms::all();
        return view('reservations.show', compact('reservation', 'rooms'));
    }

    public function usershow(Reservations $reservation) 
    {
        $rooms = Rooms::all();
        return view('reservations.usershow', compact('reservation', 'rooms'));
    }

    // Implement the edit function for updating reservation details
    public function edit(Reservations $reservation)
    {
        $rooms = Rooms::all();

        // Pass the reservation data to the edit view
        return view('reservations.edit', compact('reservation', 'rooms'));
    }

    // Handle the update of reservation details
    public function update(Request $request, Reservations $reservation)
    {
        // Validate the input data
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

        // Update the reservation with new data
        $reservation->update($validatedData);

        return redirect()->route('user.reservations.usershow', ['reservation' => $reservation->id])->with('success', 'Request successfully submitted!');

    }

    // For the status/action buttons
    public function updateStatus(Request $request, Reservations $reservation)
    {
        if ($request->has('status')) {
            $reservation->status = $request->input('status');
            $reservation->save();

            return redirect()->route('reservations.index')->with('success', 'Reservation status updated to ' . $reservation->status . '!');
        }

        return redirect()->route('reservations.index')->with('error', 'No status provided!');
    }

    // For 'archiving' reservations
    public function destroy(Reservations $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation archived successfully!');
    }
}
