@extends('layouts.app')

@section('title', 'Prescription List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Prescription Records</h3>
    <a href="{{ route('prescriptions.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#PrescriptionID</th>
                        <th>Medication Name</th>
                        <th>Dosage</th>
                        <th>Duration</th>
                        <th>Treatment ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->PrescriptionID }}</td>
                        <td>{{ $item->MedicationName }}</td>
                        <td>{{ $item->Dosage }}</td>
                        <td>{{ $item->Duration }}</td>
                        <td>{{ $item->TreatmentID }}</td>
            <td>
                <a href="{{ route('prescriptions.show', $item->PrescriptionID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('prescriptions.edit', $item->PrescriptionID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('prescriptions.destroy', $item->PrescriptionID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
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
