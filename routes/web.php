<?php

use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TransaksiKeluarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailPeriksaController;
use App\Http\Controllers\PemasokController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('pasien', PasienController::class);
    Route::resource('pemasok', PemasokController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('transaksi_masuk', TransaksiMasukController::class);

    Route::get('/search-pasien', [TransaksiMasukController::class, 'searchPasien'])->name('search.pasien');
    Route::get('/pasien-details/{id}', [TransaksiMasukController::class, 'getPasienDetails']);
    Route::get('/detail-obat/{id}', [TransaksiMasukController::class, 'getDetailObat']);

    Route::get('/transaksi/create', [TransaksiMasukController::class, 'create'])->name('transaksi_masuk.create');
    Route::post('/transaksi/store', [TransaksiMasukController::class, 'store'])->name('transaksi_masuk.store');
    Route::get('/transaksi_masuk/{id}/print', [TransaksiMasukController::class, 'print'])->name('transaksi_masuk.print');

});

Route::middleware(['auth'])->group(function () {

    Route::resource('jurnal', App\Http\Controllers\JurnalController::class);

    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');

    Route::post('/laporan-pdf', [App\Http\Controllers\LaporanController::class, 'GeneratePdf'])->name('laporan.kas');
    Route::post('/laporan-kaskeluar-pdf', [App\Http\Controllers\LaporanController::class, 'kaskeluarPDF'])->name('laporan.kaskeluar');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('akun', App\Http\Controllers\AkunController::class);
    Route::resource('transaksi_keluar', App\Http\Controllers\TransaksiKeluarController::class);

    Route::get('/search-pemasok', [TransaksiKeluarController::class, 'searchPemasok'])->name('search.pemasok');

    Route::get('/transaksi_keluar/{id}/print', [TransaksiKeluarController::class, 'print'])->name('transaksi_keluar.print');
});


Route::get('/register-user', [UserController::class, 'pasien'])->name('create.pasien');
Route::post('/register-store', [UserController::class, 'store'])->name('store.pasien');

Route::middleware(['auth'])->group(function () {

    Route::resource('rawat', App\Http\Controllers\RawatInapController::class);
    Route::resource('rawat-jalan', App\Http\Controllers\RawatJalanController::class);

});

Route::middleware(['auth', 'pemeriksa'])->group(function () {

    Route::get('/periksa-pasien', [PasienController::class, 'lihatPemeriksa'])->name('pasien.lihat');
    Route::get('/periksa-pasien/{pasien}', [PasienController::class, 'editPemeriksa'])->name('pasien.editPeriksa');
    Route::put('/periksa-pasien/{pasien}', [PasienController::class, 'updatePemeriksa'])->name('pasien.pemeriksa');

    Route::delete('/detailperiksa/{id}', [DetailPeriksaController::class, 'destroy'])->name('detailperiksa.destroy');
});
