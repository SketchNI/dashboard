module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue'],
  /*theme: {
    extend: {},
  },
  variants: {},
  plugins: [],*/
}
