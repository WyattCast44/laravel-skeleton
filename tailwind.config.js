module.exports = {
    content: [
        "./vendor/laravel/framework/Pagination/**/*.php",
        "./storage/framework/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.css",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
