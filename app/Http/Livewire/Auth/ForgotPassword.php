<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => ['required', 'string', 'email', 'exists:users,email'],
    ];

    public function attempt()
    {
        $this->validate();

        $status = Password::sendResetLink([
            'email' => $this->email
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->email = "";
            
            session()->flash('success', 'Password reset email sent!');

            return;
        }

        $this->addError('email', trans($status));
    }

    public function render()
    {
        return view('auth.forgot-password')
            ->extends('layouts.auth')
            ->section('content');
    }
}
