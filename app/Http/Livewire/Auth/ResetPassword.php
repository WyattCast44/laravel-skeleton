<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;

class ResetPassword extends Component
{
    public $email;

    public $password;

    public $password_confirmation;

    public $token;

    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'confirmed', RulesPassword::min(8)->symbols()->numbers()],
            'token' => ['required', 'string'],
        ];
    }

    public function mount($token)
    {
        $this->email = request()->query('email', '');

        $this->token = $token;
    }

    public function attempt()
    {
        $this->validate();

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ], function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();

            $user->setRememberToken(Str::random(60));

            event(new PasswordReset($user));

            Auth::login($user);
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('dashboard');
        }

        if ($status === Password::INVALID_TOKEN) {
            $this->addError('token', trans($status));
        } elseif ($status === Password::INVALID_USER) {
            $this->addError('email', trans($status));
        } else {
            $this->addError('general', 'An error occurred, please request a new password reset link.');
        }
    }

    public function render()
    {
        return view('auth.reset-password')
            ->extends('layouts.auth')
            ->section('content');
    }
}