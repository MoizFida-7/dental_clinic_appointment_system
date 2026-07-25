@extends('layouts.app')

@section('title', 'Payment List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Payment Records</h3>
    <a href="{{ route('payments.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#PaymentID</th>
                        <th>Payment Date</th>
                        <th>Amount Paid</th>
                        <th>Payment Method</th>
                        <th>Invoice ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{ $item->PaymentID }}</td>
                        <td>{{ $item->PaymentDate }}</td>
                        <td>{{ $item->AmountPaid }}</td>
                        <td>{{ $item->PaymentMethod }}</td>
                        <td>{{ $item->InvoiceID }}</td>
            <td>
                <a href="{{ route('payments.show', $item->PaymentID) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('payments.edit', $item->PaymentID) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('payments.destroy', $item->PaymentID) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?');">
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
