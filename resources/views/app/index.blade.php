<x-blade.section name="meta::title" content="Dashboard" />
<x-blade.section name="page::title" content="Dashboard" />

<x-blade.extends name="layouts.app" section="content">
    
    Welcome back {{ auth()->user()->name }}, good to see you!

</x-blade.extends>