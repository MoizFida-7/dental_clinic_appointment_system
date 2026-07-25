@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 col-lg-5">
        <div class="card p-2">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 mb-3" style="width:64px;height:64px;">
                        <i class="bi bi-person-plus text-primary fs-3"></i>
                    </div>
                    <h3 class="fw-bold mb-1">Create Your Account</h3>
                    <p class="text-muted mb-0">Join Dental Clinic System</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Your full name" required autofocus>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="you@example.com" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">I am a</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-briefcase"></i></span>
                            <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                <option value="patient" {{ old('role', 'patient') == 'patient' ? 'selected' : '' }}>Patient</option>
                                <option value="dentist" {{ old('role') == 'dentist' ? 'selected' : '' }}>Dentist</option>
                                <option value="receptionist" {{ old('role') == 'receptionist' ? 'selected' : '' }}>Receptionist</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="form-text">Patients &amp; dentists get access to appointments and treatment records. Receptionists and admins also manage clinic staff and billing.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                        <i class="bi bi-check2-circle me-1"></i>Create Account
                    </button>
                </form>

                <p class="text-center mt-4 mb-0 text-muted">
                    Already have an account? <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Login here</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
