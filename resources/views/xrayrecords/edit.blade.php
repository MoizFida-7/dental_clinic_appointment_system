@extends('layouts.app')

@section('title', 'Edit XrayRecord')

@section('content')
<h3>Edit XrayRecord #{{ $item->XRayID }}</h3>

<form action="{{ route('xrayrecords.update', $item->XRayID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">File Path </label>
        <input type="text" name="FilePath" class="form-control @error('FilePath') is-invalid @enderror" value="{{ old('FilePath', $item->FilePath ?? '') }}">
        @error('FilePath')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Upload Date </label>
        <input type="date" name="UploadDate" class="form-control @error('UploadDate') is-invalid @enderror" value="{{ old('UploadDate', $item->UploadDate ?? '') }}">
        @error('UploadDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Notes </label>
        <input type="text" name="Notes" class="form-control @error('Notes') is-invalid @enderror" value="{{ old('Notes', $item->Notes ?? '') }}">
        @error('Notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Patient ID </label>
        <select name="PatientID" class="form-select @error('PatientID') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach($patients as $opt)
                <option value="{{ $opt->PatientID }}" @selected(old('PatientID', $item->PatientID ?? null) == $opt->PatientID)>{{ $opt->FirstName }} (#{{ $opt->PatientID }})</option>
            @endforeach
        </select>
        @error('PatientID')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('xrayrecords.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
