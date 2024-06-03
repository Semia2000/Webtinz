<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'paymenthistorys';

    protected $fillable = [
        'user_id',
        'service_id',
        'payment_id',
        'paymenthistorys',
        'paymentmethod',
        'payment_date',
        'amount',
        'status',
        'currency',
        'partyIdType'
    ];
}
