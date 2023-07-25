<?php

use App\Http\Controllers\KodeqrController;
use App\Http\Controllers\QrcodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WappingController;
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



//Aset

Route::get('/tableaset', [AsetController::class, 'tableaset'])->name('tableaset');

Route::get('/forminputaset', [AsetController::class, 'forminputaset'])->name('forminputaset');


Route::post('/insertaset', [AsetController::class, 'insertaset'])->name('insertaset');

Route::get('/qrcode', [KodeqrController::class, 'qrcode'])->name('qrcode');

Route::get('/tampilqrcode', [AsetController::class, 'tampilqrcode'])->name('tampilqrcode');

Route::post('/editaset/{id}', [AsetController::class, 'editaset'])->name('editaset');

Route::get('/tampilaset/{id}', [AsetController::class, 'tampilaset'])->name('tampilaset');

Route::get('/deleteaset/{id}', [AsetController::class, 'deleteaset'])->name('deleteaset');

Route::get('/read/{id}', [AsetController::class, 'read'])->name('read');

Route::get('/search', [AsetController::class, 'search'])->name('search');

Route::get('/qrkode/{id}', [AsetController::class, 'qrkode'])->name('qrkode');


//Service

Route::get('/tableservice', [ServiceController::class, 'tableservice'])->name('tableservice');

Route::post('/insertservice/{id}', [ServiceController::class, 'insertservice'])->name('insertservice');

Route::post('/editservice/{id}', [ServiceController::class, 'editservice'])->name('editservice');

Route::get('/tampilservice/{id}', [ServiceController::class, 'tampilservice'])->name('tampilservice');

Route::get('/deleteservice/{id}', [ServiceController::class, 'deleteservice'])->name('deleteservice');

Route::get('/forminputservice/{id}', [ServiceController::class, 'forminputservice'])->name('forminputservice');

// Route::post('/confirmasi/{id}', [ServiceController::class, 'confirmasi'])->name('confirmasi');

// Route::post('/konfirmasi/{id}', [ServiceController::class, 'terkonfirmasi'])->name('konfirmasi.terkonfirmasi');

Route::post('/editstatus/{id}', [ServiceController::class, 'editstatus'])->name('editstatus');

Route::get('/verifikasi/{id}', [ServiceController::class, 'verifikasi'])->name('verifikasi');

//send

Route::get('/send', [WappingController::class, 'send'])->name('send');

