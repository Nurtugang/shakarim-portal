/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./vendor/filament/**/*.blade.php",
    "./resources/**/*.vue",
  ],
  theme: {
        extend: {
            colors: {
                'primary': '#003163',
                'primary-dark': '#002147', // Added darker shade of primary
                'secondary': '#b08968',
                'shakarim-blue': '#314266',
                'shakarim-light': '#4f6392',
                'shakarim-dark': '#1e2a42',
                'shakarim-gray': '#f3f4f6',
            },
            fontFamily: {
              'body': ['Inter', 'sans-serif'],
              'heading': ['Montserrat', 'sans-serif'],
            }
        },
    },
    safelist: [
    'text-3xl',
    'md:text-6xl',
    'font-heading',
    'text-4xl',
  ],
  plugins: [],
}