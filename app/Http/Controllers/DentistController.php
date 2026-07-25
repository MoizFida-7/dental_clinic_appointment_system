<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    public function index()
    {
        $items = Dentist::orderBy('DentistID', 'desc')->paginate(10);
        return view('dentists.index', compact('items'));
    }

    public function create()
    {
        return view('dentists.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'PhoneNumber' => 'nullable|string|max:20',
            'Email' => 'nullable|string|max:100',
            'SpecializationID' => 'nullable|integer',
        ]);

        Dentist::create($validated);

        return redirect()->route('dentists.index')->with('success', 'Dentist created successfully.');
    }

    public function show(Dentist $dentist)
    {
        return view('dentists.show', ['item' => $dentist]);
    }

    public function edit(Dentist $dentist)
    {
        $data = $this->relatedData();
        $data['item'] = $dentist;
        return view('dentists.edit', $data);
    }

    public function update(Request $request, Dentist $dentist)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'PhoneNumber' => 'nullable|string|max:20',
            'Email' => 'nullable|string|max:100',
            'SpecializationID' => 'nullable|integer',
        ]);

        $dentist->update($validated);

        return redirect()->route('dentists.index')->with('success', 'Dentist updated successfully.');
    }

    public function destroy(Dentist $dentist)
    {
        $dentist->delete();
        return redirect()->route('dentists.index')->with('success', 'Dentist deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'specializations' => Specialization::orderBy('SpecializationID')->get(),
        ];
    }
}
