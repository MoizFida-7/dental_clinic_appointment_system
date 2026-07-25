@extends('layouts.app')

@section('title', 'Edit Prescription')

@section('content')
<h3>Edit Prescription #{{ $item->PrescriptionID }}</h3>

<form action="{{ route('prescriptions.update', $item->PrescriptionID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Medication Name </label>
        <input type="text" name="MedicationName" class="form-control @error('MedicationName') is-invalid @enderror" value="{{ old('MedicationName', $item->MedicationName ?? '') }}">
        @error('MedicationName')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Dosage </label>
        <input type="text" name="Dosage" class="form-control @error('Dosage') is-invalid @enderror" value="{{ old('Dosage', $item->Dosage ?? '') }}">
        @error('Dosage')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Duration </label>
        <input type="text" name="Duration" class="form-control @error('Duration') is-invalid @enderror" value="{{ old('Duration', $item->Duration ?? '') }}">
        @error('Duration')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Treatment ID </label>
        <select name="TreatmentID" class="form-select @error('TreatmentID') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach($treatments as $opt)
                <option value="{{ $opt->TreatmentID }}" @selected(old('TreatmentID', $item->TreatmentID ?? null) == $opt->TreatmentID)>{{ $opt->TreatmentName }} (#{{ $opt->TreatmentID }})</option>
            @endforeach
        </select>
        @error('TreatmentID')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
