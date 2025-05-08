<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Teachers;

class Students extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name',
        'password',
        'course_id',
        'email',
        'teacher_id',
        'status',
    ];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function teacher(){
        return $this->belongsTo(Teachers::class, 'teacher_id', 'id');
    }
}
