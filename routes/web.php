<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CaborController;
use App\Http\Controllers\NomorController;
use App\Http\Controllers\KontingenController;
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
    return view('welcome');
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
