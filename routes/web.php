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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/intro', [\App\Http\Controllers\HomeController::class, 'intro'])->name('home.intro');
Route::get('/service', [\App\Http\Controllers\HomeController::class, 'service'])->name('home.service');
Route::get('/jew', [\App\Http\Controllers\HomeController::class, 'jew'])->name('home.jew');
Route::get('/job', [\App\Http\Controllers\HomeController::class, 'job'])->name('home.job');
Route::get('/advice', [\App\Http\Controllers\HomeController::class, 'advice'])->name('home.advice');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/captcha', [\App\Http\Controllers\HomeController::class, 'generateCaptcha'])->name('home.captcha');
Route::post('/search', [\App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
Route::get('/search/result', [\App\Http\Controllers\HomeController::class, 'searchResult'])->name('home.search.result');


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
