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

/********************/
/* Copy Stylesheets */
/********************/

// Bootstrap
mix.copy('node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css');

// Font awesome
mix.copy('node_modules/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css');

// Gentelella
mix.copy('node_modules/gentelella/build/css/custom.min.css', 'public/css/gentelella.min.css');

// Datatables
mix.copy('node_modules/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css', 'public/css');
mix.copy('node_modules/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css', 'public/css');
mix.copy('node_modules/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css', 'public/css');

/****************/
/* Copy Scripts */
/****************/

// Gentelella
mix.copy('node_modules/gentelella/build/js/custom.min.js', 'public/js/gentelella.min.js');

// Validator
mix.copy('node_modules/gentelella/vendors/validator/validator.min.js', 'public/js');

// Datatables
mix.copy('node_modules/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js', 'public/js');
mix.copy('node_modules/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js', 'public/js');
mix.copy('node_modules/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js', 'public/js');

// Tinymce
mix.copy('node_modules/tinymce/plugins', 'public/js/tinymce/plugins', false);
mix.copy('node_modules/tinymce/skins', 'public/js/tinymce/skins', false);
mix.copy('node_modules/tinymce/themes', 'public/js/tinymce/themes', false);
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/js/tinymce');
mix.copy('resources/assets/js/tinymce/zh_TW.js', 'public/js/tinymce/langs');

/********************/
/* Compile Scripts */
/********************/
mix.js('resources/assets/js/bootstrap.js', 'public/js/bootstrap.js');

/**************/
/* Copy Fonts */
/**************/

// Bootstrap
mix.copy('node_modules/gentelella/vendors/bootstrap/fonts/', 'public/fonts');

// Font awesome
mix.copy('node_modules/gentelella/vendors/font-awesome/fonts/', 'public/fonts');