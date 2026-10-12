@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="page-header">
        <div>
            <p class="section-kicker">Update</p>
            <h1>Edit Student</h1>
        </div>
    </div>

    <div class="panel form-panel">
        <div class="panel-header">
            <div>
                <h2>Student Details</h2>
                <p>Update the record for {{ $student->name }}.</p>
            </div>
        </div>

        <form action="{{ route('students.update', $student) }}" method="POST" class="student-form">
            @csrf
            @method('PUT')

            @foreach (['name' => 'Full Name', 'email' => 'Email Address', 'course' => 'Course'] as $field => $label)
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label">
                        {{ $label }}
                    </label>

                    <input type="{{ $field === 'email' ? 'email' : 'text' }}" name="{{ $field }}" id="{{ $field }}"
                        value="{{ old($field, $student->$field) }}" class="form-control @error($field) is-invalid @enderror"
                        required>

                    @error($field)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <div class="form-actions">
                <button class="primary-btn" type="submit">Update Student</button>
                <a href="{{ route('students.index') }}" class="secondary-btn">Cancel</a>
            </div>
        </form>
    </div>
@endsection
