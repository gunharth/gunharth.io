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
   .postCss('resources/assets/css/main.css', 'public/css', [
        tailwindcss('tailwind.js'),
   ])
    .browserSync({
        // for localhost
        // port: 8000,
        // server: { baseDir: 'build_' + env },
        // proxy: null,
        // for valet
        proxy: 'http://markdown-blog.test',
        // files: [
        //     'build_' + env + '/**/*'
        // ]
    })

// If you want to use LESS for your preprocessing
// mix.less('resources/assets/less/main.less', 'public/css')
//   .options({
//     postCss: [
//       tailwindcss('./tailwind.js'),
//     ]
//   })

// If you want to use SASS for preprocessing
// mix.sass('resources/assets/sass/app.scss', 'public/css')
//    .options({
//       processCssUrls: false,
//       postCss: [ tailwindcss('tailwind.js') ],
//    });
