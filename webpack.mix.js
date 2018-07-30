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
mix
    .js([
        'resources/assets/js/jquery/jquery.js',
        'resources/assets/js/popper.js',
        'resources/assets/js/bootstrap/bootstrap.min.js',
        'resources/assets/js/app.js',
        'resources/assets/js/state.js',
        'resources/assets/js/task.js'
    ], 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css');


mix.copyDirectory('node_modules/bootstrap/dist/js', 'resources/assets/js/bootstrap')
    .copyDirectory('node_modules/jquery/dist/', 'resources/assets/js/jquery')
    .copyDirectory('node_modules/muuri/dist/', 'resources/assets/js/muuri');


mix.copyDirectory('node_modules/bootstrap/dist/css', 'resources/assets/css/bootstrap');

mix.copy('node_modules/popper.js/dist/popper.js', 'resources/assets/js/popper.js/');


// mix.js('resources/assets/js/jquery/jquery.js', 'public/js')
//     .js('resources/assets/js/bootstrap/bootstrap.js', 'public/js')
//     .js('resources/assets/js/muuri/muuri.js', 'public/js');


// mix.copyDirectory('assets/img', 'public/img');