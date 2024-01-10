<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CaborController;
use App\Http\Controllers\NomorController;
use App\Http\Controllers\KontingenController;
use App\Http\Controllers\AtletController;
// use App\Http\Controllers\AtletKontingenCaborController;
// use App\Http\Controllers\AtletKontingenCaborNomorController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Route;

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
    return view('layouts.home');
});

Route::get('/', [HomeController::class, 'home'] )->name('homeWelcome');
Route::get('/kontingenWelcome', [HomeController::class, 'kontingen'] )->name('kontingenWelcome');
Route::get('/caborWelcome', [HomeController::class, 'cabor'] )->name('caborWelcome');
Route::get('/jadwalWelcome', [HomeController::class, 'jadwal'] )->name('jadwalWelcome');
Route::get('/tempatWelcome', [HomeController::class, 'tempat'] )->name('tempatWelcome');
Route::get('/kontingenWelcome', [HomeController::class, 'kontingen'] )->name('kontingenWelcome');
Route::get('/hasilWelcome', [HomeController::class, 'hasil'] )->name('hasilWelcome');
Route::get('/medaliWelcome', [HomeController::class, 'medali'] )->name('medaliWelcome');

Route::prefix('/welcome')->group(function () {
    Route::get('/caborHome', [CaborController::class, 'index'])->name('caborHome');
    Route::get('/jadwalHome', [JadwalController::class, 'index'])->name('jadwalHome');
    Route::get('/hasilHome', [HasilController::class, 'index'])->name('hasilHome');
    Route::get('/kontingenHome', [KontingenController::class, 'index'])->name('kontingenHome');
    Route::get('/getMedali', [HasilController::class, 'getMedali'])->name('getMedali');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.index', [DashboardController::class, 'index']);
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/cabor', function () {
//     return view('admin.cabor.index', [CaborController::class, 'index']);
// })->middleware(['auth', 'verified'])->name('cabor');

// Route::get('cabor2',[CaborController::class, 'index2']);

Route::middleware(['auth'])->prefix('olahraga')->group(function () {
    Route::prefix('cabor')->group(function () {
        Route::get('/',[CaborController::class, 'index'])->name('cabor');
        Route::get('/create',[CaborController::class, 'create'])->name('caborCreate');
        Route::post('/store', [CaborController::class, 'store'])->name('caborStore');
        Route::get('/{id}/edit', [CaborController::class, 'edit'])->name('caborEdit');
        Route::get('/destroy/{id}',[CaborController::class, 'destroy'])->name('caborDelete');
    });

    Route::prefix('nomor')->group(function () {
        Route::get('/',[NomorController::class, 'index'])->name('nomor');
        Route::get('/create',[NomorController::class, 'create'])->name('nomorCreate');
        Route::get('/getNomorByCabor',[NomorController::class, 'getNomorByCabor'])->name('getNomorByCabor');
        Route::post('/store',[NomorController::class, 'store'])->name('nomorStore');
        Route::get('/{id}/edit',[NomorController::class, 'edit'])->name('nomorEdit');
        Route::get('/destroy/{id}',[NomorController::class, 'destroy'])->name('nomorDelete');
    });
});

Route::middleware(['auth'])->prefix('kontingen')->group(function () {
    Route::get('/',[KontingenController::class, 'index'])->name('kontingen');
    Route::get('/create',[KontingenController::class, 'create'])->name('kontingenCreate');
    Route::post('/store', [KontingenController::class, 'store'])->name('kontingenStore');
    Route::get('/{id}/edit', [KontingenController::class, 'edit'])->name('kontingenEdit');
    Route::get('/destroy/{id}', [KontingenController::class, 'destroy'])->name('kontingenDelete');
});

Route::middleware(['auth'])->prefix('atlet')->group(function () {
    Route::get('/', [AtletController::class, 'index'])->name('atletKontingenCaborNomor');
    Route::get('/create', [AtletController::class, 'create'])->name('atletKontingenCaborNomorCreate');
    Route::get('/getAtletByNomor',[AtletController::class, 'getAtletByNomor'])->name('getAtletByNomor');
    Route::post('/store', [AtletController::class, 'store'])->name('atletKontingenCaborNomorStore');
    Route::get('/{id}/edit', [AtletController::class, 'edit'])->name('atletKontingenCaborNomorEdit');
    Route::get('/destroy/{id}', [AtletController::class, 'destroy'])->name('atletKontingenCaborNomorDelete');
});


// Tidak Digunakan Karena ada Revisi
// Route::middleware(['auth'])->prefix('atlet')->group(function () {
//     Route::prefix('atlet-kontingen-nomor')->group(function () {
//         Route::get('/',[AtletKontingenCaborController::class, 'index'])->name('atletKontingenNomor');
//         Route::get('/create',[AtletKontingenCaborController::class, 'create'])->name('atletKontingenNomorCreate');
//         Route::post('/store',[AtletKontingenCaborController::class, 'store'])->name('atletKontingenNomorStore');
//         Route::get('/{id}/edit',[AtletKontingenCaborController::class, 'edit'])->name('atletKontingenNomorEdit');
//         Route::get('/destroy/{id}',[AtletKontingenCaborController::class, 'destroy'])->name('atletKontingenNomorDelete');
//     });
//     Route::prefix('atlet-kontingen-cabor-nomor')->group(function () {
//         Route::get('/', [AtletKontingenCaborNomorController::class, 'index'])->name('atletKontingenCaborNomor');
//         Route::get('/create', [AtletKontingenCaborNomorController::class, 'create'])->name('atletKontingenCaborNomorCreate');
//         Route::post('/store', [AtletKontingenCaborNomorController::class, 'store'])->name('atletKontingenCaborNomorStore');
//         Route::get('/{id}/edit', [AtletKontingenCaborNomorController::class, 'edit'])->name('atletKontingenCaborNomorEdit');
//         Route::get('/destroy/{id}', [AtletKontingenCaborNomorController::class, 'destroy'])->name('atletKontingenCaborNomorDelete');
//     });
// });

Route::middleware(['auth'])->prefix('jadwal')->group(function () {
    Route::get('/', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('/create',[JadwalController::class, 'create'])->name('jadwalCreate');
    Route::post('/store',[JadwalController::class, 'store'])->name('jadwalStore');
    Route::get('/destroy/{id}', [JadwalController::class, 'destroy'])->name('jadwalDelete');
});

Route::middleware(['auth'])->prefix('hasil')->group(function () {
    Route::get('/', [HasilController::class, 'index'])->name('hasil');
    Route::get('/create', [HasilController::class, 'create'])->name('hasilCreate');
    Route::post('/store', [HasilController::class, 'store'])->name('hasilStore');
    Route::get('/{id}/edit', [HasilController::class, 'edit'])->name('hasilEdit');
    Route::get('/destroy/{id}', [HasilController::class, 'destroy'])->name('hasilDelete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
