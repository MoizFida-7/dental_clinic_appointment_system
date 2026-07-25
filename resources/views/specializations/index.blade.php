@extends('layouts.app')

@section('title', 'Specialization List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Specialization Records</h3>
    <a href="{{ route('specializations.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#SpecializationID</th>
                        <th>Specialization Name</th>
                        <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->SpecializationID }}</td>
                        <td>{{ $item->SpecializationName }}</td>
                        <td>{{ $item->Description }}</td>
            <td>
                <a href="{{ route('specializations.show', $item->SpecializationID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('specializations.edit', $item->SpecializationID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('specializations.destroy', $item->SpecializationID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">No records found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $items->links() }}
@endsection
