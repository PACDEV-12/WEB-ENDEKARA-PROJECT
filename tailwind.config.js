/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',  // Menyertakan file Blade Laravel
    './resources/js/**/*.js',            // Menyertakan file JS
    './resources/css/**/*.css',          // Menyertakan file CSS
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
