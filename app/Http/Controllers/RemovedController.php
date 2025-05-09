<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teachers;
use Illuminate\Http\Request;

class RemovedController extends Controller
{
    public function deleteCourse($id){
        Course::find($id)->delete();
        return redirect()->back()->with('success', 'Course deleted successfully');
    }

    public function deleteTeacher($id){
        Teachers::find($id)->delete();
        return redirect()->back()->with('success', 'Teacher removed successfully');
    }
}
