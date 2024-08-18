<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    
    protected $fillable = ['start_date', 'end_date', 'transaction_id', 'status_subscription_id', 'user_id'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function status()
    {
        return $this->belongsTo(SubscriptionStatus::class, 'status_subscription_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
