<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTemplate extends Model
{
    use HasFactory;
    protected $table = 'typetemplates';
    protected $fillable = [
        'name',
    ];
}
