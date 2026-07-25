<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XrayRecord extends Model
{
    protected $table = 'xrayrecord';
    protected $primaryKey = 'XRayID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['FilePath', 'UploadDate', 'Notes', 'PatientID'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID', 'PatientID');
    }
}
