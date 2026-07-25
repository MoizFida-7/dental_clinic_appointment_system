<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'PatientID';
    public $incrementing = true;
    protected $keyType = 'int';
     public $timestamps = false;
    protected $fillable = ['FirstName', 'LastName', 'Gender', 'DateOfBirth', 'PhoneNumber', 'Email', 'Address', 'RegistrationDate'];

    public function appointments()
    {
        return $this->hasMany(AppointmentModel::class, 'PatientID', 'PatientID');
    }
    public function xrayrecords()
    {
        return $this->hasMany(XrayRecord::class, 'PatientID', 'PatientID');
    }
}
