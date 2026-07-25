<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'PaymentID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['PaymentDate', 'AmountPaid', 'PaymentMethod', 'InvoiceID'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'InvoiceID', 'InvoiceID');
    }
}
