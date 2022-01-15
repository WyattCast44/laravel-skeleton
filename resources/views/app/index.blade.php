<x-blade.extends name="layouts.app" section="content">
    
    <x-blade.section name="page::title" content="Dashboard" />

    <div class="mx-4 sm:mx-auto max-w-xl my-10">

        <a href="{{ route('welcome') }}">
            <h1 class="pb-2.5 mb-2.5 text-2xl font-semibold border-b border-gray-300">
                Dashboard
            </h1>
        </a>

        <nav class="flex items-center space-x-4 border-b pb-2.5 border-gray-300">
            
            <form action="{{ route('logout') }}" method="post">
                <x-blade.csrf />
                <button class="link">Logout</button>
            </form>
    
        </nav>

        <div class="mt-10">

            Welcome back {{ auth()->user()->name }}, good to see you!

        </div>
        
    </div>

</x-blade.extends>