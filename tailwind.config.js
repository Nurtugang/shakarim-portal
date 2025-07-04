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
                 'secondary': '#b08968',
            },
            fontFamily : {
              inter: ['Inter Bold'],
              sf: ['SF-Pro-Display-Regular'],
            },
        },
    },
  plugins: [],
}

