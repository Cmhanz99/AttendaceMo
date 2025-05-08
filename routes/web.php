<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

