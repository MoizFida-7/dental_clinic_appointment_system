@extends('layouts.app')

@section('title', 'Reminder List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Reminder Records</h3>
    <a href="{{ route('reminders.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#ReminderID</th>
                        <th>Reminder Date</th>
                        <th>Reminder Type</th>
                        <th>Status</th>
                        <th>Appointment ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->ReminderID }}</td>
                        <td>{{ $item->ReminderDate }}</td>
                        <td>{{ $item->ReminderType }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>{{ $item->AppointmentID }}</td>
            <td>
                <a href="{{ route('reminders.show', $item->ReminderID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('reminders.edit', $item->ReminderID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('reminders.destroy', $item->ReminderID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No records found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $items->links() }}
@endsection
