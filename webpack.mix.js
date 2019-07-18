const mix = require('laravel-mix');

const PUBLIC_PATH = "http://127.0.0.1:8000//";
var Vue = require("vue");

require('laravel-mix-polyfill');
const APP_NAME= "fresients"
var SWPrecacheWebpackPlugin = require("sw-precache-webpack-plugin");
mix.webpackConfig({
    plugins: [
        new SWPrecacheWebpackPlugin({
            cacheId: APP_NAME+"_pwa",
            filename: "service-worker.js",
            staticFileGlobs: [
                "public**/*.{css,eot,ttf,woff,woff2,js,html,jpg,jpeg}"
            ],
            minify: true,
            stripPrefix: "public",
            handleFetch: false,
            dynamicUrlToDependencies: {
                //you should add the path to your blade files here so they can be cached
                //and have full support for offline first (example below)
                "/": ["resources/views/landing.blade.php"]
            },
            staticFileGlobsIgnorePatterns: [
                /\.map$/,
                /mix-manifest\.json$/,
                /manifest\.json$/,
                /service-worker\.js$/,
                /\/css\/material-design-icons/
            ],
            navigateFallback: PUBLIC_PATH + "",
            runtimeCaching: [
                {
                    urlPattern: /^https:\/\/fresients\.com/,
                    handler: "networkFirst"
                },
                {
                    urlPattern: /\/#home\//,
                    handler: "fastest",
                    options: {
                        cache: {
                            maxEntries: 10,
                            name: "blogs-cache"
                        }
                    }
                }
            ],
            skipWaiting: false
            // importScripts: ['./js/push_message.js']
        })
    ]
});

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
      enabled: true,
      .sass('resources/sass/app.scss', 'public/css').polyfill({
      useBuiltIns: "usage",
      targets: {"firefox": "40", "ie":11}
   });;
