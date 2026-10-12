<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index']);

Route::redirect('/student', '/students');

Route::get('/students/{id}/edit', function ($id) {
    $student = Student::find($id);

    if (! $student) {
        return redirect()->route('students.index')->with('error', 'Student not found.');
    }

    return app(StudentController::class)->edit($student);
})->whereNumber('id');

Route::resource('students', StudentController::class);
