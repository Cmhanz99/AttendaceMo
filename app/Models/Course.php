<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'course_name',
        'duration',
        'total_student',
        'total_teacher',
        'status',
    ];

    public function students()
    {
        return $this->hasMany(Students::class, 'course_id', 'id');
    }
    public function teachers()
    {
        return $this->hasMany(Teachers::class, 'course_id', 'id');
    }
}
