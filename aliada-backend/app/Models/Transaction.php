<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id', 'user_id', 'type', 'amount', 'currency', 'description', 'status_id', 'metadata'
    ];

    public function status()
    {
        return $this->belongsTo(TransactionStatus::class);
    }
}
