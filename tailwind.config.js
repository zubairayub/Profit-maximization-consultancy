import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            colors: {
                pmc: {
                    navy: '#0f172a',           // Dark mode default (slate-900)
                    teal: '#0d9488',           // Dark mode teal (teal-600)
                    emerald: '#10b981',        // Dark mode emerald (emerald-500)
                    blue: '#2563EB',           // Light mode blue
                    green: '#10b981',          // Dark mode green (emerald-500)
                    white: '#F6F6F6',          // White for dark mode
                    // Elite light mode colors
                    'cream': '#FAFAF9',        // Premium off-white background
                    'pearl': '#F8F7F4',        // Subtle warm background
                    'slate-light': '#F1F5F9',  // Light blue-gray for cards
                    'charcoal': '#1F2937',     // Deep professional text
                    'steel': '#475569',        // Medium professional text
                    'silver': '#E2E8F0',       // Subtle borders
                    'navy-light': '#F8FAFC',   // Very light navy tint for headers
                    'navy-subtle': '#F1F5F9',  // Subtle navy for sections
                    'blue-tint': '#EFF6FF',    // Subtle blue tint
                    'green-tint': '#F0FDF4',   // Subtle green tint
                    'header-light': '#FAFBFC', // Professional light header background
                    'header-dark': '#1A1A2E',  // Professional dark header (dark gray-blue, not navy)
                },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
