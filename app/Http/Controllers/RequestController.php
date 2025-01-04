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
        $requests = Request::get();
        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function usercreate() // for user creation of request
    {
        return view('requests.usercreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // to do for aster: fix the store function
    }

    /**
     * Display the specified resource.
     */
    public function show(requests $requests)
    {
        // to do for aster: fix the show function
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(requests $requests)
    {
        // to do for aster: iiyak talaga ako
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
