/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    'templates/**/*.html.twig',
    'assets/scripts/*.js',
    './node_modules/tw-elements/dist/js/**/*.js',
    './node_modules/flowbite/**/*.js',
    './src/Form/*.php',
  ],
  theme: {
      extend: {},
  },
  plugins: [
      require('tw-elements/dist/plugin'),
      require('flowbite/plugin')
  ],
  }