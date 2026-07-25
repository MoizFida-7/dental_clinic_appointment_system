@extends('layouts.app')

@section('title', 'Payment Details')

@section('content')
<h3>Payment #{{ $item->PaymentID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>PaymentID</th><td>{{ $item->PaymentID }}</td></tr>
                <tr><th>Payment Date</th><td>{{ $item->PaymentDate }}</td></tr>
                <tr><th>Amount Paid</th><td>{{ $item->AmountPaid }}</td></tr>
                <tr><th>Payment Method</th><td>{{ $item->PaymentMethod }}</td></tr>
                <tr><th>Invoice ID</th><td>{{ $item->InvoiceID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('payments.edit', $item->PaymentID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
