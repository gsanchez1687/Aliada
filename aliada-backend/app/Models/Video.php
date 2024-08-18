<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'title'];

    public function trackingCourseUsers()
    {
        return $this->hasMany(TrackingCourseUser::class);
        
    }

    public function courseVideos()
    {
        return $this->hasMany(CourseVideo::class);
    }
}
