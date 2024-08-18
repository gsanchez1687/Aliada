<?php

namespace App\Models;

use App\Models\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViewsProperty extends Model
{
    use HasFactory;
    protected $table = 'views_property';

    protected $fillable = [
        'property_id',
        'view_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function view()
    {
        return $this->belongsTo(View::class);
    }
}
