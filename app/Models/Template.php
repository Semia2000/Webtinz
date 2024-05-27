<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'description',
        'name',
        'access_level',
        'typeservice',
        'createby',
        'price',
        'typetemplate',
        'productcategory',
        'commerce_mode',
        'industrie',
        'thumbnail',
        'zip_file',
        'description'
        
    ];

}
