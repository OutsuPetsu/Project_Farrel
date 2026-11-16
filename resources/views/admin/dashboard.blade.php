@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<header class="page-head">
    <div>
        <h1>Dashboard Admin</h1>
        <p>Ringkasan operasional FreshClean Laundry. Data di bawah adalah contoh.</p>
    </div>
    <a href="{{ route('kasir.transaksi') }}" class="btn">Buat transaksi</a>
</header>

<section class="grid-kpi">
    @foreach ($kpi as [$label, $nilai, $catatan, $warna])
        <div class="kpi">
            <span>{{ $label }}</span>
            <strong>{{ $nilai }}</strong>
            <small @if($warna) style="color:{{ $warna }};font-weight:500" @endif>{{ $catatan }}</small>
        </div>
    @endforeach
</section>

<section id="omzet" class="row">
    <div class="card col-2">
        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:8px;align-items:baseline">
            <h2>Laporan omzet 7 hari terakhir</h2>
            <span class="muted" style="font-size:13px">Dalam juta rupiah</span>
        </div>

        @php $puncak = collect($omzet)->max(1); @endphp
        <div class="bars">
            @foreach ($omzet as [$hari, $nilai])
                <div class="bar {{ $nilai == $puncak ? 'peak' : '' }}">
                    <span>{{ number_format($nilai, 1, ',', '.') }}</span>
                    <i style="height:{{ $nilai * 60 }}px"></i>
                </div>
            @endforeach
        </div>
        <div class="bar-labels" style="margin-top:-8px">
            @foreach ($omzet as [$hari, $nilai])
                <span>{{ $hari }}</span>
            @endforeach
        </div>
    </div>

    <div class="card col-1">
        <h2>Status pesanan</h2>
        @foreach ($status as [$label, $jumlah, $persen, $warna])
            <div class="progress-row">
                <div><span>{{ $label }}</span><span class="num">{{ $jumlah }}</span></div>
                <div class="track"><i style="width:{{ $persen }}%;background:{{ $warna }}"></i></div>
            </div>
        @endforeach
    </div>
</section>

<section class="row">
    <div id="layanan" class="card col-2">
        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:12px;align-items:center">
            <h2>Data layanan dan tarif</h2>
            <button type="button" class="btn btn-outline">Tambah layanan</button>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>Layanan</th><th>Satuan</th><th class="r">Tarif</th><th class="r">Aksi</th></tr>
                </thead>
                <tbody>
                    @foreach ($layanan as [$nama, $satuan, $tarif])
                        <tr>
                            <td>{{ $nama }}</td>
                            <td class="muted">{{ $satuan }}</td>
                            <td class="r num">Rp {{ number_format($tarif, 0, ',', '.') }}</td>
                            <td class="r">
                                <a href="#layanan" class="link">Ubah</a>
                                <span style="color:var(--field)">|</span>
                                <a href="#layanan" class="link-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <form id="profil" class="card col-1" method="POST" action="#" onsubmit="return false">
        @csrf
        <h2>Profil laundry</h2>
        <div class="field"><label for="namaUsaha">Nama usaha</label><input id="namaUsaha" name="nama_usaha" type="text" value="FreshClean Laundry"></div>
        <div class="field"><label for="alamat">Alamat</label><input id="alamat" name="alamat" type="text" placeholder="[ALAMAT USAHA]"></div>
        <div class="field"><label for="telp">Nomor telepon</label><input id="telp" name="telp" type="text" placeholder="[NOMOR TELEPON]"></div>
        <button type="submit" class="btn">Simpan profil</button>
    </form>
</section>
@endsection
