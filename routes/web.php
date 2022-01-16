<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/terms', 'pages.terms')->name('terms');

// Dashboard
Route::middleware(['auth'])->prefix('dashboard')->group(function() {

    // Dashboard index
    Route::view('/', 'app.index')->name('dashboard');
    
    // Account
    Route::view('/account/two-factor-auth', 'app.account.2fa')->name('dashboard.account.2fa');

});