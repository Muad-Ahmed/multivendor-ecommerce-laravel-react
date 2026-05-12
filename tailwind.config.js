import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ink: '#0f172a',
                aurora: '#06b6d4',
                volt: '#a3e635',
                coral: '#fb7185',
                violet: '#7c3aed',
            },
            boxShadow: {
                fintech: '0 24px 80px rgba(15, 23, 42, 0.16)',
                glow: '0 0 0 1px rgba(255,255,255,0.12), 0 20px 70px rgba(6,182,212,0.22)',
            },
        },
    },

    plugins: [forms],
};
