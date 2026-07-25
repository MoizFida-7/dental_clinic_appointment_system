@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')
<h3>Edit Appointment #{{ $item->AppointmentID }}</h3>

<form action="{{ route('appointments.update', $item->AppointmentID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Appointment Date </label>
        <input type="date" name="AppointmentDate" class="form-control @error('AppointmentDate') is-invalid @enderror" value="{{ old('AppointmentDate', $item->AppointmentDate ?? '') }}">
        @error('AppointmentDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Appointment Time </label>
        <input type="time" name="AppointmentTime" class="form-control @error('AppointmentTime') is-invalid @enderror" value="{{ old('AppointmentTime', $item->AppointmentTime ?? '') }}">
        @error('AppointmentTime')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Status </label>
        <input type="text" name="Status" class="form-control @error('Status') is-invalid @enderror" value="{{ old('Status', $item->Status ?? '') }}">
        @error('Status')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
    <div class="mb-3">
        <label class="form-label">Dentist ID </label>
        <select name="DentistID" class="form-select @error('DentistID') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach($dentists as $opt)
                <option value="{{ $opt->DentistID }}" @selected(old('DentistID', $item->DentistID ?? null) == $opt->DentistID)>{{ $opt->FirstName }} (#{{ $opt->DentistID }})</option>
            @endforeach
        </select>
        @error('DentistID')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Receptionist ID </label>
        <select name="ReceptionistID" class="form-select @error('ReceptionistID') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach($receptionists as $opt)
                <option value="{{ $opt->ReceptionistID }}" @selected(old('ReceptionistID', $item->ReceptionistID ?? null) == $opt->ReceptionistID)>{{ $opt->FirstName }} (#{{ $opt->ReceptionistID }})</option>
            @endforeach
        </select>
        @error('ReceptionistID')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
