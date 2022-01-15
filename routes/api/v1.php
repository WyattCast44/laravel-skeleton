<?php

use App\Http\Controllers\API\v1\HealthController;
use Illuminate\Support\Facades\Route;

Route::get('health', HealthController::class)->name('api.v1.health');