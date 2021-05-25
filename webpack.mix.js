const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    /* CSS */
    .sass('resources/sass/main.scss', 'public/dashmix/css/dashmix.css')
    .sass('resources/sass/dashmix/themes/xeco.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/dashmix/themes/xinspire.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/dashmix/themes/xmodern.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/dashmix/themes/xsmooth.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/dashmix/themes/xwork.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/dashmix/themes/xdream.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/dashmix/themes/xpro.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/dashmix/themes/xplay.scss', 'public/dashmix/css/themes/')
    .sass('resources/sass/mainscss/style.scss', 'public/css/main.css')
    /* JS */
    .js('resources/js/dashmix/app.js', 'public/dashmix/js/dashmix.app.js')
    .js('resources/js/app.js', 'public/js/laravel.app.js')

    /* Page JS */
    .js('resources/js/pages/tables_datatables.js', 'public/dashmix/js/pages/tables_datatables.js')

.js('resources/js/app.js', 'public/js')
    .options({
        processCssUrls: false
    })
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);
     /* Options */

if (mix.inProduction()) {
    mix.version();
}
