<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Treatment;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $items = Prescription::orderBy('PrescriptionID', 'desc')->paginate(10);
        return view('prescriptions.index', compact('items'));
    }

    public function create()
    {
        return view('prescriptions.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'MedicationName' => 'nullable|string|max:100',
            'Dosage' => 'nullable|string|max:50',
            'Duration' => 'nullable|string|max:50',
            'TreatmentID' => 'nullable|integer',
        ]);

        Prescription::create($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully.');
    }

    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', ['item' => $prescription]);
    }

    public function edit(Prescription $prescription)
    {
        $data = $this->relatedData();
        $data['item'] = $prescription;
        return view('prescriptions.edit', $data);
    }

    public function update(Request $request, Prescription $prescription)
    {
        $validated = $request->validate([
            'MedicationName' => 'nullable|string|max:100',
            'Dosage' => 'nullable|string|max:50',
            'Duration' => 'nullable|string|max:50',
            'TreatmentID' => 'nullable|integer',
        ]);

        $prescription->update($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully.');
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'treatments' => Treatment::orderBy('TreatmentID')->get(),
        ];
    }
}
