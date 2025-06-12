<?php

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

    Route::middleware('admin')->group(function () {
    
    });
});

require __DIR__.'/auth.php';
