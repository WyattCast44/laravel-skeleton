<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
</x-blade.push>

<x-blade.extends name="layouts.auth" section="content">

    <form class="space-y-4">

        <div>
            <x-inputs.label for="email">Email</x-inputs.label>
            <x-inputs.text type="email" name="email" id="email" />
        </div>
        
        <div>
            <x-inputs.label for="password">Password</x-inputs.label>
            <x-input-groups.password name="password" id="password" />
        </div>

    </form>

</x-blade.extends>