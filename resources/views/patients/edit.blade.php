@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<h3>Edit Patient #{{ $item->PatientID }}</h3>

<form action="{{ route('patients.update', $item->PatientID) }}" method="POST">
    @csrf
    @method('PUT')
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
        <label class="form-label">Gender </label>
        <input type="text" name="Gender" class="form-control @error('Gender') is-invalid @enderror" value="{{ old('Gender', $item->Gender ?? '') }}">
        @error('Gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Date Of Birth </label>
        <input type="date" name="DateOfBirth" class="form-control @error('DateOfBirth') is-invalid @enderror" value="{{ old('DateOfBirth', $item->DateOfBirth ?? '') }}">
        @error('DateOfBirth')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
        <label class="form-label">Address </label>
        <input type="text" name="Address" class="form-control @error('Address') is-invalid @enderror" value="{{ old('Address', $item->Address ?? '') }}">
        @error('Address')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Registration Date </label>
        <input type="date" name="RegistrationDate" class="form-control @error('RegistrationDate') is-invalid @enderror" value="{{ old('RegistrationDate', $item->RegistrationDate ?? '') }}">
        @error('RegistrationDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
