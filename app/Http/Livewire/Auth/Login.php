<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Authenticated;

class Login extends Component
{
    public $email;

    public $password;

    public bool $remember = true;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
        'remember' => ['required', 'boolean'],
    ];

    public function attempt()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        $success = false;

        if($user && Hash::check($this->password, $user->password)) {
            $success = true;
        }

        if(!$success) {
            $this->addError('auth', 'The given email/password combo did not match any accounts, please try again.');

            return;
        } 

        session()->put([
            'login.id' => $user->getKey(),
            'login.remember' => true,
        ]);

        if($user->twoFactorAuthEnabled() and $user->twoFactorAuthConfirmed()) {
            return redirect()->route('two-factor.login');        
        } else {
            
            Auth::attempt([
                'email' => $this->email,
                'password' => $this->password
            ], true);

            event(new Authenticated('web', User::where('email', $this->email)->first()));
            
            return redirect()->intended(route('dashboard'));
        }
    }

    public function render()
    {
        return view('auth.login')
            ->extends('layouts.auth')
            ->section('content');
    }
}
