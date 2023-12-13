<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\StokBBMController;
use App\Http\Controllers\SuratTugasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/kendaraan', [KendaraanController::class, 'index'])->middleware('auth');
Route::get('/kendaraan_tambah', [KendaraanController::class, 'create'])->middleware('auth');
Route::post('/tambah-kendaraan', [KendaraanController::class, 'store'])->middleware('auth');
Route::get('/kendaraan_edit/{id}', [KendaraanController::class, 'edit'])->middleware('auth');
Route::put('/edit-kendaraan/{id}', [KendaraanController::class, 'update'])->middleware('auth');
Route::get('/kendaraan_hapus/{id}', [KendaraanController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-kendaraan/{id}', [KendaraanController::class, 'destroy'])->middleware('auth');

Route::get('/stok_bbm', [StokBBMController::class, 'index'])->middleware('auth');

Route::get('/masuk', [MasukController::class, 'index'])->middleware('auth');
Route::get('/masuk_tambah_bbm', [MasukController::class, 'create'])->middleware('auth');
Route::post('/tambah-masuk-bbm', [MasukController::class, 'store'])->middleware('auth');
Route::get('/masuk_edit/{id}', [MasukController::class, 'edit'])->middleware('auth');
Route::put('/edit-masuk-bbm/{id}', [MasukController::class, 'update'])->middleware('auth');
Route::get('/masuk_hapus/{id}', [MasukController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-masuk/{id}', [MasukController::class, 'destroy'])->middleware('auth');

Route::get('/keluar', [KeluarController::class, 'index'])->middleware('auth');
Route::get('/keluar_tambah_bbm', [KeluarController::class, 'create'])->middleware('auth');
Route::get('/get-data-keluar-kendaraan', [KeluarController::class, 'getDataKeluarKendaraan'])->middleware('auth');
Route::post('/tambah-keluar-bbm', [KeluarController::class, 'store'])->middleware('auth');
Route::get('/keluar_edit/{id}', [KeluarController::class, 'edit'])->middleware('auth');
Route::put('/edit-keluar-bbm/{id}', [KeluarController::class, 'update'])->middleware('auth');
Route::get('/keluar_hapus/{id}', [KeluarController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-keluar/{id}', [KeluarController::class, 'destroy'])->middleware('auth');
Route::post('/export-pengeluaran-bbm', [KeluarController::class, 'export'])->middleware('auth');

Route::get('/surat_tugas', [SuratTugasController::class, 'index'])->middleware('auth');
Route::get('/surat_tugas_tambah/{id}', [SuratTugasController::class, 'create'])->middleware('auth');
Route::post('/tambah-surat-tugas', [SuratTugasController::class, 'store'])->middleware('auth');
Route::get('/surat_tugas_edit/{id}', [SuratTugasController::class, 'edit'])->middleware('auth');
Route::put('/edit-surat-tugas/{id}', [SuratTugasController::class, 'update'])->middleware('auth');
Route::get('/surat_tugas_hapus/{id}', [SuratTugasController::class, 'delete'])->middleware('auth');
Route::delete('/delete-surat-tugas/{id}', [SuratTugasController::class, 'destroy'])->middleware('auth');
Route::get('/cetak_surat/{id}', [SuratTugasController::class, 'SuratTugas'])->middleware('auth');
Route::get('/cetak_voucher/{id}', [SuratTugasController::class, 'Voucher'])->middleware('auth');
Route::post('/export-surat-tugas', [SuratTugasController::class, 'export'])->middleware('auth');

Route::get('/pajak', [PajakController::class, 'index'])->middleware('auth');
Route::get('/pajak_tambah', [PajakController::class, 'create'])->middleware('auth');
Route::post('/tambah-pajak', [PajakController::class, 'store'])->middleware('auth');
Route::get('/pajak_edit/{id}', [PajakController::class, 'edit'])->middleware('auth');
Route::put('/edit-pajak/{id}', [PajakController::class, 'update'])->middleware('auth');
Route::get('/pajak_hapus/{id}', [PajakController::class, 'delete'])->middleware('auth');
Route::delete('/destroy-pajak/{id}', [PajakController::class, 'destroy'])->middleware('auth');
