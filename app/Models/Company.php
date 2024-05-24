<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companys';

    protected $fillable = [
        'name',
        'email',
        'address',
        'tel',
        'country',
        'state',
        'user_id',
        'sector',
        'description',
        'chiffre_affaire',
        'nbr_employes'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
