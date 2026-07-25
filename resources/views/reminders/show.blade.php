@extends('layouts.app')

@section('title', 'Reminder Details')

@section('content')
<h3>Reminder #{{ $item->ReminderID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>ReminderID</th><td>{{ $item->ReminderID }}</td></tr>
                <tr><th>Reminder Date</th><td>{{ $item->ReminderDate }}</td></tr>
                <tr><th>Reminder Type</th><td>{{ $item->ReminderType }}</td></tr>
                <tr><th>Status</th><td>{{ $item->Status }}</td></tr>
                <tr><th>Appointment ID</th><td>{{ $item->AppointmentID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('reminders.edit', $item->ReminderID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('reminders.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
