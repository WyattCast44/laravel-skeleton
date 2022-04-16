<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user interactively';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = [
            'name' => $this->determineName(),
            'email' => $this->determineEmail(),
            'email_verified_at' => $this->determineEmailVerification(),
            'password' => $this->determinePassword(),
        ];

        $user = User::create($user);

        $this->info('User created, id: ' . $user->id);

        return 0;   
    }

    private function determineName(): string
    {
        $name = (string) str($this->ask('What is the user\'s name'))
            ->squish()
            ->trim();

        $this->validate(['name' => $name], [
            'name' => ['required', 'min:3', 'max:255']
        ], function() {
            $this->error('Name is required and be between 3 and 255 characters. Please try again');
            exit(1);
        });

        return (string) $name;
    }

    private function determineEmail(): string
    {
        $email = (string) str($this->ask('What is the user\'s email'))
            ->squish()
            ->lower()
            ->trim();

        $this->validate(['email' => $email], [
            'email' => ['required', 'email', 'unique:users,email']
        ], function() {
            $this->error('Email is required and must be a valid email, additionally it must not already be is use. Please try again');
            exit(1);
        });

        return (string) $email;
    }

    private function determineEmailVerification()
    {
        $status = $this->confirm('Should the email be marked as verified', false);

        if($status) {
            return now();
        } 

        return null;
    }

    private function determinePassword(): string
    {
        $password = (string) str($this->ask('What should the password be (leave black to autogenerate)'))
            ->trim();

        $password = ($password != "") ? $password : Str::random(12);

        $this->validate(['password' => $password], [
            'password' => ['required', 'min:8']
        ], function() {
            $this->error('Password is required and must be at least 8 characters long. Please try again');
            exit(1);
        });

        return (string) Hash::make($password);
    }

    public function validate($data, $rules, $handleFailure): bool
    {
        $validator = Validator::make($data, $rules);
    
        if ($validator->fails()) {
            $handleFailure();

            return false;
        }

        return true;
    }
}
