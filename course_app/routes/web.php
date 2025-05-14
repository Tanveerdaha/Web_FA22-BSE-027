<?php

use App\Http\Controllers\CourseController;

Route::get('/', [CourseController::class, 'index'])->name('courses');
Route::get('/admin/add-course', [CourseController::class, 'showAddForm'])->name('add.form');
Route::post('/admin/add-course', [CourseController::class, 'add'])->name('add.course');

