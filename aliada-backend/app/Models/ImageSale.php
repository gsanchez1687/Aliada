<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSale extends Model
{
    use HasFactory;
      protected $table = 'image_sales';

      protected $fillable = ['sale_id', 'url'];

      public function sale()
      {
          return $this->belongsTo(Sale::class);
      }
}
