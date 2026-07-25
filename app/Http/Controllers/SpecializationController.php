<?php

namespace App\Http\Controllers;

use App\Models\Specialization;

use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $items = Specialization::orderBy('SpecializationID', 'desc')->paginate(10);
        return view('specializations.index', compact('items'));
    }

    public function create()
    {
        return view('specializations.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'SpecializationName' => 'required|string|max:100',
            'Description' => 'nullable|string|max:255',
        ]);

        Specialization::create($validated);

        return redirect()->route('specializations.index')->with('success', 'Specialization created successfully.');
    }

    public function show(Specialization $specialization)
    {
        return view('specializations.show', ['item' => $specialization]);
    }

    public function edit(Specialization $specialization)
    {
        $data = $this->relatedData();
        $data['item'] = $specialization;
        return view('specializations.edit', $data);
    }

    public function update(Request $request, Specialization $specialization)
    {
        $validated = $request->validate([
            'SpecializationName' => 'required|string|max:100',
            'Description' => 'nullable|string|max:255',
        ]);

        $specialization->update($validated);

        return redirect()->route('specializations.index')->with('success', 'Specialization updated successfully.');
    }

    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return redirect()->route('specializations.index')->with('success', 'Specialization deleted successfully.');
    }

    private function relatedData()
    {
        return [

        ];
    }
}
