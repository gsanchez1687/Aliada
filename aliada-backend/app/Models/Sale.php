<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'user_id',
    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function imageSales()
    {
        return $this->hasMany(ImageSale::class);
    }
    public function statusSale()
    {
        return $this->belongsTo(StatusSale::class, 'status_sales_id');
    }
}
