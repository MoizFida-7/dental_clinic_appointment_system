@extends('layouts.app')

@section('title', 'Add Invoice')

@section('content')
<h3>Add New Invoice</h3>

<form action="{{ route('invoices.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Invoice Date </label>
        <input type="date" name="InvoiceDate" class="form-control @error('InvoiceDate') is-invalid @enderror" value="{{ old('InvoiceDate', $item->InvoiceDate ?? '') }}">
        @error('InvoiceDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Total Amount </label>
        <input type="number" name="TotalAmount" class="form-control @error('TotalAmount') is-invalid @enderror" value="{{ old('TotalAmount', $item->TotalAmount ?? '') }}" step="0.01">
        @error('TotalAmount')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Status </label>
        <input type="text" name="Status" class="form-control @error('Status') is-invalid @enderror" value="{{ old('Status', $item->Status ?? '') }}">
        @error('Status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Appointment ID </label>
        <select name="AppointmentID" class="form-select @error('AppointmentID') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach($appointments as $opt)
                <option value="{{ $opt->AppointmentID }}" @selected(old('AppointmentID', $item->AppointmentID ?? null) == $opt->AppointmentID)>{{ $opt->AppointmentDate }} (#{{ $opt->AppointmentID }})</option>
            @endforeach
        </select>
        @error('AppointmentID')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
