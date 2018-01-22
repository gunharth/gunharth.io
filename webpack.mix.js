let mix = require('laravel-mix');
var tailwindcss = require('tailwindcss');

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

mix.copyDirectory('content/music-articles/img', 'public/articles/img') // copy music articles assets
   .js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/main.scss', 'public/css')
   .options({
      processCssUrls: false,
      postCss: [ tailwindcss('tailwind.js') ],
   })
    .browserSync({
        proxy: 'http://markdown-blog.test',
    })
