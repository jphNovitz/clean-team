const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero': "bg-gradient-to-r(rgba(248, 250, 252, .8), rgba(248, 250, 252, 0.6), rgba(248, 250, 252, 1))",
                'hero-mobile': "linear-gradient(rgba(248, 250, 252, .6), rgba(248, 250, 252, 1)), url('images/cleaneuses-vertical.webp')",
                'hero-md': "bg-gradient-to-r(rgba(252, 231, 243, .8), rgba(252, 231, 243, 0.6), rgba(248, 250, 252, 1)), url('images/cleaneuses_bw')",
                'hero-bw': "bg-gradient-to-r(rgba(252, 231, 243, .8), rgba(252, 231, 243, 0.6)), url('images/cleaneuses_bw.webp')",
            },
            colors: {
                transparent: 'transparent',
                'main': '#f3d2c1', //bg
                'paragraph' : '#172c66',
                'white-custom': '#fef6e4',
                'smoky-black' : '#090601',
                'secondary': '#8bd3dd',
                'tertiary': "#f582ae",
                'headline': '#001858', 
                'link-dark': '#001858', 
                // 'white-custom': '#fffffe',
                'sky-custom': '#3da9fc',
                'gray-custom': '#094067',
                'red-custom': '#ef4565',
                'green-custom': '#44ed77',

            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
