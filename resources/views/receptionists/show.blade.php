@extends('layouts.app')

@section('title', 'Receptionist Details')

@section('content')
<h3>Receptionist #{{ $item->ReceptionistID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>ReceptionistID</th><td>{{ $item->ReceptionistID }}</td></tr>
                <tr><th>First Name</th><td>{{ $item->FirstName }}</td></tr>
                <tr><th>Last Name</th><td>{{ $item->LastName }}</td></tr>
                <tr><th>Phone Number</th><td>{{ $item->PhoneNumber }}</td></tr>
                <tr><th>Email</th><td>{{ $item->Email }}</td></tr>
    </tbody>
</table>

<a href="{{ route('receptionists.edit', $item->ReceptionistID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('receptionists.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
