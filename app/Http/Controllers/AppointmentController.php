<?php

namespace App\Http\Controllers;

use App\Models\AppointmentModel;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\Receptionist;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $items = AppointmentModel::orderBy('AppointmentID', 'desc')->paginate(10);
        return view('appointments.index', compact('items'));
    }

    public function create()
    {
        return view('appointments.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'AppointmentDate' => 'nullable|date',
            'AppointmentTime' => 'nullable',
            'Status' => 'nullable|string|max:30',
            'PatientID' => 'nullable|integer',
            'DentistID' => 'nullable|integer',
            'ReceptionistID' => 'nullable|integer',
        ]);

        AppointmentModel::create($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function show(AppointmentModel $appointment)
    {
        return view('appointments.show', ['item' => $appointment]);
    }

    public function edit(AppointmentModel $appointment)
    {
        $data = $this->relatedData();
        $data['item'] = $appointment;
        return view('appointments.edit', $data);
    }

    public function update(Request $request, AppointmentModel $appointment)
    {
        $validated = $request->validate([
            'AppointmentDate' => 'nullable|date',
            'AppointmentTime' => 'nullable',
            'Status' => 'nullable|string|max:30',
            'PatientID' => 'nullable|integer',
            'DentistID' => 'nullable|integer',
            'ReceptionistID' => 'nullable|integer',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(AppointmentModel $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'patients' => Patient::orderBy('PatientID')->get(),
            'dentists' => Dentist::orderBy('DentistID')->get(),
            'receptionists' => Receptionist::orderBy('ReceptionistID')->get(),
        ];
    }
}
