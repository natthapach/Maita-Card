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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/register.js', 'public/js')
    .js('resources/assets/js/report-home.js', 'public/js')
    .js('resources/assets/js/report-exchange-promotion.js', 'public/js')
    .js('resources/assets/js/report-exchange-age.js', 'public/js')
    .js('resources/assets/js/report-exchange-gender.js', 'public/js')
    .js('resources/assets/js/report-pointReceive-gender.js', "public/js")
    .js('resources/assets/js/report-pointReceive-age.js', "public/js")
    .js('resources/assets/js/report-pointReceive-time.js', "public/js")
    .sass('resources/assets/sass/report.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css');
