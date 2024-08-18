<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'logo'];

    public function courseVideos()
    {
        return $this->hasMany(CourseVideo::class);
    }
}
