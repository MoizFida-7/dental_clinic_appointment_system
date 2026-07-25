@extends('layouts.app')

@section('title', 'Edit Specialization')

@section('content')
<h3>Edit Specialization #{{ $item->SpecializationID }}</h3>

<form action="{{ route('specializations.update', $item->SpecializationID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Specialization Name <span class="text-danger">*</span></label>
        <input type="text" name="SpecializationName" class="form-control @error('SpecializationName') is-invalid @enderror" value="{{ old('SpecializationName', $item->SpecializationName ?? '') }}" required>
        @error('SpecializationName')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Description </label>
        <input type="text" name="Description" class="form-control @error('Description') is-invalid @enderror" value="{{ old('Description', $item->Description ?? '') }}">
        @error('Description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('specializations.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
