<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function editCourse(Request $request, $id) {
        $course = Course::find($id);

        $course->course_name = $request->course_name;
        $course->duration = $request->duration;
        $course->status = $request->status;

        $course->save();
        return redirect()->route('course.name')->with('success', 'Course updated successfully');

    }

    public function editTeacher(Request $request, $id) {
        $teacher = Teachers::find($id);

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->password = $request->password;
        $teacher->course_id = $request->department;

        $teacher->save();
        return redirect()->back()->with('success', 'Teacher updated successfully');
    }

    public function editStudent(Request $request, $id) {
        $student = Students::find($id);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->course_id = $request->department;
        $student->teacher_id = $request->teacher;

        $student->save();
        return redirect()->back()->with('success', 'Teacher updated successfully');
    }
}
