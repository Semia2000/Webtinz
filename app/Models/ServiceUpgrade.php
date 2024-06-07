<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUpgrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'service_type',
        'description',
        'products_services',
        'commerce_mode',
        'sector',
        'productcategory',
        'others_services',
        'subscription_id',
        'template_id',
        'statusplan',
        'start_date',
        'end_date',
        'is_pay_done'
        

    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscriptionplan::class, 'subscription_id');
    }

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

}
