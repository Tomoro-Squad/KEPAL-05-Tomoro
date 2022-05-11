<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\productController;
use App\Http\Controllers\productController2;

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

Route::resource("/dashboard/produk",productController::class);

Route::post("/dashboard/produk/tambah", [productController2::class,'tambah']);

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

Route::get('/login', function () {
    return view('admin/login');
});

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

Route::get('/login', function () {
    return view('admin/login');
});

Route::get('/register', function () {
    return view('admin/register');
});

Route::get('/table', function () {
    return view('admin/tables');
});

Route::get('/widgets', function () {
    return view('admin/widgets');
});

Route::get('/charts', function () {
    return view('admin/charts');
});