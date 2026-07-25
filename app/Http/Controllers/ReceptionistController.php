<?php

namespace App\Http\Controllers;

use App\Models\Receptionist;

use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    public function index()
    {
        $items = Receptionist::orderBy('ReceptionistID', 'desc')->paginate(10);
        return view('receptionists.index', compact('items'));
    }

    public function create()
    {
        return view('receptionists.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'PhoneNumber' => 'nullable|string|max:20',
            'Email' => 'nullable|string|max:100',
        ]);

        Receptionist::create($validated);

        return redirect()->route('receptionists.index')->with('success', 'Receptionist created successfully.');
    }

    public function show(Receptionist $receptionist)
    {
        return view('receptionists.show', ['item' => $receptionist]);
    }

    public function edit(Receptionist $receptionist)
    {
        $data = $this->relatedData();
        $data['item'] = $receptionist;
        return view('receptionists.edit', $data);
    }

    public function update(Request $request, Receptionist $receptionist)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'PhoneNumber' => 'nullable|string|max:20',
            'Email' => 'nullable|string|max:100',
        ]);

        $receptionist->update($validated);

        return redirect()->route('receptionists.index')->with('success', 'Receptionist updated successfully.');
    }

    public function destroy(Receptionist $receptionist)
    {
        $receptionist->delete();
        return redirect()->route('receptionists.index')->with('success', 'Receptionist deleted successfully.');
    }

    private function relatedData()
    {
        return [

        ];
    }
}
