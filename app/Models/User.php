<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'two_factor_confirmed',
        'api_disclaimer_accepted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_confirmed' => 'boolean',
        'api_disclaimer_accepted_at' => 'datetime',
    ];

    /**
     * Accessors, mutators
     */
    public function getAvatarUrlAttribute(): string
    {
        if(!$this->avatar)  {
            return "https://www.gravatar.com/avatar/" . md5($this->email);
        }

        return Storage::url($this->avatar);
    }

    /**
     * Abilities, affordances, checks
     */
    public function apiEnabled(): bool
    {
        return (bool) $this->api_disclaimer_accepted_at;
    }

    public function enableApiAccess(): void
    {
        $this->update([
            'api_disclaimer_accepted_at' => now(),
        ]);
    }

    public function twoFactorAuthEnabled(): bool
    {
        return (bool) $this->two_factor_secret;
    }

    public function twoFactorAuthConfirmed(): bool
    {
        return (bool) $this->two_factor_confirmed;
    }
}
