<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <x-blade.include name="layouts.partials.meta" />
    <x-blade.include name="layouts.partials.styles" />
    <x-blade.include name="layouts.partials.head-scripts" />
</head>
<body class=" @stack('body::classes')">
    
    <x-blade.yield name="body" />

    <x-blade.include name="layouts.partials.footer-scripts" />
</body>
</html>