@props([
    'to',
    'active',
    'label',
])

<option class="bg-slate-100" value="{{ $to }}" {{ active($active) ? 'selected' : '' }}>{{ $label }}</option>