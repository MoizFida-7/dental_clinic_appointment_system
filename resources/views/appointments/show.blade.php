@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')
<h3>Appointment #{{ $item->AppointmentID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>AppointmentID</th><td>{{ $item->AppointmentID }}</td></tr>
                <tr><th>Appointment Date</th><td>{{ $item->AppointmentDate }}</td></tr>
                <tr><th>Appointment Time</th><td>{{ $item->AppointmentTime }}</td></tr>
                <tr><th>Status</th><td>{{ $item->Status }}</td></tr>
                <tr><th>Patient ID</th><td>{{ $item->PatientID }}</td></tr>
                <tr><th>Dentist ID</th><td>{{ $item->DentistID }}</td></tr>
                <tr><th>Receptionist ID</th><td>{{ $item->ReceptionistID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('appointments.edit', $item->AppointmentID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
