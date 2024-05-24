<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'products_services',
        'sector',
        'others_services',
        'subscription_id',
        'template_id'
        
    ];
}
