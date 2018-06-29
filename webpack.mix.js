let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js/app.js')
    .js('resources/assets/js/glide.js','public/js/glide.js')
   .sass('resources/assets/sass/app.scss', 'public/css/app.css')
    .sass('resources/assets/sass/glide-core.scss','public/css/glide-core.css')
    .sass('resources/assets/sass/glide-theme.scss','public/css/glide-theme.css');