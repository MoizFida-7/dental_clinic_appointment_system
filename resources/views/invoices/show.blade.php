@extends('layouts.app')

@section('title', 'Invoice Details')

@section('content')
<h3>Invoice #{{ $item->InvoiceID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>InvoiceID</th><td>{{ $item->InvoiceID }}</td></tr>
                <tr><th>Invoice Date</th><td>{{ $item->InvoiceDate }}</td></tr>
                <tr><th>Total Amount</th><td>{{ $item->TotalAmount }}</td></tr>
                <tr><th>Status</th><td>{{ $item->Status }}</td></tr>
                <tr><th>Appointment ID</th><td>{{ $item->AppointmentID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('invoices.edit', $item->InvoiceID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
