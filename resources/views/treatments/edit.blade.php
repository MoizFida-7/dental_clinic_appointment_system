@extends('layouts.app')

@section('title', 'Edit Treatment')

@section('content')
<h3>Edit Treatment #{{ $item->TreatmentID }}</h3>

<form action="{{ route('treatments.update', $item->TreatmentID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Treatment Name </label>
        <input type="text" name="TreatmentName" class="form-control @error('TreatmentName') is-invalid @enderror" value="{{ old('TreatmentName', $item->TreatmentName ?? '') }}">
        @error('TreatmentName')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Description </label>
        <input type="text" name="Description" class="form-control @error('Description') is-invalid @enderror" value="{{ old('Description', $item->Description ?? '') }}">
        @error('Description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Treatment Cost </label>
        <input type="number" name="TreatmentCost" class="form-control @error('TreatmentCost') is-invalid @enderror" value="{{ old('TreatmentCost', $item->TreatmentCost ?? '') }}" step="0.01">
        @error('TreatmentCost')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('treatments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
