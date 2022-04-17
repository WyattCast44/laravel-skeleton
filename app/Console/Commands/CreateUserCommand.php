<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Console\Commands\Concerns\WithInputValidation;

class CreateUserCommand extends Command
{
    use WithInputValidation;

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
            'name' => $this->askWithValidation('What is the user\'s name', [
                'required', 'min:2', 'max:255'
            ], 'name'),
            'email' => $this->askWithValidation('What is the user\'s email', [
                'required', 'email', 'max:255'
            ], 'email'),
            'email_verified_at' => ($this->confirm('Should the email be marked as verified?', false)) ? now() : null,
            'password' => bcrypt($this->askWithValidation('What should the password be?')),
        ];

        $user = User::create($user);

        $this->info('User created: ' . $user);

        return 0;   
    }
}
