<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukPelanggan;
use App\Http\Controllers\TripayCallbackController;
use App\Http\Controllers\TripayController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/logout', [LoginController::class, 'logout']);

Route::prefix('/daftar')->group(function () {
    Route::get('/', [FrontController::class, 'indexDaftar'])->name('daftar');
    Route::post('/', [FrontController::class, 'postDaftar']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::prefix('/customer')->group(function () {
        Route::get('/', [AdminController::class, 'indexCustomer']);
    });

    Route::prefix('/produk_pelanggan')->group(function(){
        Route::get('/', [ProdukPelanggan::class, 'index']);
        Route::get('/{id}/detail', [ProdukPelanggan::class, 'detailProdukPelanggan']);
        Route::post('/', [ProdukPelanggan::class, 'postProdukPelanggan']);

        Route::post('/deskripsi_produk', [ProdukPelanggan::class, 'postDeskripsiProduk']);
    });
});

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'auth.customer']], function () {
    Route::get('/', [CustomerController::class, 'index']);

    Route::prefix('toko')->group(function () {
        Route::get('/', [CustomerController::class, 'indexToko']);
        Route::post('/', [CustomerController::class, 'postToko']);


        Route::get('/{id}/detail', [CustomerController::class, 'detailToko']);

        // Route::prefix('detail')->group(function () {
        //     Route::get('{id}', [CustomerController::class, 'detailToko']);
        // });
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [CustomerController::class, 'indexKategori']);
        Route::post('/', [CustomerController::class, 'postKategori']);
        Route::post('/edit', [CustomerController::class, 'editKategori']);
        Route::post('/delete', [CustomerController::class, 'deleteKategori']);
    });

    Route::prefix('produk')->group(function () {
        Route::get('/', [CustomerController::class, 'indexProduk']);
        Route::post('/', [CustomerController::class, 'postProduk']);
        Route::post('/edit', [CustomerController::class, 'editProduk']);
        Route::post('/delete', [CustomerController::class, 'deleteProduk']);
    });

    Route::prefix('/harga')->group(function(){
        Route::get('/', [CustomerController::class, 'indexharga']);

        Route::get('{id_produk}/bayar',[TripayController::class, 'indexBayar']);
    });

    Route::prefix('kasir')->group(function () {
        Route::get('/', [CustomerController::class, 'indexKasir']);
        Route::post('/', [CustomerController::class, 'postKasir']);
        Route::post('/delete', [CustomerController::class, 'deleteKasir']);
    });

    Route::prefix('pemasukan')->group(function () {
        Route::get('/', [CustomerController::class, 'indexPengeluaran']);
    });
    Route::prefix('pengeluaran')->group(function () {
        Route::get('/', [CustomerController::class, 'indexPemasukan']);
    });

    Route::prefix('transaksi_langganan')->group(function(){
        Route::get('/', [CustomerController::class, 'transaksi_pelanggan']);
    });
});
Route::group(['prefix' => 'kasir', 'middleware' => ['auth', 'auth.kasir']], function () {
    Route::get('/', [KasirController::class, 'index']);

    Route::prefix('transaksi')->group(function () {
        Route::get('/', [KasirController::class, 'indexTransaksi']);

        // Add Item
        Route::get('/getCart', [KasirController::class, 'getCart']);
        Route::get('/getJumlah', [KasirController::class, 'getJumlah']);
        Route::post('/cart', [KasirController::class, 'addCart']);
        Route::post('/minescart', [KasirController::class, 'minesCart']);
        Route::post('/pluscart', [KasirController::class, 'plusCart']);
        Route::post('/deletecart', [KasirController::class, 'deleteCart']);
        Route::post('/addtransaksi', [KasirController::class, 'addTransaksi']);
    });

    Route::prefix('riwayat_transaksi')->group(function () {
        Route::get('/', [KasirController::class, 'riwayatTransaksi']);
    });
});

Route::get('/channel', [TripayController::class, 'Channel_pembayaran']);
Route::get('/test_daftar', [TripayController::class, 'bayarTransaksi']);



Route::post('status_tripay', [TripayCallbackController::class, 'handle']);
Route::get('redirect', function(){
    return view('customer.redirect');
});
