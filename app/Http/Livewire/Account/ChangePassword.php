<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Component
{
    public $current_password;

    public $new_password;

    protected function rules()
    {
        return [
            'current_password' => ['required', 'string', 'current_password'],
            'new_password' => ['required', 'string', 'max:255', Password::min(8)->numbers()->symbols()],
        ];
    }

    public function attempt()
    {
        $this->validate();

        auth()->user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset('current_password', 'new_password');

        session()->flash('success', 'Password updated!');

        return;
    }
    
    public function render()
    {
        return view('app.account.password')
            ->extends('layouts.app')
            ->section('content');
    }
}
