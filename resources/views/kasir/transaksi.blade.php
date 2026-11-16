@extends('layouts.app')
@section('title', 'Transaksi Kasir')

@section('content')
<header class="page-head">
    <div>
        <h1>Transaksi baru</h1>
        <p>Catat pesanan pelanggan, hitung biaya, lalu cetak nota.</p>
    </div>
</header>

<div class="row">
    <div class="col-2" style="display:flex;flex-direction:column;gap:16px;flex-basis:460px;flex-grow:3">

        <form class="card" method="POST" action="#" onsubmit="return false">
            @csrf
            <h2>Data pesanan</h2>
            <div class="fields">
                <div class="field"><label for="pelanggan">Pelanggan</label><input id="pelanggan" name="pelanggan" type="text" value="{{ $pelanggan }}"></div>
                <div class="field"><label for="hp">Nomor telepon</label><input id="hp" name="hp" type="text" placeholder="[NOMOR TELEPON]"></div>
            </div>

            <div class="fields" style="grid-template-columns:repeat(auto-fit,minmax(150px,1fr))">
                <div class="field">
                    <label for="layanan">Layanan</label>
                    <select id="layanan" name="layanan">
                        @foreach ($layanan as $l) <option>{{ $l }}</option> @endforeach
                    </select>
                </div>
                <div class="field"><label for="berat">Berat / jumlah</label><input id="berat" name="berat" type="text" value="4,5"></div>
                <button type="button" class="btn btn-outline">Tambah item</button>
            </div>

            <div class="table-wrap">
                <table style="min-width:440px">
                    <thead><tr><th>Layanan</th><th class="r">Jumlah</th><th class="r">Tarif</th><th class="r">Subtotal</th></tr></thead>
                    <tbody>
                        @foreach ($items as $i)
                            <tr>
                                <td>{{ $i['layanan'] }}</td>
                                <td class="r num">{{ $i['qty'] }}</td>
                                <td class="r num">{{ number_format($i['tarif'], 0, ',', '.') }}</td>
                                <td class="r num">{{ number_format($i['jumlah'] * $i['tarif'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td class="r num" style="font-family:var(--font-head);font-size:20px;font-weight:700">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-ghost">Batalkan</button>
                <button type="submit" class="btn">Simpan transaksi</button>
            </div>
        </form>

        <form id="jadwal" class="card" method="POST" action="#" onsubmit="return false">
            @csrf
            <h2>Jadwal penjemputan dan pengantaran</h2>
            <div class="fields">
                <div class="field"><label for="jenis">Jenis</label>
                    <select id="jenis" name="jenis"><option>Pengantaran</option><option>Penjemputan</option></select>
                </div>
                <div class="field"><label for="tgl">Tanggal</label><input id="tgl" name="tanggal" type="date" value="2026-11-18"></div>
                <div class="field"><label for="kurir">Kurir</label>
                    <select id="kurir" name="kurir">
                        @foreach ($kurir as $k) <option>{{ $k }}</option> @endforeach
                    </select>
                </div>
            </div>
            <div class="field"><label for="alamatKirim">Alamat</label><input id="alamatKirim" name="alamat" type="text" placeholder="[ALAMAT PELANGGAN]"></div>
            <div class="actions"><button type="submit" class="btn btn-outline">Simpan jadwal</button></div>
        </form>
    </div>

    <aside class="card col-1" style="flex:2 1 300px">
        <div style="display:flex;justify-content:space-between;align-items:baseline;gap:8px;flex-wrap:wrap">
            <h2>Pratinjau nota</h2><span class="muted" style="font-size:12px">{{ $tanggal }}</span>
        </div>

        <div class="nota">
            <div style="text-align:center">
                <strong style="font-family:var(--font-head);font-size:18px">FreshClean Laundry</strong><br>
                <span class="muted">Nota No. {{ $noNota }}</span>
            </div>
            <hr>
            <div class="nota-line"><span class="muted">Pelanggan</span><span>{{ $pelanggan }}</span></div>
            <hr>
            @foreach ($items as $i)
                <div class="nota-line num"><span>{{ $i['layanan'] }} {{ $i['qty'] }}</span><span>{{ number_format($i['jumlah'] * $i['tarif'], 0, ',', '.') }}</span></div>
            @endforeach
            <hr>
            <div class="nota-line nota-total num"><span>Total</span><span>Rp {{ number_format($total, 0, ',', '.') }}</span></div>
            <div class="nota-line muted"><span>Status bayar</span><span>Belum lunas</span></div>
            <div class="nota-line muted"><span>Estimasi selesai</span><span>18 Nov 2026</span></div>
        </div>

        <button type="button" class="btn btn-dark" style="min-height:48px" onclick="window.print()">Cetak nota</button>
    </aside>
</div>
@endsection
