@extends('layouts.app')

@section('title', 'XrayRecord List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>XrayRecord Records</h3>
    <a href="{{ route('xrayrecords.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#XRayID</th>
                        <th>File Path</th>
                        <th>Upload Date</th>
                        <th>Notes</th>
                        <th>Patient ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->XRayID }}</td>
                        <td>{{ $item->FilePath }}</td>
                        <td>{{ $item->UploadDate }}</td>
                        <td>{{ $item->Notes }}</td>
                        <td>{{ $item->PatientID }}</td>
            <td>
                <a href="{{ route('xrayrecords.show', $item->XRayID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('xrayrecords.edit', $item->XRayID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('xrayrecords.destroy', $item->XRayID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
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
