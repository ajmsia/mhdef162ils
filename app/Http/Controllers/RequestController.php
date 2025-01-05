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
         $requestsData = $request->validate([
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

        // Create the request using the validated data
        Requests::create($requestsData);

        // Redirect to appropriate page with a success message
        return redirect()->route('requests.usercreate')->with('success', 'Request successfully submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show($requestID) 
    {
        $request = Requests::findOrFail($requestID);
        return view('requests.show', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(requests $requests)
    {

        $request = Requests::findOrFail($RequestID);
    
         return view('requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, requests $requests)
    {
        // to do for aster: still thinking about whether to do this
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(requests $requests)
    {
        // to do for aster: for librarian view
    }
}
