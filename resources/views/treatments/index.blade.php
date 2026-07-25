@extends('layouts.app')

@section('title', 'Treatment List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Treatment Records</h3>
    <a href="{{ route('treatments.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#TreatmentID</th>
                        <th>Treatment Name</th>
                        <th>Description</th>
                        <th>Treatment Cost</th>
                        <th>Appointment ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->TreatmentID }}</td>
                        <td>{{ $item->TreatmentName }}</td>
                        <td>{{ $item->Description }}</td>
                        <td>{{ $item->TreatmentCost }}</td>
                        <td>{{ $item->AppointmentID }}</td>
            <td>
                <a href="{{ route('treatments.show', $item->TreatmentID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('treatments.edit', $item->TreatmentID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('treatments.destroy', $item->TreatmentID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
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
