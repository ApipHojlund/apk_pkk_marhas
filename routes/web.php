<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Jenis_produkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Detail_transaksiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChartController;

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

//DASHBOARD
// route::get('/',[DashboardController::class,'index']);
route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

//LOGIN
route::get('/',[LoginController::class,'index']);
route::get('/register',[LoginController::class,'create']);
route::post('/register/store',[LoginController::class,'store']);
route::get('/login',[LoginController::class,'kelogin'])->name('login');
route::POST('/postLogin',[LoginController::class,'login']);
route::get('/logout',[LoginController::class,'logout']);

//USER
route::get('/user',[UserController::class,'index'])->middleware('auth');
// route::get('/user',[UserController::class,'index']);
route::get('/user/create',[UserController::class,'create'])->middleware('admin');
// route::get('/user/create',[UserController::class,'create']);
route::post('/user/store',[UserController::class,'store'])->middleware('admin');
// route::post('/user/store',[UserController::class,'store']);
route::get('/user/{id}/edit',[UserController::class,'edit'])->middleware('admin');
route::post('/user/{id}/update',[UserController::class,'update'])->middleware('admin');
route::get('/user/{id}/hapus',[UserController::class,'destroy'])->middleware('admin');
route::get('/user/{id}/history',[UserController::class,'history'])->middleware('auth');
route::get('/user/{id}/profile',[UserController::class,'profile'])->middleware('auth');

//JENIS PRODUK
route::get('/jenis',[Jenis_produkController::class,'index'])->middleware('auth');
route::get('/jenis/create',[Jenis_produkController::class,'create'])->middleware('seller');
route::post('/jenis/store',[Jenis_produkController::class,'store'])->middleware('seller');
route::get('/jenis/{id}/edit',[Jenis_produkController::class,'edit'])->middleware('seller');
route::post('/jenis/{id}/update',[Jenis_produkController::class,'update'])->middleware('seller');
route::get('/jenis/{id}/hapus',[Jenis_produkController::class,'destroy'])->middleware('seller');

//PRODUK
route::get('/produk',[ProdukController::class,'index'])->middleware('auth');
route::get('/produk/create',[ProdukController::class,'create'])->middleware('seller');
route::post('/produk/store',[ProdukController::class,'store'])->middleware('seller');
route::get('/produk/{id}/detail',[ProdukController::class,'detail'])->middleware('seller');
route::get('/produk/{id}/edit',[ProdukController::class,'edit'])->middleware('seller');
route::post('/produk/{id}/update',[ProdukController::class,'update'])->middleware('seller');
route::get('/produk/{id}/hapus',[ProdukController::class,'destroy'])->middleware('seller');

//TRANSAKSI
route::get('/transaksi',[TransaksiController::class,'index'])->middleware('auth');
route::get('/transaksi/create',[TransaksiController::class,'create'])->middleware('seller');
route::post('/transaksi/store',[TransaksiController::class,'store'])->middleware('seller');
route::get('/transaksi/{id}/edit',[TransaksiController::class,'edit'])->middleware('seller');
route::post('/transaksi/{id}/update',[TransaksiController::class,'update'])->middleware('seller');
route::get('/transaksi/{id}/hapus',[TransaksiController::class,'destroy'])->middleware('seller');
route::get('/transaksi/cetak',[TransaksiController::class,'cetak'])->middleware('auth');
route::get('/transaksi/{id}/struk',[TransaksiController::class,'struk'])->middleware('auth');
route::get('/transaksi/detail/{id}',[TransaksiController::class,'detail'])->middleware('auth');

//DETAIL TRANSAKSI
route::get('/pesanan',[Detail_transaksiController::class,'index'])->middleware('auth');
route::get('/pesanan/create',[ProdukController::class,'index'])->middleware('auth');
route::post('/pesanan/store',[Detail_transaksiController::class,'store'])->middleware('auth');
route::get('/pesanan/{id}/edit',[Detail_transaksiController::class,'edit'])->middleware('auth');
route::post('/pesanan/{id}/update',[Detail_transaksiController::class,'update'])->middleware('auth');
route::get('/pesanan/{id}/hapus',[Detail_transaksiController::class,'destroy'])->middleware('auth');


//CHART SYSTEM
route::post('/produk/cari',[ChartController::class,'index'])->name('produk.cari');
route::get('/user/keranjang/{id}',[ChartController::class,'inchart'])->name('keranjang.index');
route::get('/chart/add/{id}',[ChartController::class,'store']);
route::POST('/chart/checkout',[ChartController::class,'checkout'])->name('chart.checkout');
// Route::patch('/keranjang/update/{id}', [ChartController::class, 'update'])->name('keranjang.update');
// Route::patch('/keranjang/update', [ChartController::class, 'update'])->name('keranjang.update');
route::get('/chart/{id}/hapus',[ChartController::class,'delete']);
