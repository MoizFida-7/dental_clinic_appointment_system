@extends('layouts.app')

@section('title', 'Dentist List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Dentist Records</h3>
    <a href="{{ route('dentists.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#DentistID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Specialization ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->DentistID }}</td>
                        <td>{{ $item->FirstName }}</td>
                        <td>{{ $item->LastName }}</td>
                        <td>{{ $item->PhoneNumber }}</td>
                        <td>{{ $item->Email }}</td>
                        <td>{{ $item->SpecializationID }}</td>
            <td>
                <a href="{{ route('dentists.show', $item->DentistID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('dentists.edit', $item->DentistID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('dentists.destroy', $item->DentistID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">No records found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $items->links() }}
@endsection
