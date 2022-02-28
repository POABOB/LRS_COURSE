module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,tw,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
