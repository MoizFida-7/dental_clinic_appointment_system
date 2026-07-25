<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'InvoiceID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['InvoiceDate', 'TotalAmount', 'Status', 'AppointmentID'];

    public function appointmentModel()
    {
        return $this->belongsTo(AppointmentModel::class, 'AppointmentID', 'AppointmentID');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'InvoiceID', 'InvoiceID');
    }
}
