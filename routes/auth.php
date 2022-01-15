<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::group(['middleware' => ['guest']], function () {
    
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.email');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
    // Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])->name('two-factor.login');
    
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Route::get('/email/verify', VerifyEmail::class)->name('verification.notice');
    // Route::get('/confirm-password', ConfirmPassword::class)->name('password.confirm');
    // Route::get('/email/verify/{id}/{hash}', EmailVerificationController::class)->name('verification.verify');
});

