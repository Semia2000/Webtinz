<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectorbusiness extends Model
{
    use HasFactory;
    protected $table = 'sectorbusiness';
    protected $fillable = [
        'name',
    ];
}
