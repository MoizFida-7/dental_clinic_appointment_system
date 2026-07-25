@extends('layouts.app')

@section('title', 'Invoice List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Invoice Records</h3>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#InvoiceID</th>
                        <th>Invoice Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Appointment ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->InvoiceID }}</td>
                        <td>{{ $item->InvoiceDate }}</td>
                        <td>{{ $item->TotalAmount }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>{{ $item->AppointmentID }}</td>
            <td>
                <a href="{{ route('invoices.show', $item->InvoiceID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('invoices.edit', $item->InvoiceID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('invoices.destroy', $item->InvoiceID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
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
