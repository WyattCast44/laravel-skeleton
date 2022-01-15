<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'auth.login')
    ->middleware(['guest'])
    ->name('login');

Route::view('/register', 'auth.register')
    ->middleware(['guest'])
    ->name('register');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');
