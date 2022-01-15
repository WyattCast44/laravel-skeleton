<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
</x-blade.push>

<div>

    <h2 class="mb-5 text-2xl font-semibold">Reset Password</h2>
    
    <form class="space-y-4" wire:submit.prevent="attempt">

        <div>
            <x-validation.error-inline name="token" />
            <x-validation.error-inline name="general" />
        </div>
    
        <div class="hidden">
            <x-inputs.label for="token" class="hidden">Email</x-inputs.label>
            <x-inputs.text type="hidden" name="token" id="token" wire:model.lazy="token" required />
        </div>

        <div>
            <x-inputs.label for="email">Email</x-inputs.label>
            <x-inputs.text type="email" name="email" id="email" wire:model.lazy="email" required autofocus />
            <x-validation.error-inline name="email" />
        </div>

        <div>
            <x-inputs.label for="password">Password</x-inputs.label>
            <x-input-groups.password name="password" id="password" wire:model.lazy="password" required />
            <x-validation.error-inline name="password" />
        </div>

        <div>
            <x-inputs.label for="password_confirmation">Password Confirmation</x-inputs.label>
            <x-input-groups.password name="password_confirmation" id="password_confirmation" wire:model.lazy="password_confirmation" required />
            <x-validation.error-inline name="password_confirmation" />
        </div>
    
        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Reset Password and Login</button>
        </div>
    
    </form>
    
</div>
