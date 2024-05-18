<?php

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

// Route::get('/', function () {
//     return view('shop.master');
// });

Route::get('/',[App\Http\Controllers\LandingPageController::class,'index']);
Route::get('/barang/{id}',[App\Http\Controllers\LandingPageController::class,'barang']);

Route::get('login',[App\Http\Controllers\LoginController::class,'index'])->name('login');;
Route::post('login',[App\Http\Controllers\LoginController::class,'login'])->name('login');;
Route::get('register',[App\Http\Controllers\RegisterController::class,'index']);
Route::post('register',[App\Http\Controllers\RegisterController::class,'register']);



Auth::routes(['login'=>false,'register'=>false,'verify' => true]);



Route::middleware(['role:admin'])->group(function () {

    // Route::resource('produk',App\Http\Controllers\Admin\ProdukController::class);
    Route::resource('kategori-barang',App\Http\Controllers\Admin\KategoriBarangController::class);
    Route::resource('stok-barang',App\Http\Controllers\Admin\StokBarangController::class);
    Route::resource('barang-bangunan',App\Http\Controllers\Admin\BarangController::class);
    Route::resource('akun-bank',App\Http\Controllers\Admin\AkunBankController::class);
    
    Route::get('pesanan-barang',[App\Http\Controllers\Admin\PesananController::class,'index']);
    Route::post('pesanan-barang/terima/{id}',[App\Http\Controllers\Admin\PesananController::class,'terima_pembayaran']);
    Route::get('pesanan-barang/tolak/{id}',[App\Http\Controllers\Admin\PesananController::class,'tolak_pembayaran']);

    Route::get('pesanan-proses',[App\Http\Controllers\Admin\PesananDiprosesController::class,'index']);
    Route::get('pesanan-proses/{id}',[App\Http\Controllers\Admin\PesananDiprosesController::class,'selesai']);
    Route::get('pesanan-selesai',[App\Http\Controllers\Admin\PesananSelesaiController::class,'index']);


});

Route::middleware(['role:admin,pemilik toko'])->group(function () {
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);

    Route::get('profile-admin',[App\Http\Controllers\Admin\ProfileController::class,'index']);
    Route::post('profile-admin',[App\Http\Controllers\Admin\ProfileController::class,'update']);
    Route::post('profile-admin/password',[App\Http\Controllers\Admin\ProfileController::class,'password']);

    Route::get('laporan-penjualan',[App\Http\Controllers\Admin\LaporanPenjualanController::class,'index']);
    Route::get('laporan-barang',[App\Http\Controllers\Admin\LaporanPenjualanController::class,'barang']);
    Route::get('laporan-user',[App\Http\Controllers\Admin\LaporanPenjualanController::class,'user']);
    Route::get('laporan-laba',[App\Http\Controllers\Admin\LaporanPenjualanController::class,'laba']);
    Route::get('laporan-transaksi',[App\Http\Controllers\Admin\LaporanTransaksiController::class,'index']);

    Route::post('tambah-modal',[App\Http\Controllers\Admin\LaporanPenjualanController::class,'tambah_modal']);


});

Route::middleware(['role:pemilik toko'])->group(function () {

    Route::get('rekapitulasi',[App\Http\Controllers\Admin\RekapitulasiController::class,'index']);


});

Route::middleware(['role:pembeli'])->group(function () {
    Route::get('keranjang',[App\Http\Controllers\Pembeli\keranjangController::class,'index']);
    Route::get('keranjang/hapus/{id}',[App\Http\Controllers\Pembeli\keranjangController::class,'hapus_barang']);
    Route::get('keranjang/bayar',[App\Http\Controllers\Pembeli\keranjangController::class,'bayar']);
    Route::post('keranjang/bayar',[App\Http\Controllers\Pembeli\keranjangController::class,'pembayaran']);
    Route::post('tambahkeranjang',[App\Http\Controllers\Pembeli\TambahKeranjangController::class,'tambah_barang']);
    Route::resource('alamat',App\Http\Controllers\Pembeli\AlamatController::class);
    Route::get('pesanan',[App\Http\Controllers\Pembeli\PesananController::class,'index']);
    Route::get('pesanan/{id}',[App\Http\Controllers\Pembeli\PembayaranController::class,'pembayaran']);
    Route::post('pesanan/{id}',[App\Http\Controllers\Pembeli\PembayaranController::class,'unggah_pembayaran']);

    Route::get('histori-pesanan',[App\Http\Controllers\Pembeli\HistoryPesananController::class,'index']);

    Route::get('profile',[App\Http\Controllers\Pembeli\ProfileController::class,'index']);
    Route::post('profile',[App\Http\Controllers\Pembeli\ProfileController::class,'update']);
    Route::post('profile/password',[App\Http\Controllers\Pembeli\ProfileController::class,'password']);



});


Route::get('/home', function () {
    return redirect('/');
})->name('home');
