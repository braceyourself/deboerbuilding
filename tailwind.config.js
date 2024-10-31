

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        "./node_modules/flowbite/**/*.js",
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/views/livewire/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/**/*.vue',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                custom:{
                    DEFAULT: '#d49d48',
                    50: '#fffaf0',
                    100: '#fef5e7',
                    200: '#fecb89',
                    300: '#f9a825',
                    400: '#f59e0b',
                    500: '#d49d48',
                    600: '#b07d2b',
                    700: '#7e5e2e',
                    800: '#5a4b29',
                    900: '#3c3423',
                },
                primary: {
                    DEFAULT: '#C8A457',
                    // DEFAULT: '#d49d48',
                    50: '#fffaf0',
                    100: '#fef5e7',
                    200: '#fecb89',
                    300: '#f9a825',
                    400: '#f59e0b',
                    500: '#C8A457',
                    600: '#b07d2b',
                    700: '#7e5e2e',
                    800: '#5a4b29',
                    900: '#3c3423',
                },
                secondary: {
                    DEFAULT: '#6b7280',
                    50: '#f9fafb',
                    100: '#f4f5f7',
                    200: '#e5e7eb',
                    300: '#d2d6dc',
                    400: '#9fa6b2',
                    500: '#6b7280',
                    600: '#4b5563',
                    700: '#374151',
                    800: '#1f2937',
                    900: '#111827',
                },
                gray:{
                    DEFAULT: '#6b7280',
                    50: '#f9fafb',
                    100: '#f4f5f7',
                    200: '#e5e7eb',
                    300: '#d2d6dc',
                    400: '#9fa6b2',
                    500: '#6b7280',
                    600: '#4b5563',
                    700: '#374151',
                    800: '#1f2937',
                    900: '#111827',
                },
                success: {
                    DEFAULT: '#10b981',
                    50: '#f0fdf4',
                    100: '#dcfce7',
                    200: '#bbf7d0',
                    300: '#86efac',
                    400: '#4ade80',
                    500: '#22c55e',
                    600: '#16a34a',
                    700: '#15803d',
                    800: '#166534',
                    900: '#14532d',
                },
                danger: {
                    DEFAULT: '#ef4444',
                    50: '#fef2f2',
                    100: '#fee2e2',
                    200: '#fecaca',
                    300: '#fca5a5',
                    400: '#f87171',
                    500: '#ef4444',
                    600: '#dc2626',
                    700: '#b91c1c',
                    800: '#991b1b',
                    900: '#7f1d1d',
                },

            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

