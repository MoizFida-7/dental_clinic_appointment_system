@extends('layouts.app')

@section('title', 'Receptionist List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Receptionist Records</h3>
    <a href="{{ route('receptionists.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#ReceptionistID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->ReceptionistID }}</td>
                        <td>{{ $item->FirstName }}</td>
                        <td>{{ $item->LastName }}</td>
                        <td>{{ $item->PhoneNumber }}</td>
                        <td>{{ $item->Email }}</td>
            <td>
                <a href="{{ route('receptionists.show', $item->ReceptionistID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('receptionists.edit', $item->ReceptionistID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('receptionists.destroy', $item->ReceptionistID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
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
