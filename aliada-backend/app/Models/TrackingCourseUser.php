<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingCourseUser extends Model
{
    use HasFactory;
    protected $fillable = ['course_user_id', 'video_id'];

    public function courseUser()
    {
        return $this->belongsTo(CourseUser::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
