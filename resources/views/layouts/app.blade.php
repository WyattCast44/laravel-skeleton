<x-blade.push name="head::meta">
    <meta name="csrf_token" value="{{ csrf_token() }}" />
</x-blade.push>

<x-blade.extends name="layouts.base" section="body">

    <x-blade.yield name="content" />

</x-blade.extends>