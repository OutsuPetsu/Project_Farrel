<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('login');

Route::get('/admin',     [DemoController::class, 'admin'])->name('admin.dashboard');
Route::get('/kasir',     [DemoController::class, 'kasir'])->name('kasir.transaksi');
Route::get('/kurir',     [DemoController::class, 'kurir'])->name('kurir.tugas');
Route::get('/pelanggan', [DemoController::class, 'pelanggan'])->name('pelanggan.pesanan');
