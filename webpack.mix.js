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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.webpackConfig(webpack => {
    return {
        resolve :{
            alias:{
                videojs:'video.js',
                WaveSurfer:'wavesurfer.js',
                RECORDRTC:'recordrtc',
            }
        },
        plugins: [
            new webpack.ProvidePlugin({
                videojs: 'video.js/dist/video.cjs.js',
                RECORDRTC: 'recordrtc',
            })
        ]
    }
})
