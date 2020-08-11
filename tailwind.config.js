module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      colors: {
        'primary-blue-dark': '#24305E',
        'primary-blue-med': '#374785',
        'primary-blue-light': '#A8D0E6',
        'primary-red': '#F76C6C',
        'primary-gold': '#F8E9A1',
      },
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
