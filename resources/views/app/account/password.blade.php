<x-blade.section name="meta::title" content="Change Your Password" />
<x-blade.section name="page::title" content="Change Your Password" />

<div>

    <form method="post" class="space-y-4" wire:submit.prevent="attempt">
    
        @if (session()->has('success'))
            <p class="text-green-700 selection:bg-green-100">{{ session('success') }}</p>
        @endif

        <x-blade.csrf />
    
        <div>
            <x-inputs.label class="inline-block" for="current_password">Current Password</x-inputs.label>
            <x-input-groups.password name="current_password" class="block" id="current_password" wire:model.lazy="current_password" required autofocus />
            <x-validation.error-inline name="current_password" />
        </div>

        <div>
            <x-inputs.label class="inline-block" for="new_password">New Password</x-inputs.label>
            <x-input-groups.password name="new_password" class="block" id="new_password" wire:model.lazy="new_password" required />
            <x-validation.error-inline name="new_password" />
        </div>

        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Update Password</button>
        </div>
        
    </form>

</div>