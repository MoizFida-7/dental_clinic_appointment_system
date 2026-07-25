@extends('layouts.app')

@section('title', 'Appointment List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Appointment Records</h3>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#AppointmentID</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                        <th>Patient ID</th>
                        <th>Dentist ID</th>
                        <th>Receptionist ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->AppointmentID }}</td>
                        <td>{{ $item->AppointmentDate }}</td>
                        <td>{{ $item->AppointmentTime }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>{{ $item->PatientID }}</td>
                        <td>{{ $item->DentistID }}</td>
                        <td>{{ $item->ReceptionistID }}</td>
            <td>
                <a href="{{ route('appointments.show', $item->AppointmentID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('appointments.edit', $item->AppointmentID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('appointments.destroy', $item->AppointmentID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="8" class="text-center">No records found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $items->links() }}
@endsection
