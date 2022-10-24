<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukController2;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registrasiController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\pemesananController;
use App\Http\Controllers\dashboardPemesananController;

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
Route::get("/register", [registrasiController::class,'register'])->middleware('guest');
Route::post("/register", [registrasiController::class,'registerUser'])->middleware('guest');
Route::get("/login", [loginController::class,'login'])->middleware('guest');
Route::post("/login", [loginController::class,'loginUser'])->middleware('guest');
Route::post("/logout",[loginController::class, 'logout'])->middleware('auth');

Route::middleware(['admin'])->group(function () {

    Route::resource("/dashboard/produk",ProdukController::class);

    Route::resource("/dashboard/produk/gambar",ProdukController::class);

    // Route::resource("/dashboard/keranjang",pemesananController::class);

    Route::resource("/dashboard/pemesanan",dashboardPemesananController::class);

});


Route::get('/',[berandaController::class,'index']);

Route::get('/produk/{produk}',[berandaController::class,'detail']);

Route::resource("/keranjang",pemesananController::class)->middleware('auth');

Route::post("/keranjang/bayar/{id}", [pemesananController::class, 'bayar'])->middleware('auth');

// Route::post("/dashboard/produk/tambah", [productController2::class,'tambah']);

Route::get('/form-basic', function () {
    return view('admin/form-basic');
});

Route::get('/form-wizard', function () {
    return view('admin/form-wizard');
});

Route::get('/grid', function () {
    return view('admin/grid');
});

Route::get('/icon/fontawesome', function () {
    return view('admin/icon-fontawesome');
});

Route::get('/icon/material', function () {
    return view('admin/icon-material');
});

Route::get('/index', function () {
    return view('admin/index');
});

Route::get('/index2', function () {
    return view('admin/index2');
});

// Route::get('/login', function () {
//     return view('admin/login');
// });

Route::get('/pbutton', function () {
    return view('admin/pages-buttons');
});

Route::get('/pcalendar', function () {
    return view('admin/pages-calendar');
});

Route::get('/pchat', function () {
    return view('admin/pages-calendar');
});

Route::get('/pelements', function () {
    return view('admin/pages-elements');
});

Route::get('/pgallery', function () {
    return view('admin/pages-gallery');
});

Route::get('/pinvoice', function () {
    return view('admin/pages-invoice');
});

// Route::get('/login', function () {
//     return view('admin/login');
// });

// Route::get('/register', function () {
//     return view('admin/register');
// });

Route::get('/table', function () {
    return view('admin/tables');
});

Route::get('/widgets', function () {
    return view('admin/widgets');
});

Route::get('/charts', function () {
    return view('admin/charts');
});