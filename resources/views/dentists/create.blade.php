@extends('layouts.app')

@section('title', 'Add Dentist')

@section('content')
<h3>Add New Dentist</h3>

<form action="{{ route('dentists.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">First Name <span class="text-danger">*</span></label>
        <input type="text" name="FirstName" class="form-control @error('FirstName') is-invalid @enderror" value="{{ old('FirstName', $item->FirstName ?? '') }}" required>
        @error('FirstName')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Last Name <span class="text-danger">*</span></label>
        <input type="text" name="LastName" class="form-control @error('LastName') is-invalid @enderror" value="{{ old('LastName', $item->LastName ?? '') }}" required>
        @error('LastName')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Phone Number </label>
        <input type="text" name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror" value="{{ old('PhoneNumber', $item->PhoneNumber ?? '') }}">
        @error('PhoneNumber')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Email </label>
        <input type="text" name="Email" class="form-control @error('Email') is-invalid @enderror" value="{{ old('Email', $item->Email ?? '') }}">
        @error('Email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Specialization ID </label>
        <select name="SpecializationID" class="form-select @error('SpecializationID') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach($specializations as $opt)
                <option value="{{ $opt->SpecializationID }}" @selected(old('SpecializationID', $item->SpecializationID ?? null) == $opt->SpecializationID)>{{ $opt->SpecializationName }} (#{{ $opt->SpecializationID }})</option>
            @endforeach
        </select>
        @error('SpecializationID')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('dentists.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
