@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="page-header">
    <div>
        <p class="section-kicker">Overview</p>
        <h1>Student Directory</h1>
    </div>

    <a href="{{ route('students.create') }}" class="primary-btn">+ Add Student</a>
</div>

@if (session('success'))
    <div class="status-banner success">
        {{ session('success') }}
    </div>
@endif

<div class="stat-grid">
    <div class="stat-card">
        <span>Total Students</span>
        <strong>{{ $stats['total_students'] }}</strong>
        <small>Across all active records</small>
    </div>

    <div class="stat-card">
        <span>Course Types</span>
        <strong>{{ $stats['total_courses'] }}</strong>
        <small>Unique course entries</small>
    </div>

    <div class="stat-card">
        <span>Latest Student</span>
        <strong>{{ Str::limit($stats['latest_student'], 18) }}</strong>
        <small>Most recently added</small>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h2>Records</h2>
            <p>Manage the current student list.</p>
        </div>
    </div>

    <div class="table-shell">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>#{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->course }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('students.edit', $student) }}" class="warning-btn">
                                        Edit
                                    </a>

                                    <form action="{{ route('students.destroy', $student) }}" method="POST"
                                          onsubmit="return confirm('Delete this student?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="danger-btn">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">No student record found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($students->count() > 0)
            {{ $students->links() }}
        @endif
    </div>
</div>
@endsection
