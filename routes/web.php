<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\XrayRecordController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReminderController;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('home') : redirect()->route('login');
});

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Clinic administration & billing - staff (admin/receptionist) only
    Route::middleware('staff')->group(function () {
        Route::resource('specializations', SpecializationController::class);
        Route::resource('patients', PatientController::class);
        Route::resource('receptionists', ReceptionistController::class);
        Route::resource('dentists', DentistController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('reminders', ReminderController::class);
    });

    // Clinical workflow - open to any authenticated user (patient, dentist, staff)
    Route::resource('appointments', AppointmentController::class);
    Route::resource('treatments', TreatmentController::class);
    Route::resource('prescriptions', PrescriptionController::class);
    Route::resource('xrayrecords', XrayRecordController::class);
});
