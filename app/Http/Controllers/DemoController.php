<?php

namespace App\Http\Controllers;

class DemoController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard', [
            'role' => 'admin',
            'kpi' => [
                ['Omzet bulan ini',      'Rp 18.450.000', 'Naik dari bulan lalu',  '#17613A'],
                ['Transaksi hari ini',   '26',            '8 menunggu pembayaran', null],
                ['Cucian diproses',      '41',            '5 melewati estimasi',   '#8A5A00'],
                ['Pengantaran hari ini', '12',            '3 kurir bertugas',      null],
            ],
            'omzet' => [
                ['Sen', 1.2], ['Sel', 1.8], ['Rab', 1.5], ['Kam', 2.4],
                ['Jum', 2.1], ['Sab', 3.0], ['Min', 2.6],
            ],
            'status' => [
                ['Diterima',           14, 34, '#5A7078'],
                ['Dicuci / disetrika', 27, 66, '#C98A12'],
                ['Siap diantar',        9, 22, '#2F6FD6'],
                ['Selesai',            38, 92, '#1F8A52'],
            ],
            'layanan' => [
                ['Cuci kering setrika', 'kg',  8000],
                ['Cuci kering',         'kg',  6000],
                ['Setrika saja',        'kg',  5000],
                ['Bedcover',            'pcs', 25000],
                ['Ekspres 6 jam',       'kg',  14000],
            ],
        ]);
    }

    public function kasir()
    {
        $items = [
            ['layanan' => 'Cuci kering setrika', 'jumlah' => 4.5, 'qty' => '4,5 kg', 'tarif' => 8000],
            ['layanan' => 'Setrika saja',        'jumlah' => 2,   'qty' => '2 kg',   'tarif' => 5000],
            ['layanan' => 'Bedcover',            'jumlah' => 1,   'qty' => '1 pcs',  'tarif' => 25000],
        ];

        return view('kasir.transaksi', [
            'role'      => 'kasir',
            'items'     => $items,
            'total'     => collect($items)->sum(fn ($i) => $i['jumlah'] * $i['tarif']),
            'noNota'    => 'FC-161126-0027',
            'tanggal'   => '16 Nov 2026',
            'pelanggan' => 'Siti Rahma',
            'layanan'   => ['Cuci kering setrika', 'Cuci kering', 'Setrika saja', 'Bedcover', 'Ekspres 6 jam'],
            'kurir'     => ['Dimas', 'Rudi', 'Fajar'],
        ]);
    }

    public function kurir()
    {
        return view('kurir.tugas', [
            'role'    => 'kurir',
            'ringkas' => ['Penjemputan' => 3, 'Pengantaran' => 4, 'Selesai' => 2],
            'tugas'   => [
                ['09.00', 'Jemput', 'Siti Rahma',     'FC-161126-0027', 'Selesai',              [],                                                         false],
                ['10.30', 'Antar',  'Budi Santoso',   'FC-141126-0019', 'Selesai',              [],                                                         false],
                ['13.00', 'Antar',  'Ayu Lestari',    'FC-141126-0021', 'Dalam perjalanan',     ['Dalam perjalanan', 'Tiba di lokasi', 'Terkirim'],         true],
                ['14.30', 'Jemput', 'Rina Wulandari', 'Pesanan baru',   'Menunggu',             ['Menunggu', 'Menuju lokasi', 'Sudah dijemput'],            false],
                ['16.00', 'Antar',  'Dedi Kurniawan', 'FC-141126-0024', 'Menunggu cucian siap', ['Menunggu cucian siap', 'Dalam perjalanan', 'Terkirim'],  false],
            ],
        ]);
    }

    public function pelanggan()
    {
        return view('pelanggan.pesanan', [
            'inisial' => 'SR',
            'nama'    => 'Siti Rahma',
            'langkah' => [
                ['Diterima',     '16 Nov, 09.12',   'done'],
                ['Dicuci',       '16 Nov, 13.40',   'done'],
                ['Disetrika',    'Sedang berjalan', 'now'],
                ['Siap diantar', 'Belum',           ''],
                ['Selesai',      'Belum',           ''],
            ],
            'riwayat' => [
                ['FC-161126-0027', '16 Nov 2026', 71000, 'Diproses'],
                ['FC-021126-0008', '2 Nov 2026',  48000, 'Selesai'],
                ['FC-191026-0031', '19 Okt 2026', 96000, 'Selesai'],
            ],
        ]);
    }
}
