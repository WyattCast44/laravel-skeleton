<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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

        $status = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember);

        if(!$status) {
            $this->addError('invalidCredentials', 'The given email/password combination does not match any accounts, please try again');

            return;
        }

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('auth.login')
            ->extends('layouts.auth')
            ->section('content');
    }
}
