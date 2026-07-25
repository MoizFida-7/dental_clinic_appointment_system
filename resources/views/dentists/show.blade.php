@extends('layouts.app')

@section('title', 'Dentist Details')

@section('content')
<h3>Dentist #{{ $item->DentistID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>DentistID</th><td>{{ $item->DentistID }}</td></tr>
                <tr><th>First Name</th><td>{{ $item->FirstName }}</td></tr>
                <tr><th>Last Name</th><td>{{ $item->LastName }}</td></tr>
                <tr><th>Phone Number</th><td>{{ $item->PhoneNumber }}</td></tr>
                <tr><th>Email</th><td>{{ $item->Email }}</td></tr>
                <tr><th>Specialization ID</th><td>{{ $item->SpecializationID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('dentists.edit', $item->DentistID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('dentists.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
