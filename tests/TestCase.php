<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function login(User $user = null): User
    {
        if($user === null) {
            $user = User::factory()->create();
        }
        
        Auth::login($user);
        
        return $user;
    }
}
