<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Student Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
</body>
</html>
