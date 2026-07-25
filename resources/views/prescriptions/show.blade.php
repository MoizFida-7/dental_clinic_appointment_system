@extends('layouts.app')

@section('title', 'Prescription Details')

@section('content')
<h3>Prescription #{{ $item->PrescriptionID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>PrescriptionID</th><td>{{ $item->PrescriptionID }}</td></tr>
                <tr><th>Medication Name</th><td>{{ $item->MedicationName }}</td></tr>
                <tr><th>Dosage</th><td>{{ $item->Dosage }}</td></tr>
                <tr><th>Duration</th><td>{{ $item->Duration }}</td></tr>
                <tr><th>Treatment ID</th><td>{{ $item->TreatmentID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('prescriptions.edit', $item->PrescriptionID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
