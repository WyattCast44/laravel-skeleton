<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class RegisterTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_an_authenticated_user_cannot_access_page()
    {
        $this->login();

        $this->get(route('register'))
            ->assertRedirect(route('dashboard'));
    }
    
    public function test_an_unauthenticated_user_can_access_page()
    {
        $this->get(route('register'))->assertOk();
    }

    public function test_livewire_component_is_present()
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSeeLivewire(Register::class);
    }

    public function test_ensure_name_is_required()
    {
        Livewire::test(Register::class)
            ->set('name', '')
            ->set('email', 'email@email.com')
            ->set('password', 'password')
            ->call('attempt')
            ->assertHasErrors([
                'name' => ['required']
            ]);
    }

    public function test_ensure_email_is_required()
    {
        Livewire::test(Register::class)
            ->set('name', 'wyatt')
            ->set('email', '')
            ->set('password', 'password')
            ->call('attempt')
            ->assertHasErrors([
                'email' => ['required']
            ]);
    }

    public function test_ensure_email_must_be_valid_email()
    {
        Livewire::test(Register::class)
            ->set('name', 'wyatt')
            ->set('email', 'not-an-email')
            ->set('password', 'password')
            ->call('attempt')
            ->assertHasErrors([
                'email' => ['email']
            ]);
    }

    public function test_ensure_password_is_required()
    {
        Livewire::test(Register::class)
            ->set('name', 'wyatt')
            ->set('email', 'email@email.com')
            ->set('password', '')
            ->call('attempt')
            ->assertHasErrors([
                'password' => ['required']
            ]);
    }

    public function test_ensure_valid_credentials_are_accepted_and_user_is_redirected()
    {
        Livewire::test(Register::class)
            ->set('name', 'wyatt')
            ->set('email', 'email@email.com')
            ->set('password', 'password123!')
            ->call('attempt')
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard'));

        $this->assertTrue(Auth::check());
    }
}
