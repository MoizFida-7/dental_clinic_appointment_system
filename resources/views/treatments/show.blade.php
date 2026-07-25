@extends('layouts.app')

@section('title', 'Treatment Details')

@section('content')
<h3>Treatment #{{ $item->TreatmentID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>TreatmentID</th><td>{{ $item->TreatmentID }}</td></tr>
                <tr><th>Treatment Name</th><td>{{ $item->TreatmentName }}</td></tr>
                <tr><th>Description</th><td>{{ $item->Description }}</td></tr>
                <tr><th>Treatment Cost</th><td>{{ $item->TreatmentCost }}</td></tr>
                <tr><th>Appointment ID</th><td>{{ $item->AppointmentID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('treatments.edit', $item->TreatmentID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('treatments.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
