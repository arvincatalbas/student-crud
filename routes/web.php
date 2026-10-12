<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index']);

Route::redirect('/student', '/students');

Route::resource('students', StudentController::class);
