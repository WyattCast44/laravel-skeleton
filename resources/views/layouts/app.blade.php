<x-blade.push name="head::styles">
    <livewire:styles />
</x-blade.push>

<x-blade.push name="head::scripts">
    <livewire:scripts />
</x-blade.push>

<x-blade.extends name="layouts.base" section="body">
    
    <div class="mx-4 sm:mx-auto max-w-xl my-10">

        <h1 class="pb-2.5 mb-2.5 text-2xl font-semibold border-b border-gray-300">
            <x-blade.yield name="page::title" />
        </h1>
        
        <nav class="flex items-center space-x-4 border-b pb-2.5 border-gray-300">

            <x-nav.select class="py-1">
                <x-nav.select.option label="Dashboard" :to="route('dashboard')" active="dashboard" />
                <x-nav.select.option label="2 Factor Auth" :to="route('dashboard.account.2fa')" active="dashboard.account.2fa" />
            </x-nav.select>

            <form action="{{ route('logout') }}" method="post">
                <x-blade.csrf />
                <button class="link">Logout</button>
            </form>
    
        </nav>

        <div class="mt-5">

            <x-blade.yield name="content" />

        </div>
        
    </div>

</x-blade.extends>