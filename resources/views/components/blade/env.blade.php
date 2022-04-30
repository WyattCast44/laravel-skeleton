@props(['name'])

@env($name)
    {{ $slot }}
@endenv