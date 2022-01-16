<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\VerifyEmail;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ConfirmPassword;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\TwoFactorAuthController;
use App\Http\Controllers\Auth\WellKnownPasswordResponseController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.email');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
    Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])->name('two-factor.login');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/confirm-password', ConfirmPassword::class)->name('password.confirm');
    Route::get('/email/verify', VerifyEmail::class)->name('verification.notice');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/email/verify/{id}/{hash}', EmailVerificationController::class)->name('verification.verify');
    Route::post('/two-factor-confirm', [TwoFactorAuthController::class, 'confirm'])->name('two-factor.confirm');
});

Route::get('/.well-known/change-password', WellKnownPasswordResponseController::class);
