/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/**/*.php'
  ],
  theme: {
    extend: {
      colors: {
        myWhite: '#f6f8f8',
        myBlack: '#131313'
      }
    },
  },
  plugins: [],
}
