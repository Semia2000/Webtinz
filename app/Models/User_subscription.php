<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_subscription extends Model
{
    use HasFactory;

    protected $table = 'user_subscriptions';

    protected $fillable = [
        'user_id',
        'website_id',
        'subscription_plan_id',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

}
