<?php

namespace App\Http\Controllers;

use App\Models\requests;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = requests::get();
        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function create() // For librarian view of reservation form //
     {
        $requests = requests::get(); 
        return view('requests.create', compact('requests'));
     }
 
     
     public function usercreate() // For user view of reservation form //
     {
        $requests = requests::get(); 
        return view('requests.usercreate', compact('requests'));

     }

    /**
     * Store a newly created resource in storage.
     */
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
            'title' => 'required|string',
            'resourceType' => 'required|string',
            'tuklasLink' => 'required|string',
            'requestDate' => 'required|date'
        ]);

        // Create the request using the validated data
        $requestsData = Requests::create($validatedData);

        // Redirect to appropriate page with a success message
        return redirect()->route('user.requests.usershow', $requestsData->requestID)->with('success', 'Request successfully submitted!');
    }

    /**
     * Display the specified resource.
     */
    
    public function show($requestID) 
    {
        $request = Requests::findOrFail($requestID);
        return view('requests.show', compact('request'));
    }

    public function usershow($requestID) 
    {
    $request = Requests::findOrFail($requestID);
    return view('requests.usershow', compact('request'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Requests $requests, $requestID)
    {
        $requestID = $requests->route('requestID');
        $request = Requests::findOrFail($requestID);
    
         return view('requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requests $requests)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'userFirstName' => 'required|string|max:255',
            'userLastName' => 'required|string|max:255',
            'userMiddleName' => 'nullable|string|max:255',
            'upmail' => 'required|email|max:255',
            'userType' => 'required|string',
            'college' => 'required|string',
            'title' => 'required|string',
            'resourceType' => 'required|string',
            'tuklasLink' => 'required|string',
            'requestDate' => 'required|date',
        ]);

        // Update the reservation with new data
        $request->update($validatedData);

        return redirect()->route('request.index')->with('success', 'Request updated successfully!');
    }

    public function updateStatus(Request $request, Requests $requests)
    {
        if ($requests->has('status')) {
            $requests->status = $request->input('status');
            $requests->save();

            return redirect()->route('reservations.index')->with('success', 'Reservation status updated to ' . $requests->status . '!');
        }

        return redirect()->route('requests.index')->with('error', 'No status provided!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requests $request)
    {
        $request->delete();

        return redirect()->route('requests.index')->with('success', 'Request archived successfully!');
    }

}
