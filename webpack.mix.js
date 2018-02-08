const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const glob = require("glob-all");
const PurgecssPlugin = require("purgecss-webpack-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');

const purgecssWhitelist = ['back_to_top-show'];
const purgecssWhitelistPatterns = [/hljs/];

// Custom PurgeCSS extractor for Tailwind that allows special characters in
// class names.
//
// https://github.com/FullHuman/purgecss#extractor
class TailwindExtractor {
    static extract(content) {
        return content.match(/[A-z0-9-:\/]+/g) || [];
    }
}

mix.copyDirectory('content/music-articles/img', 'public/img') // copy music articles assets
   .copyDirectory('content/music-articles/audio', 'public/audio') // copy music articles assets
   .copyDirectory('content/music-articles/pdf', 'public/pdf') // copy music articles assets
   .js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/main.scss', 'public/css')
   .options({
      processCssUrls: false,
      postCss: [ tailwindcss('tailwind.js') ],
   })
    .browserSync({
        proxy: 'http://gunharth.io.test',
        files: [
            'app/**/*.php',
            'resources/views/**/*.php',
            'public/js/**/*.js',
            'public/css/**/*.css',
            'content/**/*.md'
        ]
    })

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin(['./public/img', './public/audio', './public/pdf'])
    ]
});

if (mix.inProduction()) {
    mix.version();
    mix.webpackConfig({
        plugins: [
            new PurgecssPlugin({
                whitelist: purgecssWhitelist,
                whitelistPatterns: purgecssWhitelistPatterns,
                // Specify the locations of any files you want to scan for class names.
                paths: glob.sync([
                    path.join(__dirname, "resources/views/**/*.blade.php"),
                    path.join(__dirname, "resources/assets/js/**/*.vue")
                ]),
                extractors: [
                    {
                        extractor: TailwindExtractor,

                        // Specify the file extensions to include when scanning for
                        // class names.
                        extensions: ["html", "js", "php", "vue"]
                    }
                ]
            })
        ]
    });
}
