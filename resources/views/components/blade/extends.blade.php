@props([
    'name',
    'section' => null,
])

@extends($name)

@if ($section != null)

    @section($section)
        {{ $slot }}
    @endsection
    
@else 

    {{ $slot }}

@endif