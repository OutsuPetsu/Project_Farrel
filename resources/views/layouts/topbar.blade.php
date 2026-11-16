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
<header class="topbar">
    <div class="brand" style="margin:0">
        <div class="brand-mark">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" aria-hidden="true"><path d="M12 3s6 6.5 6 11a6 6 0 0 1-12 0c0-4.5 6-11 6-11z"/></svg>
        </div>
        <span class="brand-name">FreshClean</span>
    </div>
    <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap">
        <nav class="nav" aria-label="Menu Pelanggan">
            <a href="{{ route('pelanggan.pesanan') }}" class="active">Pesanan saya</a>
            <a href="{{ route('pelanggan.pesanan') }}#riwayat">Riwayat nota</a>
        </nav>
        <div style="display:flex;align-items:center;gap:10px">
            <div class="avatar">{{ $inisial ?? 'PL' }}</div>
            <a href="{{ route('login') }}" style="font-size:13px;color:var(--side-text)">Keluar</a>
        </div>
    </div>
</header>

<main class="container">
    @yield('content')
</main>
</body>
</html>
