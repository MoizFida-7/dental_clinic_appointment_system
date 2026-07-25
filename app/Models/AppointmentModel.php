<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointment';
    protected $primaryKey = 'AppointmentID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['AppointmentDate', 'AppointmentTime', 'Status', 'PatientID', 'DentistID', 'ReceptionistID'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID', 'PatientID');
    }
    public function dentist()
    {
        return $this->belongsTo(Dentist::class, 'DentistID', 'DentistID');
    }
    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class, 'ReceptionistID', 'ReceptionistID');
    }
    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'AppointmentID', 'AppointmentID');
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'AppointmentID', 'AppointmentID');
    }
    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'AppointmentID', 'AppointmentID');
    }
}
