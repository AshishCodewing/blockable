const prefixwrap = require('postcss-prefixwrap');

module.exports = {
  plugins: [
    'postcss-import',
    'tailwindcss',
    'autoprefixer',
    prefixwrap('.blockable', {
      ignoredSelectors: [':root'],
      blacklist: ['public.scss']
    }),
  ],
};