<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\AppointmentModel;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $items = Treatment::orderBy('TreatmentID', 'desc')->paginate(10);
        return view('treatments.index', compact('items'));
    }

    public function create()
    {
        return view('treatments.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'TreatmentName' => 'nullable|string|max:100',
            'Description' => 'nullable|string|max:255',
            'TreatmentCost' => 'nullable|numeric',
            'AppointmentID' => 'nullable|integer',
        ]);

        Treatment::create($validated);

        return redirect()->route('treatments.index')->with('success', 'Treatment created successfully.');
    }

    public function show(Treatment $treatment)
    {
        return view('treatments.show', ['item' => $treatment]);
    }

    public function edit(Treatment $treatment)
    {
        $data = $this->relatedData();
        $data['item'] = $treatment;
        return view('treatments.edit', $data);
    }

    public function update(Request $request, Treatment $treatment)
    {
        $validated = $request->validate([
            'TreatmentName' => 'nullable|string|max:100',
            'Description' => 'nullable|string|max:255',
            'TreatmentCost' => 'nullable|numeric',
            'AppointmentID' => 'nullable|integer',
        ]);

        $treatment->update($validated);

        return redirect()->route('treatments.index')->with('success', 'Treatment updated successfully.');
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return redirect()->route('treatments.index')->with('success', 'Treatment deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'appointments' => AppointmentModel::orderBy('AppointmentID')->get(),
        ];
    }
}
