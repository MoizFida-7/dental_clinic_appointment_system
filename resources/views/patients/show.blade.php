@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')
<h3>Patient #{{ $item->PatientID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>PatientID</th><td>{{ $item->PatientID }}</td></tr>
                <tr><th>First Name</th><td>{{ $item->FirstName }}</td></tr>
                <tr><th>Last Name</th><td>{{ $item->LastName }}</td></tr>
                <tr><th>Gender</th><td>{{ $item->Gender }}</td></tr>
                <tr><th>Date Of Birth</th><td>{{ $item->DateOfBirth }}</td></tr>
                <tr><th>Phone Number</th><td>{{ $item->PhoneNumber }}</td></tr>
                <tr><th>Email</th><td>{{ $item->Email }}</td></tr>
                <tr><th>Address</th><td>{{ $item->Address }}</td></tr>
                <tr><th>Registration Date</th><td>{{ $item->RegistrationDate }}</td></tr>
    </tbody>
</table>

<a href="{{ route('patients.edit', $item->PatientID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
