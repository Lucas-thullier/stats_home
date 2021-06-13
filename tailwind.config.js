module.exports = {
  purge: [
    // "./ressources/**/*.blade.php",
    // "./ressources/**/*.js",
    // "./ressources/**/*.vue",
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
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
