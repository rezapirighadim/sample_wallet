const mix = require('laravel-mix');

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

mix.combine([
    'resources/js/app.js',
    'resources/js/jquery.min.js',
    'resources/js/popper.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/mdb.min.js',
], 'public/app.js');


mix.styles([
    'resources/css/app.css',
    'resources/css/bootstrap.min.css',
    'resources/css/mdb.min.css'
], 'public/app.css');
