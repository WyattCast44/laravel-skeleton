<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;

class TwoFactorAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function confirm(Request $request)
    {
        $user = $request->user();
        
        if(!$user->twoFactorAuthEnabled()) {
            return redirect()->intended(route('dashboard'));
        }

        $valid = app(TwoFactorAuthenticationProvider::class)
                ->verify(decrypt($user->two_factor_secret), $request->code);

        if ($valid) {
            $user->update([
                'two_factor_confirmed' => true,
            ]);

            session()->flash('success', 'Two factor authentication setup confirmed');

            return back(fallback: route('dashboard'));
        } else {
            return back(fallback: route('dashboard'))->withErrors(new MessageBag([
                'code' => 'One time password was invalid, please try again'
            ]));
        }
    }
}
