<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
</x-blade.push>

<x-blade.section name="meta::title" content="Forgot Password" />

<div>

    <h2 class="mb-5 text-2xl font-semibold">Send Password Reset Email</h2>
    
    <form class="space-y-4" wire:submit.prevent="attempt">

        <div>
            @if (session()->has('success'))
                <p class="selection:bg-green-100 my-0.5 text-green-700 text-sm">{{ session('success') }}<p>
            @endif
        </div>
    
        <div>
            <x-inputs.label for="email">Email</x-inputs.label>
            <x-inputs.text type="email" name="email" id="email" wire:model.lazy="email" required autofocus />
            <x-validation.error-inline name="email" />
        </div>
    
        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Send reset email</button>
        </div>
    
    </form>
    
</div>
