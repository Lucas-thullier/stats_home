module.exports = {
  purge: [
    "./ressources/views/*.blade.php",
    "./ressources/js/*.js",
    "./ressources/vuejs/**/*.vue",
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    minHeight: {
      0: "0",
      1: "25vh",
      1: "50vh",
      3: "7vh",
      full: "100vh",
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require("postcss-import"),
    require("tailwindcss"),
    require("postcss-nesting"),
    require("autoprefixer"),
  ],
}
