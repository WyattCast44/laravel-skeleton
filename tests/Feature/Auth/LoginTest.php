<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class LoginTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_an_unauthenticated_user_can_access_page()
    {
        $this->get(route('login'))->assertOk();
    }

    public function test_an_authenticated_user_cannot_access_page()
    {
        $this->login();

        $this->get(route('login'))
            ->assertRedirect(route('dashboard'));
    }
}
