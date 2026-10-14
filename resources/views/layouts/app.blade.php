<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <title>@yield('title', 'Student Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="app-shell">
        <nav class="topbar">
            <div class="brand-wrap">
                <span class="brand-icon">S</span>
                <div>
                    <span class="brand-kicker">Academic Portal</span>
                    <a class="brand-name" href="{{ route('students.index') }}">Student Management</a>
                </div>
            </div>
        </nav>

        <main class="content-shell">
            @yield('content')
        </main>
    </div>
<script>
    // Display success messages
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: @json(session('success')),
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6',
            timer: 3000,
            timerProgressBar: true
        });
    @endif

    // Display failure messages
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: @json(session('error')),
            confirmButtonText: 'Try Again',
            confirmButtonColor: '#d33'
        });
    @endif

    // Display validation errors
    @if ($errors->any())
        Swal.fire({
            icon: 'warning',
            title: 'Please check your input',
            text: @json($errors->first()),
            confirmButtonText: 'Fix it',
            confirmButtonColor: '#f0ad4e'
        });
    @endif

    // Confirm deletion before submitting the form
    document.querySelectorAll('.confirm-update-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Save changes?',
                text: 'Do you want to update this student?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'Cancel'
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });


    // Confirm deletion before submitting the form
    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'This student will be permanently deleted.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
</body>
</html>
