<?php

namespace Tests\Feature\Account;

use Tests\TestCase;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class TwoFactorAuthTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_an_authenticated_user_can_view_page()
    {
        $this->login();

        $this->get(route('dashboard.account.2fa'))
            ->assertOk();
    }

    public function test_an_unauthenticated_user_cannot_access_route()
    {
        $this->get(route('dashboard.account.2fa'))
            ->assertRedirect(route('login'));
    }

    public function test_an_user_by_default_has_two_factor_auth_disabled_and_not_confirmed()
    {
        $user = $this->login();

        $this->assertFalse($user->twoFactorAuthEnabled());
        $this->assertFalse($user->twoFactorAuthConfirmed());
    }

    public function test_an_user_can_enable_two_factor_auth()
    {
        $user = $this->login();

        $this->get(route('dashboard.account.2fa'))
            ->assertOk();
        
        $this
            ->withoutMiddleware(RequirePassword::class)
            ->post(url('user/two-factor-authentication'))
            ->assertRedirect(route('dashboard.account.2fa'))
            ->assertSessionHas('status', 'two-factor-authentication-enabled');

        $this->assertTrue($user->twoFactorAuthEnabled());
        $this->assertFalse($user->twoFactorAuthConfirmed());
    }
}
