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

mix.styles([
        'resources/vendor/bootstrap-select/css/bootstrap-select.min.css',
        'resources/vendor/datatable/datatables.min.css',
        'resources/vendor/dropify/css/dropify.css',
        'resources/css/backend/variables.css',
        'resources/css/backend/fonts.css',
        'resources/css/backend/styles.css'
    ], 'public/css/backend/styles.min.css')
    .scripts([
        'resources/vendor/bootstrap-select/js/bootstrap-select.min.js',
        'resources/vendor/datatable/datatables.min.js',
        'resources/vendor/dropify/js/dropify.js',
        'resources/vendor/sweetalert/sweetalert.min.js',
        'resources/js/backend/scripts.js'
    ], 'public/js/backend/scripts.min.js')
    .scripts([
        'resources/js/backend/post/post-create-scripts.js'
    ], 'public/js/backend/post/post-create-scripts.min.js')
    .scripts([
        'resources/js/backend/post/post-edit-scripts.js'
    ], 'public/js/backend/post/post-edit-scripts.min.js')
    .scripts([
        'resources/js/backend/service/service-scripts.js'
    ], 'public/js/backend/service/service-scripts.min.js')
    .scripts([
        'resources/js/backend/work/work-scripts.js'
    ], 'public/js/backend/work/work-scripts.min.js')
    .scripts([
        'resources/js/backend/setting/setting-scripts.js'
    ], 'public/js/backend/setting/setting-scripts.min.js')
    .webpackConfig({
        /* support typescript */
        module: {
            rules: [
                {
                    test: /\.tsx?$/,
                    loader: 'ts-loader',
                    options: {appendTsSuffixTo: [/\.vue$/]},
                    exclude: /node_modules/,
                },
            ],
        },
        resolve: {
            extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
        },
    });
