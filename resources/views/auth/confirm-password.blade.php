<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
</x-blade.push>

<x-blade.section name="meta::title" content="Confirm Password" />
<x-blade.section name="page::title" content="Confirm Password" />

<div>
    
    <form class="space-y-4" wire:submit.prevent="attempt">

        <div>
            <x-inputs.label for="password">Password</x-inputs.label>
            <x-input-groups.password name="password" id="password" required wire:model.lazy="password" />
            <x-validation.error-inline name="password" />
        </div>

        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Confirm and Continue</button>
        </div>

    </form>

</div>