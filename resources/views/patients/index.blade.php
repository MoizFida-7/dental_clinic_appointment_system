@extends('layouts.app')

@section('title', 'Patient List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Patient Records</h3>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#PatientID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Registration Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->PatientID }}</td>
                        <td>{{ $item->FirstName }}</td>
                        <td>{{ $item->LastName }}</td>
                        <td>{{ $item->Gender }}</td>
                        <td>{{ $item->DateOfBirth }}</td>
                        <td>{{ $item->PhoneNumber }}</td>
                        <td>{{ $item->Email }}</td>
                        <td>{{ $item->Address }}</td>
                        <td>{{ $item->RegistrationDate }}</td>
            <td>
                <a href="{{ route('patients.show', $item->PatientID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('patients.edit', $item->PatientID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('patients.destroy', $item->PatientID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="10" class="text-center">No records found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $items->links() }}
@endsection
