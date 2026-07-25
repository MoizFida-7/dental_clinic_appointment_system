<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';
    protected $primaryKey = 'PrescriptionID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['MedicationName', 'Dosage', 'Duration', 'TreatmentID'];

    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'TreatmentID', 'TreatmentID');
    }
}
