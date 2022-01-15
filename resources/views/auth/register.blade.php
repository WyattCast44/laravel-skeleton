<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
</x-blade.push>

<div>

    <h2 class="mb-5 text-2xl font-semibold">Register</h2>

    <form class="space-y-4" wire:submit.prevent="attempt">

        <div>
            <x-inputs.label for="name">Name</x-inputs.label>
            <x-inputs.text type="text" name="name" id="name" required wire:model.lazy="name" autofocus />
            <x-validation.error-inline name="name" />
        </div>

        <div>
            <x-inputs.label for="email">Email</x-inputs.label>
            <x-inputs.text type="email" name="email" id="email" required wire:model.lazy="email" />
            <x-validation.error-inline name="email" />
        </div>
        
        <div>
            <x-inputs.label for="password">Password</x-inputs.label>
            <x-input-groups.password name="password" id="password" required wire:model.lazy="password" />
            <x-validation.error-inline name="password" />
        </div>

        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Register</button>
        </div>

    </form>

</div>