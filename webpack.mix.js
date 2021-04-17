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

    /* compilamos los css de fontawesome y adminlte, los cuales se unificaran en el archivo app.css */
    .styles([
        'resources/vendor/fontawesome-free-5.15.2/css/all.min.css',
        'resources/css/adminlte.css',
    ], 'public/css/app.css')

    /* Compilamos los js que tenemos y los copmilamos en app.js */
    .js('resources/js/app.js', 'public/js')

    /* Compilamos los js de jquery y bottstrap y los compilamos en el archivo vendor.js */
    .scripts([
        'resources/vendor/jquery/jquery.js',
        'resources/vendor/bootstrap/js/bootstrap.bundle.min.js'
    ], 'public/js/vendor.js')

    /* Copiamos esta carpeta que esta en fontawesome que contiene archivos necesarios para fontawesome */
    .copy('resources/vendor/fontawesome-free-5.15.2/webfonts', 'public/webfonts')

    /* Con esto validamos las diferentes versions de los archivos compilados */
    .version()
;




    /*

        Configuración por defecto de laravel mix

    */

/* mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]); */



