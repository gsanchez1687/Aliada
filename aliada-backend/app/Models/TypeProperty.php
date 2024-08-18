<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProperty extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function typologies()
    {
        return $this->belongsToMany(Typology::class, 'property_typology', 'type_property_id', 'typology_id');
    }
}
