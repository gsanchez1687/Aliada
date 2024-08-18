<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProperty extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
