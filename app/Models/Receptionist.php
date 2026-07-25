<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $table = 'receptionist';
    protected $primaryKey = 'ReceptionistID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['FirstName', 'LastName', 'PhoneNumber', 'Email'];

    public function appointments()
    {
        return $this->hasMany(AppointmentModel::class, 'ReceptionistID', 'ReceptionistID');
    }
}
