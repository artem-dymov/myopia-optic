<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlassesSelectionController;
use App\Http\Controllers\InfoPageController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/glasses-selection', [GlassesSelectionController::class, 'index'])->name('glasses-selection.index');
    Route::post('/glasses-selection', [GlassesSelectionController::class, 'selectGlasses'])->name('glasses-selection.select');
    Route::get('/info-page', [InfoPageController::class, 'index'])->name('info-page');
});

require __DIR__.'/auth.php';
