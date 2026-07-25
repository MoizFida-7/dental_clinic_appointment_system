<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $items = Patient::orderBy('PatientID', 'desc')->paginate(10);
        return view('patients.index', compact('items'));
    }

    public function create()
    {
        return view('patients.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Gender' => 'nullable|string|max:10',
            'DateOfBirth' => 'nullable|date',
            'PhoneNumber' => 'nullable|string|max:20',
            'Email' => 'nullable|string|max:100',
            'Address' => 'nullable|string|max:255',
            'RegistrationDate' => 'nullable|date',
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', ['item' => $patient]);
    }

    public function edit(Patient $patient)
    {
        $data = $this->relatedData();
        $data['item'] = $patient;
        return view('patients.edit', $data);
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Gender' => 'nullable|string|max:10',
            'DateOfBirth' => 'nullable|date',
            'PhoneNumber' => 'nullable|string|max:20',
            'Email' => 'nullable|string|max:100',
            'Address' => 'nullable|string|max:255',
            'RegistrationDate' => 'nullable|date',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }

    private function relatedData()
    {
        return [

        ];
    }
}
