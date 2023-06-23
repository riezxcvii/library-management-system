/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./client/*.{html,js,php}",
  "./node_modules/flowbite/*.php",
  './pages/**/*.{html,js,php}',
  './components/**/*.{html,js,php}',
],
  theme: {
    extend: {},
  },
  plugins: [require('flowbite/plugin')
],
}
