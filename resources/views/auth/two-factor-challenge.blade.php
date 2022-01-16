<x-blade.push name="head::styles">
    <style>label{display: inline-block;}</style>
    <style>input{display: block;}</style>
</x-blade.push>

<x-blade.section name="meta::title" content="Two Factor Auth" />

<x-blade.extend name="layouts.auth" section="content">
    
    <h2 class="mb-5 text-2xl font-semibold">Two Factor Auth Challenge</h2>
    
    <form class="space-y-4" method="POST" action="{{ url('/two-factor-challenge') }}">

        <x-blade.csrf />
    
        <div>
            <x-inputs.label for="code">Code</x-inputs.label>
            <x-input-groups.password name="code" id="code" required autofocus />
            <x-validation.error-inline name="code" />
        </div>
        
        <div class="flex items-center space-x-2.5">
            <button type="submit" class="link">Confirm and Continue</button>
        </div>
    
    </form>

</x-blade.extend>