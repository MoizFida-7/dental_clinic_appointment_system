<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    protected $table = 'dentist';
    protected $primaryKey = 'DentistID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['FirstName', 'LastName', 'PhoneNumber', 'Email', 'SpecializationID'];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'SpecializationID', 'SpecializationID');
    }
    public function appointments()
    {
        return $this->hasMany(AppointmentModel::class, 'DentistID', 'DentistID');
    }
}
