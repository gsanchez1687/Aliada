<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'label_id',
        'type_property_id',
        'price',
        'range_price_estimated_1',
        'range_price_estimated_2',
        'slug',
        'square_meters',
        'rooms',
        'bathroom',
        'parking',
        'state_id',
        'municipality_id',
        'address',
        'description',
        'title',
        'description',
        'views',
        'coordinates_x',
        'coordinates_y',
        'builder',
        'date_delivery',
        'currency',
        'half_bathroom',
        'capture',
        'estimated_monthly_payment',
        'maintenance_fee',
        'aliado_user_id',
        'postal_code',
        'typology_id'
    ];


    public function images()
    {
        return $this->hasMany(ImageProperty::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function typeProperty()
    {
        return $this->belongsTo(TypeProperty::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    public function latestApproval()
    {
        return $this->hasOne(Approval::class)
            ->latestOfMany('created_at'); 
    }

    public function viewsProperty()
    {
        return $this->hasMany(ViewsProperty::class);
    }
    
    public function sale()
    {
        return $this->hasOne(Sale::class);
    }

    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class);
    }

    public function label()
    {
        return $this->belongsTo(LabelCategory::class, 'label_id');
    }

    public function typology()
    {
        return $this->belongsTo(Typology::class);
    }
    
}
