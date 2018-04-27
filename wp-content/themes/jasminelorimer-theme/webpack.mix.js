const { mix } = require('laravel-mix');

mix.js('./resources/js/app.js', './js')
   .sass('./resources/sass/style.scss', './css');
