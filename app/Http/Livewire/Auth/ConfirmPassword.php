<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ConfirmPassword extends Component
{
    public $password;

    protected $rules = [
        'password' => ['required', 'string'],
    ];

    public function attempt()
    {
        $this->validate();

        $status = Hash::check($this->password, auth()->user()->password);

        if ($status) {
            request()->session()->passwordConfirmed();

            return redirect()->intended();
        }

        $this->addError('password', 'Please check your password and try again.');
    }

    public function render()
    {
        return view('auth.confirm-password')
            ->extends('layouts.app')
            ->section('content');
    }
}