<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
</x-blade.push>

<x-blade.section name="meta::title" content="Two Factor Auth" />

<x-blade.extends name="layouts.auth" section="content">
    
    <h2 class="mb-5 text-2xl font-semibold">Two Factor Auth Challenge</h2>
    
    <form class="space-y-4" method="POST" action="{{ url('/two-factor-challenge') }}">

        <x-blade.csrf />
    
        <div>
            <x-inputs.label x-data="{message: 'You will need your authenticator application to obtain this'}" x-tooltip="message" for="code">One time passoword</x-inputs.label>
            <x-input-groups.password name="code" id="code" autofocus />
            <x-validation.error-inline name="code" />
        </div>

        <div>
            <x-inputs.label for="recovery_code">Or use recovery Code</x-inputs.label>
            <x-input-groups.password name="recovery_code" id="recovery_code" />
            <x-validation.error-inline name="recovery_code" />
        </div>
        
        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Confirm and Continue</button>
        </div>
    
    </form>

</x-blade.extends>