<?php

use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', function () {
    return view('Main');
});

Route::get('/order', [BarangController::class, 'toko']);
Route::get('/order/{id}', [BarangController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [BarangController::class, 'cart'])->name('cart');


Route::get('/barang', [BarangController::class, 'index']);
Route::get('/create-barang', [BarangController::class, 'create']);
Route::post('/create-barang', [BarangController::class, 'store']);
Route::get('/edit-barang/{id}', [BarangController::class, 'edit']);
Route::put('/update-barang/{id}', [BarangController::class, 'update']);
Route::delete('/barang-destroy/{id}', [BarangController::class, 'destroy']);

// 
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/create-transaksi', [TransaksiController::class, 'create']);
Route::post('/create-transaksi', [TransaksiController::class, 'store']);
Route::get('/edit-transaksi/{id}', [TransaksiController::class, 'edit']);
Route::put('/update-transaksi/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksi-destroy/{id}', [TransaksiController::class, 'destroy']);
