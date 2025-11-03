import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            // Het custom Mazda kleurenpalet
            colors: {
                'mazda-red': '#c1002a', // Mazda's "Soul Red Crystal"
                'mazda-black': '#1a1a1a',
                'mazda-gray': {
                    light: '#f2f2f2',
                    DEFAULT: '#767676',
                    dark: '#333333',
                },
            },
            // Het 'Inter' lettertype als standaard
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
