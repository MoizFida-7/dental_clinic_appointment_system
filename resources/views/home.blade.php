@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card mb-4" style="background: linear-gradient(90deg, #084298, #0d6efd); color: #fff;">
    <div class="card-body p-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">Welcome back, {{ $user->name }} 👋</h2>
            <span class="badge bg-light text-primary text-uppercase">{{ $user->role }}</span>
        </div>
        <i class="bi bi-hospital" style="font-size: 3rem; opacity: .35;"></i>
    </div>
</div>

<div class="row g-3">
    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                    <i class="bi bi-person text-primary fs-4"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $stats['patients'] }}</h4>
                    <span class="text-muted small">Patients</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                    <i class="bi bi-person-badge text-success fs-4"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $stats['dentists'] }}</h4>
                    <span class="text-muted small">Dentists</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                    <i class="bi bi-calendar-check text-warning fs-4"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $stats['appointments'] }}</h4>
                    <span class="text-muted small">Appointments</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center" style="width:52px;height:52px;">
                    <i class="bi bi-receipt text-info fs-4"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $stats['invoices'] }}</h4>
                    <span class="text-muted small">Invoices</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">Quick Links</h5>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('appointments.index') }}" class="btn btn-primary"><i class="bi bi-calendar-check me-1"></i>Appointments</a>
            <a href="{{ route('treatments.index') }}" class="btn btn-outline-primary"><i class="bi bi-heart-pulse me-1"></i>Treatments</a>
            <a href="{{ route('prescriptions.index') }}" class="btn btn-outline-primary"><i class="bi bi-capsule me-1"></i>Prescriptions</a>
            <a href="{{ route('xrayrecords.index') }}" class="btn btn-outline-primary"><i class="bi bi-file-earmark-medical me-1"></i>X-Ray Records</a>
            @if($user->isStaff())
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary"><i class="bi bi-person me-1"></i>Patients</a>
                <a href="{{ route('dentists.index') }}" class="btn btn-outline-secondary"><i class="bi bi-person-badge me-1"></i>Dentists</a>
                <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary"><i class="bi bi-receipt me-1"></i>Invoices</a>
                <a href="{{ route('payments.index') }}" class="btn btn-outline-secondary"><i class="bi bi-credit-card me-1"></i>Payments</a>
                <a href="{{ route('reminders.index') }}" class="btn btn-outline-secondary"><i class="bi bi-bell me-1"></i>Reminders</a>
            @endif
        </div>
    </div>
</div>
@endsection
