<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('destroy');
    }

    public function create(Request $request)
    {
        return redirect()->route('dashboard');
    }
    
    public function destroy(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('welcome');
    }
}
