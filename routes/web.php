<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukController2;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registrasiController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\Pemesanan2Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\dashboardPemesananController;
use Illuminate\Support\Facades\Auth;

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

//autentikasi
// Route::get("/register", [registrasiController::class,'register'])->middleware('guest');
// Route::post("/register", [registrasiController::class,'registerUser'])->middleware('guest');
// Route::get("/login", [loginController::class,'login'])->middleware('guest');
Route::post('/loginUser', [loginController::class,'loginUser'])->middleware('guest');
// Route::post("/logout",[loginController::class, 'logout'])->middleware('auth');

Route::get('/verification', [UserController::class, 'verification'])->name('verification');

Route::post('/postVerification', [UserController::class, 'postVerification']);

Route::get('/profile', function() {
    return view('profile');
});



Route::middleware(['admin'])->group(function () {

    Route::resource("/dashboard/produk",ProdukController::class);

    Route::resource("/pemesanan",Pemesanan2Controller::class);

    Route::resource("/dashboard/produk/gambar",ProdukController::class);

    // Route::resource("/dashboard/keranjang",pemesananController::class);

    Route::resource("/dashboard/pemesanan",dashboardPemesananController::class);
});


Route::get('/',[berandaController::class,'index']);

Route::get('/produk/{produk}',[berandaController::class,'detail']);

Route::resource("/keranjang",Pemesanan2Controller::class)->middleware('auth');

Route::post("/keranjang/bayar/{keranjang}", [Pemesanan2Controller::class, 'bayar'])->middleware('auth');

Auth::routes();