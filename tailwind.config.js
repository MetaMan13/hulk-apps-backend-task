const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'hulk-green': {
                    DEFAULT: '#00A9A2',
                    '50': '#8FFFFA',
                    '100': '#76FFF9',
                    '200': '#43FFF7',
                    '300': '#10FFF5',
                    '400': '#00DCD3',
                    '500': '#00A9A2',
                    '600': '#007671',
                    '700': '#004340',
                    '800': '#00100F',
                    '900': '#000000'
                },
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
