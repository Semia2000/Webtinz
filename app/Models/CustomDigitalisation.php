<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDigitalisation extends Model
{
    protected $table = 'customrequests';
    protected $fillable = [
        'name',
        'typerequest',
        'user_id',
        'status',
        'request' 
    ];
}
