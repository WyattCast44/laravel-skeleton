<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Account\ChangePassword;

// General
Route::view('/', 'welcome')->name('welcome');
Route::view('/terms', 'pages.terms')->name('terms');

// Dashboard
Route::middleware(['auth'])->prefix('dashboard')->group(function() {

    // Dashboard index
    Route::view('/', 'app.index')->name('dashboard');
    
    // Account 2fa
    Route::view('/account/two-factor-auth', 'app.account.2fa')
        ->middleware(['verified'])
        ->name('dashboard.account.2fa');

    // Account password
    Route::get('/account/password', ChangePassword::class)
        ->name('dashboard.account.password');

});
