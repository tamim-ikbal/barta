<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/***
 *Authentication Routes
 */

//Guest
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware(['throttle:login'])->name('login');

//Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware(['throttle:register'])->name('register');


//Password Reset
    Route::get('/forgot-password',
        [ForgotPasswordController::class, 'index'])->name('password.request');

    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::get('/reset-password/{token}',
        [PasswordResetController::class, 'index'])->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'store'])->name('password.update');

    Route::post('/forgot-password',
        [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

});


Route::middleware(['auth'])->group(function () {

    //Email Verification
    Route::get('/email/verify',
        [EmailVerificationController::class, 'notice'])->name('verification.notice');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware([
        'throttle:6,1'
    ])->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware([
        'signed'
    ])->name('verification.verify');

    //Logout
    Route::post('logout', LogoutController::class)->middleware(['auth', 'verified'])->name('logout');

});

