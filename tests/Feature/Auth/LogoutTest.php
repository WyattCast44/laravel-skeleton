<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class LogoutTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_an_authenticated_user_can_logout()
    {
        $this->login();

        $this->get(route('dashboard'))
            ->assertOk();

        $this->post(route('logout'))
            ->assertRedirect(route('welcome'));

        $this->assertFalse(Auth::check());
    }

    public function test_an_unauthenticated_user_cannot_access_route()
    {
        $this->assertFalse(Auth::check());

        $this->post(route('logout'))
            ->assertRedirect(route('login'));
    }
}
