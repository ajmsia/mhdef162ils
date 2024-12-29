<?php

namespace App\Http\Controllers;

use App\Models\reservations;
use App\Models\rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservations::with('rooms')->get();

        foreach($reservations as $reservation) {
            if (!$reservation->room) {
                Log::warning("Reservation ID {$reservation->id} has no associated room. Room ID: {$reservation->roomID}");
            }
        }
        $rooms = Rooms::all(); 
        return view('reservations.index', compact('reservations', 'rooms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Rooms::all(); 
        return view('reservations.create', compact('rooms'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservationData = $request->validate([
            'userFirstName' => 'required|string|max:50',
            'userLastName' => 'required|string|max:50',
            'userMiddleName' => 'nullable|string|max:50', 
            'upmail' => 'required|email|max:100',
            'college' => 'required|string|max:100',
            'userType' => 'required|string|max:50',
            'reserveTime' => 'required|date_format:H:i', 
            'reserveDate' => 'required|date|after_or_equal:today', 
            'purpose' => 'required|string|max:255',
            'roomID' => 'required|exists:rooms,id',        
        ]);
        
        Reservations::create($reservationData);
        return redirect()->route('reservations.index')->with('success', 'Reservation added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(reservations $reservations, $id) 
    {
        $reservation = Reservations::find($id);
        $rooms = Rooms::all();
        if (!$reservation) {
            return redirect()->route('reservations.index')->with('error', 'Reservation not found.');
        }
        return view('reservations.show', compact('reservation', 'rooms'));
    }


    public function edit(Request $request, $id)
    {
        
    }


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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservations = Reservations::findOrFail($id);

        $reservations->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation archived successfully!');
    }

}
