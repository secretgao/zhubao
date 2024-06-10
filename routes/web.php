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

Route::prefix('product')->group(function () {
    Route::get('/index', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
    Route::get('/detail/{detail}', [\App\Http\Controllers\ProductController::class, 'detail'])->name('product.detail');
    Route::get('/print/{print}', [\App\Http\Controllers\ProductController::class, 'dataprint'])->name('product.print');
    Route::post('/delete', [\App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
    Route::post('/deleteall', [\App\Http\Controllers\ProductController::class, 'deleteall'])->name('product.deleteall');
    Route::get('/editinfo/{edit}', [\App\Http\Controllers\ProductController::class, 'editinfo'])->name('product.edit.info');
    Route::post('/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/printall', [\App\Http\Controllers\ProductController::class, 'dataprintall'])->name('product.print.all');

});

Route::prefix('upload')->group(function () {
    Route::get('/index', [\App\Http\Controllers\UploadController::class, 'index'])->name('upload.index');
    Route::post('/upload', [\App\Http\Controllers\UploadController::class, 'upload'])->name('upload.upload');
    Route::post('/file', [\App\Http\Controllers\UploadController::class, 'file']);
});
Route::get('/qc', [\App\Http\Controllers\QrCodeController::class, 'show'])->name('qrcode.show');
