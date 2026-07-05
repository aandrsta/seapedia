/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                navy: {
                    50: '#F5F7FA',
                    100: '#E4E8F0',
                    200: '#C7D0E1',
                    300: '#99A8CA',
                    400: '#657BAE',
                    500: '#3A506B',
                    600: '#2B3D54',
                    700: '#1C2541',
                    800: '#131A2E',
                    900: '#0B132B',
                },
                teal: {
                    50: '#F0F8FF',
                    100: '#E0F0FE',
                    200: '#B9E0FC',
                    300: '#7CC2FA',
                    400: '#369EF7',
                    500: '#0077B6',
                    600: '#0096C7',
                    700: '#007798',
                    800: '#03045E',
                    900: '#020035',
                },
                coral: {
                    50: '#FFF0F3',
                    100: '#FFCCD5',
                    200: '#FFA4B4',
                    300: '#FF708D',
                    400: '#FF3C64',
                    500: '#D90429',
                    600: '#EF233C',
                    700: '#B80020',
                    800: '#8A0015',
                    900: '#5C000B',
                },
                sand: {
                    50: '#F8FAFC',
                    100: '#F1F5F9',
                    200: '#E2E8F0',
                    300: '#CBD5E1',
                    400: '#94A3B8',
                    500: '#64748B',
                    600: '#475569',
                    700: '#334155',
                    800: '#1E293B',
                    900: '#0F172A',
                },
            },
            fontFamily: {
                sans: ['"Inter"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                heading: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            boxShadow: {
                'warm': '0 1px 3px 0 rgba(27, 42, 74, 0.06), 0 1px 2px -1px rgba(27, 42, 74, 0.06)',
                'warm-md': '0 4px 6px -1px rgba(27, 42, 74, 0.07), 0 2px 4px -2px rgba(27, 42, 74, 0.05)',
                'warm-lg': '0 10px 15px -3px rgba(27, 42, 74, 0.07), 0 4px 6px -4px rgba(27, 42, 74, 0.05)',
                'warm-xl': '0 20px 25px -5px rgba(27, 42, 74, 0.08), 0 8px 10px -6px rgba(27, 42, 74, 0.04)',
            },
            borderRadius: {
                'sea': '10px',
            },
            animation: {
                'wave': 'wave 3s ease-in-out infinite',
                'fade-in': 'fadeIn 0.3s ease-out',
                'slide-up': 'slideUp 0.3s ease-out',
                'slide-down': 'slideDown 0.2s ease-out',
                'pulse-slow': 'pulseSlow 2s ease-in-out infinite',
                'progress': 'progressFill 5s linear forwards',
                'shimmer': 'shimmer 2s infinite',
            },
            keyframes: {
                wave: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-5px)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(10px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideDown: {
                    '0%': { opacity: '0', transform: 'translateY(-10px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                pulseSlow: {
                    '0%, 100%': { opacity: '1', transform: 'scale(1)' },
                    '50%': { opacity: '0.7', transform: 'scale(1.05)' },
                },
                progressFill: {
                    '0%': { width: '0%' },
                    '100%': { width: '100%' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '-200% 0' },
                    '100%': { backgroundPosition: '200% 0' },
                },
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
