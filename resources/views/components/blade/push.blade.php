@props([
    'name',
    'content' => null,
])

@push($name)
@if ($content != null){{ $content }}@else{{ $slot }}@endif
@endpush