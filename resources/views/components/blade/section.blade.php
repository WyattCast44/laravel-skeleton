@props([
    'name',
    'content' => null,
])

@if ($content != null)
    @section($name, $content)

@else

@section($name)
{{ $slot }}
@endsection
    
@endif
