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
        return view('requests.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // For librarian view of request form //
    {
        return view('requests.create');
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
        return redirect()->route('requests.create')->with('success', 'Request successfully submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(requests $requests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(requests $requests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, requests $requests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(requests $requests)
    {
        //
    }
}
