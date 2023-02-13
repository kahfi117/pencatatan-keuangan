<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuKasController;
use App\Http\Controllers\SumberPemasukanController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\OperasionalController;
use App\Http\Controllers\GajiKaryawanController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ListingFeeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SumberNonCashController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Buku Kas
    Route::resource('buku-kas', BukuKasController::class);
    
    // Sumber Pemasukan
    Route::resource('sumber-pemasukan', SumberPemasukanController::class);
    
    // Data Barang Masuk
    Route::controller(BarangMasukController::class)->group(function () {
        Route::get('/barang-masuk/all', 'index')->name('bm.index');
        Route::get('/barang-masuk/create', 'create')->name('bm.create');
        Route::post('/barang-masuk/store', 'store')->name('bm.store');
        Route::put('/barang-masuk/update/{id}', 'updateData')->name('bm.update');
        Route::delete('/barang-masuk/delete/{id}', 'destroy')->name('bm.delete');
    
        Route::get('/barang-kredit/all', 'barangKredit')->name('bmk.index');
        });
    
    // Operasional
    Route::resource('operasional', OperasionalController::class);
    
    // Gaji Pegawai
    Route::resource('gaji-pegawai', GajiKaryawanController::class);
    
    // Tenant
    Route::resource('sewa-tenant', TenantController::class);
    
    // Listing Fee
    Route::resource('listing-fee', ListingFeeController::class);
    
    // Penjualan
    Route::get('penjualan/laporan', [PenjualanController::class, 'buatLaporan'])->name('penjualan.buatLaporan');
    Route::resource('penjualan', PenjualanController::class);
    
    // Non Tunai
    Route::resource('non-tunai', SumberNonCashController::class);
    
    // Modal
    Route::resource('modal', ModalController::class);
});

// Login
Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('proses.login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});
