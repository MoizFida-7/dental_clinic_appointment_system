@extends('layouts.app')

@section('title', 'Edit Payment')

@section('content')
<h3>Edit Payment #{{ $item->PaymentID }}</h3>

<form action="{{ route('payments.update', $item->PaymentID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Payment Date </label>
        <input type="date" name="PaymentDate" class="form-control @error('PaymentDate') is-invalid @enderror" value="{{ old('PaymentDate', $item->PaymentDate ?? '') }}">
        @error('PaymentDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Amount Paid </label>
        <input type="number" name="AmountPaid" class="form-control @error('AmountPaid') is-invalid @enderror" value="{{ old('AmountPaid', $item->AmountPaid ?? '') }}" step="0.01">
        @error('AmountPaid')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Payment Method </label>
        <input type="text" name="PaymentMethod" class="form-control @error('PaymentMethod') is-invalid @enderror" value="{{ old('PaymentMethod', $item->PaymentMethod ?? '') }}">
        @error('PaymentMethod')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Invoice ID </label>
        <select name="InvoiceID" class="form-select @error('InvoiceID') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach($invoices as $opt)
                <option value="{{ $opt->InvoiceID }}" @selected(old('InvoiceID', $item->InvoiceID ?? null) == $opt->InvoiceID)>{{ $opt->InvoiceDate }} (#{{ $opt->InvoiceID }})</option>
            @endforeach
        </select>
        @error('InvoiceID')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
