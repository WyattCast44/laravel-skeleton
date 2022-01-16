<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\Auth\Login;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class LoginTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_an_authenticated_user_cannot_access_page()
    {
        $this->login();

        $this->get(route('login'))
            ->assertRedirect(route('dashboard'));
    }
    
    public function test_an_unauthenticated_user_can_access_page()
    {
        $this->get(route('login'))->assertOk();
    }

    public function test_livewire_component_is_present()
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSeeLivewire(Login::class);
    }

    public function test_ensure_email_is_required()
    {
        Livewire::test(Login::class)
            ->set('email', '')
            ->set('password', 'password')
            ->set('remember', true)
            ->call('attempt')
            ->assertHasErrors([
                'email' => ['required']
            ]);
    }

    public function test_ensure_email_must_be_valid_email()
    {
        Livewire::test(Login::class)
            ->set('email', 'not-an-email')
            ->set('password', 'password')
            ->set('remember', true)
            ->call('attempt')
            ->assertHasErrors([
                'email' => ['email']
            ]);
    }

    public function test_ensure_password_is_required()
    {
        Livewire::test(Login::class)
            ->set('email', 'email@email.com')
            ->set('password', '')
            ->set('remember', true)
            ->call('attempt')
            ->assertHasErrors([
                'password' => ['required']
            ]);
    }

    public function test_ensure_valid_credentials_are_accepted_and_user_is_redirected()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->set('remember', true)
            ->call('attempt')
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard'));
    }
}
