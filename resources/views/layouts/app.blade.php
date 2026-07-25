<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dental Clinic Appointment System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand: #0d6efd;
            --brand-dark: #084298;
            --accent: #14b8a6;
            --bg: #f4f7fb;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
        }
        h1, h2, h3, h4, .navbar-brand, .card-header {
            font-family: 'Poppins', sans-serif;
        }
        .navbar-clinic {
            background: linear-gradient(90deg, var(--brand-dark), var(--brand));
            box-shadow: 0 2px 10px rgba(0,0,0,.15);
        }
        .navbar-clinic .navbar-brand {
            font-weight: 700;
            letter-spacing: .3px;
        }
        .navbar-clinic .nav-link {
            font-weight: 500;
        }
        .navbar-clinic .dropdown-menu {
            border: none;
            box-shadow: 0 8px 24px rgba(0,0,0,.15);
        }
        .user-chip {
            background: rgba(255,255,255,.15);
            border-radius: 50px;
            padding: 4px 14px;
            color: #fff;
        }
        .role-badge {
            font-size: .7rem;
            letter-spacing: .5px;
        }
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0,0,0,.06);
        }
        .btn-primary {
            background: var(--brand);
            border-color: var(--brand);
        }
        .table thead {
            font-size: .85rem;
            text-transform: uppercase;
            letter-spacing: .4px;
        }
        .content-wrap {
            padding-top: 8px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-clinic mb-4">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ auth()->check() ? url('/home') : url('/login') }}">
            <i class="bi bi-hospital fs-4"></i> Dental Clinic System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            @auth
            <ul class="navbar-nav me-auto flex-wrap">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="bi bi-speedometer2 me-1"></i>Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-clipboard2-pulse me-1"></i>Clinical</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('appointments.index') }}"><i class="bi bi-calendar-check me-2"></i>Appointments</a></li>
                        <li><a class="dropdown-item" href="{{ route('treatments.index') }}"><i class="bi bi-heart-pulse me-2"></i>Treatments</a></li>
                        <li><a class="dropdown-item" href="{{ route('prescriptions.index') }}"><i class="bi bi-capsule me-2"></i>Prescriptions</a></li>
                        <li><a class="dropdown-item" href="{{ route('xrayrecords.index') }}"><i class="bi bi-file-earmark-medical me-2"></i>X-Ray Records</a></li>
                    </ul>
                </li>

                @if(auth()->user()->isStaff())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-people me-1"></i>Administration</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('patients.index') }}"><i class="bi bi-person me-2"></i>Patients</a></li>
                        <li><a class="dropdown-item" href="{{ route('dentists.index') }}"><i class="bi bi-person-badge me-2"></i>Dentists</a></li>
                        <li><a class="dropdown-item" href="{{ route('receptionists.index') }}"><i class="bi bi-person-vcard me-2"></i>Receptionists</a></li>
                        <li><a class="dropdown-item" href="{{ route('specializations.index') }}"><i class="bi bi-star me-2"></i>Specializations</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-cash-coin me-1"></i>Billing</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('invoices.index') }}"><i class="bi bi-receipt me-2"></i>Invoices</a></li>
                        <li><a class="dropdown-item" href="{{ route('payments.index') }}"><i class="bi bi-credit-card me-2"></i>Payments</a></li>
                        <li><a class="dropdown-item" href="{{ route('reminders.index') }}"><i class="bi bi-bell me-2"></i>Reminders</a></li>
                    </ul>
                </li>
                @endif
            </ul>

            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                <li class="nav-item">
                    <span class="user-chip d-inline-flex align-items-center gap-2">
                        <i class="bi bi-person-circle"></i>
                        <span>{{ auth()->user()->name }}</span>
                        <span class="badge bg-light text-dark role-badge text-uppercase">{{ auth()->user()->role }}</span>
                    </span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item"><a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="btn btn-light btn-sm text-primary fw-semibold" href="{{ route('register') }}">Register</a></li>
            </ul>
            @endauth
        </div>
    </div>
</nav>

<div class="container content-wrap">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
