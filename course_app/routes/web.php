<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

// Auth routes
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public course routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses');

// Admin only routes
Route::middleware('admin')->group(function () {
    Route::get('/courses/add', [CourseController::class, 'showAddForm'])->name('course.add.form');
    Route::post('/courses/add', [CourseController::class, 'add'])->name('course.add');   
    Route::post('/courses/{id}/delete', [CourseController::class, 'delete'])->name('course.delete');
});