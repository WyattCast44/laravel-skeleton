const mix = require('laravel-mix');

// setup
mix.disableNotifications();

// css
mix.postCss('resources/css/app.css', 'public/css', [
    require("tailwindcss"),
]);

// js
mix.js('resources/js/app.js', 'public/js');

// config
if(mix.inProduction()) {
    mix.version();
}