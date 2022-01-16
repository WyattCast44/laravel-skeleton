<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Auth\ConfirmPassword;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class ConfirmPasswordTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_an_authenticated_user_can_view_page()
    {
        $this->login();

        $this->get(route('password.confirm'))
            ->assertOk();
    }

    public function test_an_unauthenticated_user_cannot_access_route()
    {
        $this->get(route('password.confirm'))
            ->assertRedirect(route('login'));
    }

    public function test_livewire_component_is_present()
    {
        $this->login();

        $this->get(route('password.confirm'))
            ->assertOk()
            ->assertSeeLivewire(ConfirmPassword::class);
    }

    public function test_password_is_required()
    {
        $this->login();

        Livewire::test(ConfirmPassword::class)
            ->set('password', '')
            ->call('attempt')
            ->assertHasErrors([
                'password' => ['required']
            ]);
    }
}
