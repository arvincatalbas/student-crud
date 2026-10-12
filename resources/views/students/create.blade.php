@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="page-header">
        <div>
            <p class="section-kicker">Enrollment</p>
            <h1>Add Student</h1>
        </div>
    </div>

    <div class="panel form-panel">
        <div class="panel-header">
            <div>
                <h2>Student Details</h2>
                <p>Fill in the information below to create a new student record.</p>
            </div>
        </div>

        <form action="{{ route('students.store') }}" method="POST" class="student-form">
            @csrf

            @foreach (['name' => 'Full Name', 'email' => 'Email Address', 'course' => 'Course'] as $field => $label)
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label">
                        {{ $label }}
                    </label>

                    <input
                        type="{{ $field === 'email' ? 'email' : 'text' }}"
                        name="{{ $field }}"
                        id="{{ $field }}"
                        value="{{ old($field) }}"
                        class="form-control @error($field) is-invalid @enderror"
                        required
                    >

                    @error($field)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <div class="form-actions">
                <button class="primary-btn" type="submit">Save Student</button>
                <a href="{{ route('students.index') }}" class="secondary-btn">Cancel</a>
            </div>
        </form>
    </div>
@endsection
