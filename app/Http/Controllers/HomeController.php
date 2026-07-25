<?php

namespace App\Http\Controllers;

use App\Models\AppointmentModel;
use App\Models\Dentist;
use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'patients' => Patient::count(),
            'dentists' => Dentist::count(),
            'appointments' => AppointmentModel::count(),
            'invoices' => Invoice::count(),
        ];

        return view('home', [
            'stats' => $stats,
            'user' => Auth::user(),
        ]);
    }
}
