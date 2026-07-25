<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatment';
    protected $primaryKey = 'TreatmentID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['TreatmentName', 'Description', 'TreatmentCost', 'AppointmentID'];

    public function appointmentModel()
    {
        return $this->belongsTo(AppointmentModel::class, 'AppointmentID', 'AppointmentID');
    }
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'TreatmentID', 'TreatmentID');
    }
}
