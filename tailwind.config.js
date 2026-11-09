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
        brand: {
          pink: '#E8B4BC',
          pinkhover: '#D89FA7',
          dark: '#171717',
          card: '#222222',
        }
      }
    },
  },
  plugins: [],
}