<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Auth\ResetPassword;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_livewire_component_is_present()
    {
        $this->get(route('password.reset', ['token' => 'fake']))
            ->assertSeeLivewire(ResetPassword::class);
    }

    public function test_token_is_required()
    {
        Livewire::test(ResetPassword::class, [
            'token' => null,
        ])
            ->call('attempt')
            ->assertHasErrors(['token' => 'required']);
    }

    public function test_email_is_required()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('email', null)
            ->call('attempt')
            ->assertHasErrors(['email' => 'required']);
    }

    public function test_email_must_be_valid()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('email', 'email')
            ->call('attempt')
            ->assertHasErrors(['email' => 'email']);
    }

    function test_password_is_required()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('password', '')
            ->call('attempt')
            ->assertHasErrors(['password' => 'required']);
    }

    function test_password_confirmation_is_required()
    {
        Livewire::test('auth.reset-password', [
            'token' => Str::random(16),
        ])
            ->set('password', 'password')
            ->set('password_confirmation', '')
            ->call('attempt')
            ->assertHasErrors(['password' => 'confirmed']);
    }

    public function test_can_view_password_reset_page()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        $this->get(route('password.reset', [
            'email' => $user->email,
            'token' => $token,
        ]))
            ->assertSuccessful()
            ->assertSee($user->email);
    }

    public function test_can_reset_password()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        Livewire::test('auth.reset-password', [
            'token' => $token,
        ])
            ->set('email', $user->email)
            ->set('password', 'new-password-123!')
            ->set('password_confirmation', 'new-password-123!')
            ->call('attempt')
            ->assertRedirect(route('dashboard'));

        $this->assertTrue(Auth::attempt([
            'email' => $user->email,
            'password' => 'new-password-123!',
        ]));
    }
}