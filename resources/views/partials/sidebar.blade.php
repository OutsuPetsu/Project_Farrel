{{-- Sidebar menu per peran. $role: admin | kasir | kurir --}}
@php
    $icons = [
        'grid'    => '<rect x="4" y="4" width="7" height="7" rx="1.5"/><rect x="13" y="4" width="7" height="7" rx="1.5"/><rect x="4" y="13" width="7" height="7" rx="1.5"/><rect x="13" y="13" width="7" height="7" rx="1.5"/>',
        'tag'     => '<path d="M3 12V4h8l10 10-8 8L3 12z"/><circle cx="7.5" cy="8.5" r="1.2"/>',
        'receipt' => '<path d="M6 3h12v18l-3-2-3 2-3-2-3 2V3z"/><path d="M9 8h6M9 12h6"/>',
        'truck'   => '<path d="M3 6h11v10H3zM14 10h4l3 3v3h-7"/><circle cx="7" cy="17.5" r="1.8"/><circle cx="17" cy="17.5" r="1.8"/>',
        'chart'   => '<path d="M4 20V4M4 20h16M8 16v-5M13 16V8M18 16v-8"/>',
        'store'   => '<path d="M4 9l1.5-5h13L20 9M4 9v11h16V9M4 9h16M10 20v-6h4v6"/>',
        'list'    => '<path d="M4 7h16M4 12h16M4 17h10"/>',
        'clock'   => '<circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/>',
    ];

    $menus = [
        'admin' => [
            ['Dashboard',      'admin.dashboard', 'grid'],
            ['Data Layanan',   'admin.dashboard', 'tag',     '#layanan'],
            ['Transaksi',      'kasir.transaksi', 'receipt'],
            ['Jadwal Kurir',   'kurir.tugas',     'truck'],
            ['Laporan Omzet',  'admin.dashboard', 'chart',   '#omzet'],
            ['Profil Laundry', 'admin.dashboard', 'store',   '#profil'],
        ],
        'kasir' => [
            ['Transaksi baru', 'kasir.transaksi', 'receipt'],
            ['Jadwal kurir',   'kasir.transaksi', 'truck',   '#jadwal'],
            ['Status pesanan', 'kurir.tugas',     'list'],
        ],
        'kurir' => [
            ['Tugas hari ini', 'kurir.tugas',     'truck'],
            ['Riwayat tugas',  'kurir.tugas',     'clock',   '#riwayat'],
        ],
    ];

    $namaPeran = ['admin' => 'Admin', 'kasir' => 'Kasir', 'kurir' => 'Kurir'][$role];
    $inisial   = ['admin' => 'AD',    'kasir' => 'KS',    'kurir' => 'KR'][$role];
@endphp

<aside class="sidebar">
    <div>
        <div class="brand">
            <div class="brand-mark">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linejoin="round" aria-hidden="true"><path d="M12 3s6 6.5 6 11a6 6 0 0 1-12 0c0-4.5 6-11 6-11z"/></svg>
            </div>
            <span class="brand-name">FreshClean</span>
        </div>

        <nav class="nav" aria-label="Menu {{ $namaPeran }}">
            @foreach ($menus[$role] as $i => $m)
                <a href="{{ route($m[1]) }}{{ $m[3] ?? '' }}"
                   class="{{ $i === 0 ? 'active' : '' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $icons[$m[2]] !!}</svg>
                    {{ $m[0] }}
                </a>
            @endforeach
        </nav>
    </div>

    <div class="user">
        <div class="avatar">{{ $inisial }}</div>
        <div>
            <strong>{{ $namaPeran }}</strong>
            <small><a href="{{ route('login') }}">Keluar</a></small>
        </div>
    </div>
</aside>
