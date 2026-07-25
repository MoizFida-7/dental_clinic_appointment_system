@extends('layouts.app')

@section('title', 'Specialization Details')

@section('content')
<h3>Specialization #{{ $item->SpecializationID }}</h3>

<table class="table table-bordered w-50">
    <tbody>
                <tr><th>SpecializationID</th><td>{{ $item->SpecializationID }}</td></tr>
                <tr><th>Specialization Name</th><td>{{ $item->SpecializationName }}</td></tr>
                <tr><th>Description</th><td>{{ $item->Description }}</td></tr>
    </tbody>
</table>

<a href="{{ route('specializations.edit', $item->SpecializationID) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('specializations.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
