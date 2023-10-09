<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc', 'video_url', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
