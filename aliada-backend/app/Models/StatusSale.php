<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusSale extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'machine_name'];

    // Define the relationship with the Sale model
    public function sales()
    {
        return $this->hasMany(Sale::class, 'status_sales_id');
    }
}
