<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'course_id',
        'password',
        'email',
        'total_student'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function students(){
        return $this->hasMany(Students::class, 'teacher_id', 'id');
    }
}
