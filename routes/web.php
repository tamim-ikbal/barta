<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', IndexController::class)->name('home');

    //Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{username}', [ProfileController::class, 'update'])->name('profile.update');
});


//This should be the last route
Route::get('/{username}', [ProfileController::class, 'show'])->middleware(['auth', 'verified'])->name('profile.show');
