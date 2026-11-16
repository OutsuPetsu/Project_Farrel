<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login FreshClean Laundry</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/freshclean.css') }}">
</head>
<body>
<div class="login">
    <section class="login-brand">
        <div class="brand" style="margin:0">
            <div class="brand-mark" style="width:44px;height:44px;border-radius:12px">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" aria-hidden="true"><path d="M12 3s6 6.5 6 11a6 6 0 0 1-12 0c0-4.5 6-11 6-11z"/></svg>
            </div>
            <span class="brand-name" style="font-size:22px">FreshClean Laundry</span>
        </div>

        <div style="display:flex;flex-direction:column;gap:28px">
            <h1>Cucian masuk, status terpantau, omzet tercatat.</h1>
            <p style="font-size:16px;line-height:1.6;color:var(--side-text);max-width:520px">
                Sistem informasi manajemen operasional dan distribusi logistik untuk Admin, Kasir, Kurir, dan Pelanggan.
            </p>
            <ul>
                <li>Transaksi dan nota</li>
                <li>Jadwal kurir</li>
                <li>Pelacakan status pakaian</li>
                <li>Laporan omzet otomatis</li>
            </ul>
        </div>

        <p style="font-size:12px;color:#8FB0B6">Proyek Pemrograman Framework, Laravel. Mhd Farrel Iksan, 2557301059.</p>
    </section>

    <section class="login-form">
        <div class="login-box">
            <div>
                <h2 style="font-size:30px">Masuk</h2>
                <p class="muted" style="font-size:14px;margin-top:6px">Gunakan akun sesuai peran Anda.</p>
            </div>

            {{-- Tahap tampilan: tombol Masuk menuju dashboard Admin. Ganti action ke route autentikasi (Breeze/Fortify) saat backend siap. --}}
            <form method="POST" action="{{ route('admin.dashboard') }}" onsubmit="window.location='{{ route('admin.dashboard') }}'; return false;">
                @csrf
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@freshclean.id" required>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="field">
                    <label for="password">Kata sandi</label>
                    <input id="password" name="password" type="password" placeholder="Masukkan kata sandi" required>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn" style="min-height:48px;font-size:15px">Masuk</button>
            </form>

            <div style="display:flex;flex-direction:column;gap:12px;padding-top:24px;border-top:1px solid var(--line)">
                <p class="eyebrow">Lihat tampilan per peran</p>
                <div class="role-grid">
                    <a class="btn btn-ghost" href="{{ route('admin.dashboard') }}">Admin</a>
                    <a class="btn btn-ghost" href="{{ route('kasir.transaksi') }}">Kasir</a>
                    <a class="btn btn-ghost" href="{{ route('kurir.tugas') }}">Kurir</a>
                    <a class="btn btn-ghost" href="{{ route('pelanggan.pesanan') }}">Pelanggan</a>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
