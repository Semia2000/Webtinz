<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptionplan extends Model
{
    use HasFactory;

    protected $table = 'subscriptionplans';
    protected $fillable = [
        'name',
        'description',
        'typeservice',
        'price',
        'duration',
        'features',
        'setupfee',
    ];
}
