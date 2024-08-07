<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_type',
        'description',
        'products_services',
        'commerce_mode',
        'sector',
        'productcategory',
        'others_services',
        'template_id',
        'subscription_id',
        'start_date',
        'end_date',
        'statusplan',
        'is_pay_done',
        'is_deployed'
        
    ];

    public function sales(){
        return $this->hasOne(User::class, 'id', 'sales_id');
    }

    public function tech(){
        return $this->hasOne(User::class, 'id', 'tech_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function subscription()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function upgrades()
    {
        return $this->hasMany(ServiceUpgrade::class);
    }
}
