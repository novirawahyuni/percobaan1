<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicBookingController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\TentangKamiController;

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
    return view('welcome');
});

// Booking Now create
Route::get('/booking', [PublicBookingController::class, 'create'])->name('booking.create');

// Booking Input Admin
Route::post('/booking', [PublicBookingController::class, 'store'])->name('booking.store');

// Pelayanan
Route::get('/pelayanan', [PelayananController::class, 'index'])->name('pelayanan.index');

// Tentang Kami
Route::get('/tentangkami', [TentangKamiController::class, 'index'])->name('tentangkami.index');

// History
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

