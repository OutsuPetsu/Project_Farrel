@extends('layouts.topbar')
@section('title', 'Pesanan Saya')

@php
    $pill = ['Selesai' => 'pill-ok', 'Diproses' => 'pill-warn'];
@endphp

@section('content')
<div>
    <h1>Halo, {{ $nama }}</h1>
    <p class="muted" style="font-size:14px;margin-top:4px">Pantau status cucian dan lihat riwayat nota Anda.</p>
</div>

<section class="card" style="padding:28px;gap:24px">
    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:12px;align-items:flex-start">
        <div>
            <span class="eyebrow">Pesanan aktif</span>
            <h2 style="font-size:22px;margin-top:4px">Nota FC-161126-0027</h2>
            <span class="muted" style="font-size:14px">Cuci kering setrika 4,5 kg, setrika saja 2 kg, bedcover 1 pcs</span>
        </div>
        <div style="text-align:right">
            <span class="muted" style="font-size:13px;display:block">Estimasi selesai</span>
            <strong style="font-size:16px">18 Nov 2026</strong>
        </div>
    </div>

    <ol class="steps">
        @foreach ($langkah as [$judul, $keterangan, $kelas])
            <li class="{{ $kelas }}">
                <i></i>
                <strong>{{ $judul }}</strong>
                <span>{{ $keterangan }}</span>
            </li>
        @endforeach
    </ol>

    <div style="display:flex;flex-wrap:wrap;gap:16px;align-items:center;justify-content:space-between;padding-top:20px;border-top:1px solid var(--line-soft)">
        <div><span class="muted" style="font-size:13px;display:block">Total tagihan</span><strong class="num" style="font-family:var(--font-head);font-size:22px">Rp 71.000</strong></div>
        <div><span class="muted" style="font-size:13px;display:block">Pengantaran</span><strong style="font-size:14px">18 Nov 2026, kurir Dimas</strong></div>
        <a href="#riwayat" class="btn">Lihat nota</a>
    </div>
</section>

<section id="riwayat" class="card" style="padding:28px;gap:16px">
    <h2>Riwayat nota</h2>
    <div class="table-wrap">
        <table style="min-width:520px">
            <thead><tr><th>No. nota</th><th>Tanggal</th><th class="r">Total</th><th>Status</th><th class="r">Nota</th></tr></thead>
            <tbody>
                @foreach ($riwayat as [$no, $tgl, $total, $status])
                    <tr>
                        <td class="num">{{ $no }}</td>
                        <td>{{ $tgl }}</td>
                        <td class="r num">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td><span class="pill {{ $pill[$status] ?? '' }}">{{ $status }}</span></td>
                        <td class="r"><a href="#riwayat" class="link">Lihat</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
