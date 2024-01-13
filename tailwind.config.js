/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      screens:{
        'handphone': '400px',
      }
    },
   
  },
  plugins: [
    require('flowbite/plugin')
],
}

