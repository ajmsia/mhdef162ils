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
    public function create() // For librarian view of reservation form //
    {
        $requests = requests::all(); 
        return view('requests.create', compact('requests'));
    }

    public function usercreate() // For user view of reservation form //
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
    public function edit(HttpRequest $request, requests $requestModel, $requestID)
    {
        $request = requests::findOrFail($requestID);
        return view('requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $request, requests $requestModel)
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

        // Update the request with new data
        $requestModel->update($validatedData);

        return redirect()->route('requests.index')->with('success', 'Request updated successfully!');
    }

    public function updateStatus(HttpRequest $request, requests $requestModel)
    {
        if ($requestModel->has('status')) {
            $requestModel->status = $request->input('status');
            $requestModel->save();

            return redirect()->route('requests.index')->with('success', 'Request status updated to ' . $requestModel->status . '!');
        }

        return redirect()->route('requests.index')->with('error', 'No status provided!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(requests $requestModel)
    {
        $requestModel->delete();

        return redirect()->route('requests.index')->with('success', 'Request archived successfully!');
    }
}
