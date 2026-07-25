<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'specialization';
    protected $primaryKey = 'SpecializationID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['SpecializationName', 'Description'];

    public function dentists()
    {
        return $this->hasMany(Dentist::class, 'SpecializationID', 'SpecializationID');
    }
}
