<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminder';
    protected $primaryKey = 'ReminderID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['ReminderDate', 'ReminderType', 'Status', 'AppointmentID'];

    public function appointmentModel()
    {
        return $this->belongsTo(AppointmentModel::class, 'AppointmentID', 'AppointmentID');
    }
}
