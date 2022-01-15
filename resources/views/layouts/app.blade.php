<x-blade.extends name="layouts.base" section="body">
    
    <div class="mx-4 sm:mx-auto max-w-xl my-10">

        <a href="{{ route('dashboard') }}">
            <h1 class="pb-2.5 mb-2.5 text-2xl font-semibold border-b border-gray-300">
                <x-blade.yield name="page::title" />
            </h1>
        </a>

        <nav class="flex items-center space-x-4 border-b pb-2.5 border-gray-300">
            
            <form action="{{ route('logout') }}" method="post">
                <x-blade.csrf />
                <button class="link">Logout</button>
            </form>
    
        </nav>

        <div class="mt-5">

            Welcome back {{ auth()->user()->name }}, good to see you!

        </div>
        
    </div>

</x-blade.extends>