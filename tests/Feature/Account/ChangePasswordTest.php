<?php

namespace Tests\Feature\Account;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Account\ChangePassword;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_an_authenticated_user_can_view_page()
    {
        $this->login();

        $this->get(route('dashboard.account.password'))
            ->assertOk();
    }

    public function test_an_unauthenticated_user_cannot_access_route()
    {
        $this->get(route('dashboard.account.password'))
            ->assertRedirect(route('login'));
    }

    public function test_livewire_component_is_present()
    {
        $user = $this->login();

        $this->get(route('dashboard.account.password'))
            ->assertSeeLivewire(ChangePassword::class);
    }

    public function test_ensure_current_password_is_required()
    {
        $this->login();

        Livewire::test(ChangePassword::class)
            ->set('current_password', '')
            ->set('new_password', 'password123!')
            ->call('attempt')
            ->assertHasErrors([
                'current_password' => ['required']
            ]);
    }

    public function test_ensure_new_password_is_required()
    {
        $this->login();

        Livewire::test(ChangePassword::class)
            ->set('current_password', 'password')
            ->set('new_password', '')
            ->call('attempt')
            ->assertHasErrors([
                'new_password' => ['required']
            ]);
    }

    public function test_ensure_current_password_must_match_users_password()
    {
        $this->login();

        Livewire::test(ChangePassword::class)
            ->set('current_password', 'password123!')
            ->set('new_password', 'password123!')
            ->call('attempt')
            ->assertHasErrors([
                'current_password' => ['current_password']
            ]);
    }

    public function test_ensure_user_can_successfully_change_password()
    {
        $user = $this->login();

        Livewire::test(ChangePassword::class)
            ->set('current_password', 'password')
            ->set('new_password', 'password123!')
            ->call('attempt')
            ->assertHasNoErrors();
        
        $this->assertTrue(Hash::check('password123!', $user->fresh()->password));
    }
}
