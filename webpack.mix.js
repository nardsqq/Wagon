const { mix } = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .scripts([
    'public/js/jquery/jquery-3.1.1.min.js',
    'public/js/jquery-ui.min.js',
    'public/js/bootstrap/bootstrap.min.js',
    'public/DataTables/datatables.min.js',
    'public/js/bootstrap/bootstrap-toggle.min.js',
    'public/toastr-master/toastr.js',
    'public/js/script.js',
    'public/js/parsley.min.js',
    'public/js/select2.min.js'
	], 'public/js/main.js');