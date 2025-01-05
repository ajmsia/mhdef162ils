<?php

namespace App\Http\Controllers;

use App\Models\Consultations; 
use App\Rules\TimeFormat; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultations::paginate(10);
        return view('consultations.index', compact('consultations')); 
    }
    
    public function usercreate() 
    {
        return view('consultations.usercreate');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:100',
            'nickname' => 'required|string|max:100',
            'mail' => 'required|email',
            'contact' => 'required|numeric',
            'reserveDate' => 'required|date',
            'reserveTime' => ['required', new TimeFormat], 
            'purpose' => 'required|string',
        ]);

        // Format the reserveDate
        $validatedData['reserveDate'] = Carbon::parse($validatedData['reserveDate'])->format('Y-m-d');
        $consultation = Consultations::create($validatedData);

        // Success message
        return redirect()->route('user.consultations.usershow', $consultation->id)->with('success', 'Consultations successfully added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Consultations $consultation, $id)
    {
        $consultation = Consultations::findOrFail($id);
        return view('consultations.show', compact('consultation'));
    }

    public function usershow(string $id)
    {
        $consultation = Consultations::findOrFail($id);
        return view('consultations.usershow', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consultation = Consultations::findOrFail($id);

        return view('consultations.edit', compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultations $consultations, $id)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:100',
            'mail' => 'required|email',
            'contact' => 'required|numeric',
            'reserveDate' => 'required|date', // Ensure date validation
            'reserveTime' => ['required', new TimeFormat], // Custom validation for time
            'purpose' => 'required|string',
        ]);
    
        $consultations->update($validatedData);
    
        return redirect()->route('consultations.index')->with('success', 'Consultation updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consultation = Consultations::findOrFail($id);
        $consultation->delete();

        return redirect()->route('consultations.index')->with('success', 'Consultation deleted successfully!');
    }
}
