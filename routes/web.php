<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', IndexController::class)->name('home');

    //Profile
    Route::get('/@{username}', [ProfileController::class, 'show'])->name('profile.show');
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/{username}', [ProfileController::class, 'update'])->name('update');
    });

    Route::resource('posts', PostController::class)->except(['create', 'edit', 'index']);

});

require __DIR__.'/auth.php';
