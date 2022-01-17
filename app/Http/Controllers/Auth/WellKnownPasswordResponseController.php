<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class WellKnownPasswordResponseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(): RedirectResponse
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.account.password');
        } 
    
        return redirect()->route('password.email');
    }
}
