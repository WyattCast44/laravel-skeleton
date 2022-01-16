<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
    <style>input[type='checkbox']{display: inline-block;}</style>
</x-blade.push>

<x-blade.section name="meta::title" content="Login" />

<div>

    <h2 class="mb-5 text-2xl font-semibold">Login</h2>
    
    <form class="space-y-4" wire:submit.prevent="attempt">

        <div>
            <x-validation.error-inline name="invalidCredentials" />
        </div>
    
        <div>
            <x-inputs.label for="email">Email</x-inputs.label>
            <x-inputs.text type="email" name="email" id="email" wire:model.lazy="email" required autofocus />
            <x-validation.error-inline name="email" />
        </div>
        
        <div>
            <x-inputs.label for="password">Password</x-inputs.label>
            <x-input-groups.password name="password" id="password" required wire:model.lazy="password" />
            <x-validation.error-inline name="password" />
        </div>
    
        <div class="flex items-center space-x-2.5">
            <x-inputs.checkbox name="remember" id="remember" wire:model.lazy="remember" />
            <x-inputs.label for="remember">Remember Me</x-inputs.label>
        </div>

        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Login</button>
        </div>

        <div>
            <a href="{{ route('password.email') }}">Forgot your password?</a>
        </div>
    
    </form>
    
</div>
