/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
        extend: {
            colors: {
                 'primary': '#003163',
                 'primary-dark': '#002147', // Added darker shade of primary
                 'secondary': '#b08968',
            },
            fontFamily: {
              'body': ['Inter', 'sans-serif'],
              'heading': ['Montserrat', 'sans-serif'],
            }
        },
    },
  plugins: [],
}