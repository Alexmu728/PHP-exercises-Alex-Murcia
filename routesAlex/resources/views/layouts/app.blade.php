<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Add your CSS here -->
</head>
<body>
    <header>
        <h1>Website Header</h1>
    </header>

    <nav>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('events') }}">Events</a></li>
        </ul>
    </nav>

    <main>
        @yield('content') <!-- This is where the content will be injected -->
    </main>

    <footer>
        <p>Website Footer © {{ date('Y') }}</p>
    </footer>
</body>
</html>
