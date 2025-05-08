<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Course;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $user = session('user_id');

        $client = Client::where('id',$user)->first();
        return view('admin.admin' ,compact('client'));
    }

    public function profile(){
        $user = session('user_id');

        $client = Client::where('id',$user)->first();
        return view('admin.profile' ,compact('client'));
    }

    public function course(){
        $user = session('user_id');
        $course = Course::all();

        $client = Client::where('id',$user)->first();
        return view('admin.course' ,compact('client', 'course'));
    }

    public function teachers(){
        $user = session('user_id');
        $teachers = Teachers::all();

        $client = Client::where('id',$user)->first();
        return view('admin.teachers', compact('client', 'teachers'));
    }

    public function students(){
        $user = session('user_id');
        $students = Students::all();

        $client = Client::where('id',$user)->first();
        return view('admin.students', compact('client', 'students'));
    }

    public function request(){
        $user = session('user_id');

        $client = Client::where('id',$user)->first();
        return view('admin.request', compact('client'));
    }

    public function inbox(){
        $user = session('user_id');

        $client = Client::where('id',$user)->first();
        return view('admin.inbox', compact('client'));
    }
}
