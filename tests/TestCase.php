<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function login(Authenticatable $user = null): User
    {
        if($user === null) {
            $user = User::factory()->create();
        }

        $this->actingAs($user);

        Auth::login($user);
        
        return $user;
    }
}
