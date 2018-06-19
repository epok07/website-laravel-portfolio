//---------------------------------
// Includes & definitions
//---------------------------------
let mix = require('laravel-mix');
const webpack = require('webpack');

//---------------------------------
// Versioning Fix
//---------------------------------
if (mix.config.inProduction) {
  mix.version();
}

//---------------------------------
// Plugin Fix
//---------------------------------
// Else plugins cannot inject themselves into jQuery
mix.webpackConfig({
  plugins: [
    new webpack.ProvidePlugin({
      '$': 'jquery',
      'jQuery': 'jquery',
      'window.jQuery': 'jquery',
      'bootstrap': 'bootstrap'
    })
  ]
});

//---------------------------------
// Compilinmg assets
// ---------------------------------

// Global
mix.js('resources/assets/js/global/*', 'public/js/global/global.js')
	.copy('resources/assets/sass/global/*', 'public/css/global')
	.copy('resources/assets/media/*', 'public/media');

// CV
mix.copy('resources/assets/js/cv/*', 'public/js/cv')
	.copy('resources/assets/sass/cv/*', 'public/css/cv');
