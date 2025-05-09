<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\RemovedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Authentication Routes
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'loggedIn'])->name('login.name');
Route::get('/signup', [LoginController::class, 'signup'])->name('signup.name');
Route::post('/register', [LoginController::class, 'register'])->name('register.name');

//Admin Routes
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.name');
Route::get('/profile', [AdminController::class, 'profile'])->name('profile.name');
Route::get('/course', [AdminController::class, 'course'])->name('course.name');
Route::get('/teachers', [AdminController::class, 'teachers'])->name('teachers.name');
Route::get('/students', [AdminController::class, 'students'])->name('students.name');
Route::get('/request', [AdminController::class, 'request'])->name('request.name');
Route::get('/inbox', [AdminController::class, 'inbox'])->name('inbox.name');

//Add Routes
Route::post('/course', [AddController::class, 'addCourse'])->name('course.name');
Route::post('/teacher', [AddController::class, 'addTeacher'])->name('teacher.name');
Route::post('/students', [AddController::class, 'addStudent'])->name('students.name');

//Edit Routes
Route::put('/course/update/{id}', [EditController::class, 'editCourse'])->name('course.edit');
Route::put('/teacher/update/{id}', [EditController::class, 'editTeacher'])->name('teacher.edit');
Route::put('/students/update/{id}', [EditController::class, 'editStudent'])->name('student.edit');

//Remove Routes
Route::get('/course/delete/{id}', [RemovedController::class, 'deleteCourse'])->name('course.delete');
Route::get('/teacher/delete/{id}', [RemovedController::class, 'teacherCourse'])->name('teacher.delete');
