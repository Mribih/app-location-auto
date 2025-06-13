<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/voitures', [VoitureController::class, 'index'])->name('voitures.index');
    Route::get('/voitures/{voiture}', [VoitureController::class, 'show'])->name('voitures.show');

    Route::get('/voitures/{voiture}/reserver', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/voitures/{voiture}/reserver', [ReservationController::class, 'store'])->name('reservations.store');

    Route::get('/mes-reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::middleware('admin')->prefix('dashboard')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('voitures', \App\Http\Controllers\Admin\VoitureController::class);
    });
});

require __DIR__.'/auth.php';
