@extends('layouts.app')
@section('title', 'Jadwal Kurir')

@php
    $pill = [
        'Selesai'              => 'pill-ok',
        'Dalam perjalanan'     => 'pill-info',
        'Menunggu cucian siap' => 'pill-warn',
        'Menunggu'             => '',
    ];
@endphp

@section('content')
<header class="page-head">
    <div>
        <h1>Tugas hari ini</h1>
        <p>Senin, 16 November 2026. Perbarui status setiap kali pakaian berpindah tangan.</p>
    </div>
</header>

<section class="grid-kpi" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr))">
    @foreach ($ringkas as $label => $jumlah)
        <div class="kpi" style="padding:18px 20px;gap:4px">
            <span>{{ $label }}</span>
            <strong style="font-size:26px">{{ $jumlah }}</strong>
        </div>
    @endforeach
</section>

<section style="display:flex;flex-direction:column;gap:12px">
    @foreach ($tugas as $i => [$jam, $jenis, $nama, $info, $status, $opsi, $aktif])
        <div class="task {{ $aktif ? 'current' : '' }}">
            <div class="task-time"><strong class="num">{{ $jam }}</strong><small>{{ $jenis }}</small></div>
            <div class="task-info">
                <strong style="font-size:15px">{{ $nama }}</strong>
                <span>[ALAMAT PELANGGAN] · {{ $info }}</span>
            </div>
            <span class="pill {{ $pill[$status] ?? '' }}">{{ $status }}</span>

            @if (count($opsi))
                <form class="task-form" method="POST" action="#" onsubmit="return false">
                    @csrf
                    <select name="status" aria-label="Status {{ strtolower($jenis) }} {{ $nama }}"
                            style="height:44px;padding:0 10px;border:1px solid var(--field);border-radius:10px;font:inherit;font-size:14px;background:#fff;color:var(--ink)">
                        @foreach ($opsi as $o) <option @selected($o === $status)>{{ $o }}</option> @endforeach
                    </select>
                    <button type="submit" class="btn">Perbarui</button>
                </form>
            @else
                <a href="#riwayat" class="btn btn-ghost">Detail</a>
            @endif
        </div>
    @endforeach
</section>

<p id="riwayat" class="muted" style="font-size:13px">Nama dan alamat di atas adalah contoh. Riwayat tugas akan tampil di bagian ini setelah data tersambung.</p>
@endsection
