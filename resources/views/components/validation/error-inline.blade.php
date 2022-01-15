@props([
    'name'
])

@error($name)
    <p class="selection:bg-red-100 my-0.5 text-red-500 text-sm">{{ $message }}<p>
@enderror