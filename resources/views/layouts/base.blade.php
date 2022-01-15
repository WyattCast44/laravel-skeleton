<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <x-blade.include name="layouts.partials.meta" />
    <x-blade.include name="layouts.partials.styles" />
    <x-blade.include name="layouts.partials.head-scripts" />
</head>
<body class="font-sans text-gray-900 selection:bg-slate-300 @stack('body::classes')">
    
    <x-blade.yield name="body" />

    <x-blade.include name="layouts.partials.footer-scripts" />
</body>
</html>