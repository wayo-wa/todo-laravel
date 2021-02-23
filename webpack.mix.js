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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

//ワイルドカード(*)を使ったsassのコンパイルをする
mix.webpackConfig({
   module: {
       rules: [{
           test: /\.scss/,//対象ファイルの拡張子(scss)
           enforce: "pre",//ローダーを呼び出すタイミング？(pre/post)
           loader: 'import-glob-loader'//利用するローダー
       }]
   }
})
.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css');
