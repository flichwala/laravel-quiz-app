<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Quizy Laravel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Quizy</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quizzes.index') }}">Quizy</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container pb-5">
        @yield('content')
    </main>
</body>
</html>
