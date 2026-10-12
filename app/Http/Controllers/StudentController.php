<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Schema;

class StudentController extends Controller
{
    public function index()
    {
        if (!Schema::hasTable('students')) {
            $students = new LengthAwarePaginator([], 0, 10);
            $stats = [
                'total_students' => 0,
                'total_courses' => 0,
                'latest_student' => 'No students yet',
            ];

            return view('students.index', compact('students', 'stats'));
        }

        $students = Student::latest()->paginate(10);
        $stats = [
            'total_students' => Student::count(),
            'total_courses' => Student::distinct()->count('course'),
            'latest_student' => Student::latest()->first()?->name ?? 'No students yet',
        ];

        return view('students.index', compact('students', 'stats'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
