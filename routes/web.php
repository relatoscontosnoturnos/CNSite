<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelatoController;
use App\Http\Controllers\EpisodeController;

Route::get('/episodios', [EpisodeController::class, 'index'])->name('episodes.index');

Route::post('/enviar-relato', [RelatoController::class, 'enviar'])->name('enviar.relato');

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


