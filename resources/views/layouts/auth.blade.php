<x-blade.push name="head::styles">
    <livewire:styles />
</x-blade.push>

<x-blade.push name="head::scripts">
    <livewire:scripts />
</x-blade.push>

<x-blade.extends name="layouts.base" section="body">
    
    <div class="mx-4 sm:mx-auto max-w-xl my-10">

        <a href="{{ route('welcome') }}">
            <h1 class="pb-2.5 mb-2.5 text-2xl font-semibold border-b border-gray-300">
                {{ config('app.name') }}
            </h1>
        </a>

        <nav class="flex items-center space-x-4 border-b pb-2.5 border-gray-300">
            
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>

            <x-nav.select class="py-1">
                <x-nav.select.option label="Welcome" :to="route('welcome')" active="welcome" />
                <x-nav.select.option label="Login" :to="route('login')" active="login" />
                <x-nav.select.option label="Register" :to="route('register')" active="register" />
                <x-nav.select.option label="Terms" :to="route('terms')" active="terms" />
            </x-nav.select>

        </nav>

        <div class="mt-5">
            <x-blade.yield name="content" />
        </div>
        
    </div>


</x-blade.extends>