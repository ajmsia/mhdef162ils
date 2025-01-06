<?php

namespace App\Http\Controllers;

use App\Models\requests;  // Your 'requests' model
use Illuminate\Http\Request as HttpRequest;  // Alias the Illuminate HTTP Request

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = requests::all();  // Fetch all records from the 'requests' table
        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $requests = requests::all(); 
        return view('requests.create', compact('requests'));
    }

    public function usercreate() 
    {
        $requests = requests::all(); 
        return view('requests.usercreate', compact('requests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $request)
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
        $requestsData = requests::create($validatedData);

        // Redirect to appropriate page with a success message
        return redirect()->route('user.requests.usershow', $requestsData->requestID)->with('success', 'Request successfully submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show($requestID) 
    {
        $request = requests::findOrFail($requestID);
        return view('requests.show', compact('request'));
    }

    public function usershow($requestID) 
    {
        $request = requests::findOrFail($requestID);
        return view('requests.usershow', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HttpRequest $httpRequest, $requestID)
    {
        $request = requests::findOrFail($requestID); // Fetch request based on ID
        return view('requests.edit', compact('request')); // Pass the request to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $httpRequest, $requestID)
    {
        // Validate the input data
        $validatedData = $httpRequest->validate([
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

        // Find the request by ID and update it
        $request = requests::findOrFail($requestID);
        $request->update($validatedData);

        return redirect()->route('requests.index')->with('success', 'Request updated successfully!');
    }

    public function updateStatus(HttpRequest $httpRequest, $requestID)
    {
        $request = requests::findOrFail($requestID);  // Fetch request by ID

        if ($httpRequest->has('status')) {
            $request->status = $httpRequest->input('status');
            $request->save();

            return redirect()->route('requests.index')->with('success', 'Request status updated to ' . $request->status . '!');
        }

        return redirect()->route('requests.index')->with('error', 'No status provided!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($requestID)
    {
        $request = requests::findOrFail($requestID);  // Find the request by ID
        $request->delete();  // Delete the request

        return redirect()->route('requests.index')->with('success', 'Request archived successfully!');
    }
}
