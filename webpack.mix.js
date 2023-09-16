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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);


/*
 |-------------------------------------------------------------------------------------------
 | /** ArchitectUi
 |-------------------------------------------------------------------------------------------
 */
mix.js('resources/js/web/app.js', 'public/js/web')
    .sass('resources/sass/web/app.scss', 'public/css/web')
    .sourceMaps();

/** Assets */
mix.copyDirectory('resources/assets/images', 'public/images/architectui')

/*|------------------------------------------ END's ------------------------------------------ */



/*
 |-------------------------------------------------------------------------------------------
 | /** Sleek Dashboard
 |-------------------------------------------------------------------------------------------
 */
mix.js('resources/js/admin/app.js', 'public/js/admin')
    .sass('resources/sass/admin/app.scss', 'public/css/admin')
    .sourceMaps();

/** Assets */
mix.copyDirectory('resources/assets/templates/sleek/dist/assets/data', 'public/data');
mix.copyDirectory('resources/assets/sounds', 'public/sounds');
mix.copy('vendor/proengsoft/laravel-jsvalidation/resources/views', 'resources/views/vendor/jsvalidation')
   .copy('vendor/proengsoft/laravel-jsvalidation/public', 'public/vendor/jsvalidation');
/*|------------------------------------------ END's ------------------------------------------ */
