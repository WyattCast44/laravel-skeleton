<x-inputs.select onchange="window.navigate(event)" {{ $attributes }}>
    {{ $slot }}
</x-inputs.select>

@once
    @push('footer::scripts')
        <script>
            window.navigate = function(event) {
                window.location.href = event.target.value;
            }
        </script>
    @endpush
@endonce