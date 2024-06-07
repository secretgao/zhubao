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

Route::get('/', function () {
    return view('welcome');
});



//Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product');

//Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product');

Route::prefix('product')->group(function () {
    Route::get('/index', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
    Route::get('/detail/{detail}', [\App\Http\Controllers\ProductController::class, 'detail'])->name('product.detail');
    Route::post('/delete', [\App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
});

Route::prefix('upload')->group(function () {
    Route::get('/index', [\App\Http\Controllers\UploadController::class, 'index']);
    Route::post('/upload', [\App\Http\Controllers\UploadController::class, 'upload']);
    Route::post('/file', [\App\Http\Controllers\UploadController::class, 'file']);
});
Route::get('/qc', [\App\Http\Controllers\QrCodeController::class, 'show'])->name('qrcode.show');
