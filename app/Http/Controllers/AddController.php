<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Client;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function addCourse(Request $request){
        $course = new Course();

        $course->course_name = $request->course_name;
        $course->duration = $request->duration;
        $course->status = $request->status;

        $course->save();
        return redirect()->back()->with('success', 'Course added successfully');
    }

    public function addTeacher(Request $request) {
        $teacher = new Teachers();

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->course_id = $request->department;
        $teacher->password = $request->password;

        $teacher->save();
        return redirect()->back()->with('success', 'Teacher added successfully');
    }

    public function addStudent(Request $request) {
        $student = new Students();

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->course_id = $request->department;
        $student->teacher_id = $request->teacher;
        $student->password = $request->password;

        $student->save();
        return redirect()->back()->with('success', 'Student added successfully');
    }
}
