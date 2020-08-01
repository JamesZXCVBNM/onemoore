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

mix
	.js('resources/js/app.js', 'public/js')
	.js('resources/js/views/home', 'public/js')
	.js('resources/js/views/dashboard', 'public/js')
	.js('resources/js/views/portfolio', 'public/js')
	.js('resources/js/views/plans', 'public/js')
	.js('resources/js/views/account', 'public/js')
	.js('resources/js/views/shared', 'public/js')
	.sass('resources/sass/app.scss', 'public/css');
