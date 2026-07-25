<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\AppointmentModel;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index()
    {
        $items = Reminder::orderBy('ReminderID', 'desc')->paginate(10);
        return view('reminders.index', compact('items'));
    }

    public function create()
    {
        return view('reminders.create', $this->relatedData());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ReminderDate' => 'nullable|date',
            'ReminderType' => 'nullable|string|max:50',
            'Status' => 'nullable|string|max:30',
            'AppointmentID' => 'nullable|integer',
        ]);

        Reminder::create($validated);

        return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
    }

    public function show(Reminder $reminder)
    {
        return view('reminders.show', ['item' => $reminder]);
    }

    public function edit(Reminder $reminder)
    {
        $data = $this->relatedData();
        $data['item'] = $reminder;
        return view('reminders.edit', $data);
    }

    public function update(Request $request, Reminder $reminder)
    {
        $validated = $request->validate([
            'ReminderDate' => 'nullable|date',
            'ReminderType' => 'nullable|string|max:50',
            'Status' => 'nullable|string|max:30',
            'AppointmentID' => 'nullable|integer',
        ]);

        $reminder->update($validated);

        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }

    public function destroy(Reminder $reminder)
    {
        $reminder->delete();
        return redirect()->route('reminders.index')->with('success', 'Reminder deleted successfully.');
    }

    private function relatedData()
    {
        return [
            'appointments' => AppointmentModel::orderBy('AppointmentID')->get(),
        ];
    }
}
