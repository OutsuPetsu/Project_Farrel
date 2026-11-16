<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'FreshClean Laundry')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/freshclean.css') }}">
</head>
<body>
<div class="app">
    @include('partials.sidebar', ['role' => $role])
    <main class="main">
        @yield('content')
    </main>
</div>
</body>
</html>
