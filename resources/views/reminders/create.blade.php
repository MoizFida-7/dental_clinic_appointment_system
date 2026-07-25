@extends('layouts.app')

@section('title', 'Add Reminder')

@section('content')
<h3>Add New Reminder</h3>

<form action="{{ route('reminders.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Reminder Date </label>
        <input type="date" name="ReminderDate" class="form-control @error('ReminderDate') is-invalid @enderror" value="{{ old('ReminderDate', $item->ReminderDate ?? '') }}">
        @error('ReminderDate')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Reminder Type </label>
        <input type="text" name="ReminderType" class="form-control @error('ReminderType') is-invalid @enderror" value="{{ old('ReminderType', $item->ReminderType ?? '') }}">
        @error('ReminderType')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
    <a href="{{ route('reminders.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
