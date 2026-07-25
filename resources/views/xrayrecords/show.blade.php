@extends('layouts.app')

@section('title', 'XrayRecord Details')

@section('content')
<h3>XrayRecord #{{ $item->XRayID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>XRayID</th><td>{{ $item->XRayID }}</td></tr>
                <tr><th>File Path</th><td>{{ $item->FilePath }}</td></tr>
                <tr><th>Upload Date</th><td>{{ $item->UploadDate }}</td></tr>
                <tr><th>Notes</th><td>{{ $item->Notes }}</td></tr>
                <tr><th>Patient ID</th><td>{{ $item->PatientID }}</td></tr>
    </tbody>
</table>

<a href="{{ route('xrayrecords.edit', $item->XRayID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('xrayrecords.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
