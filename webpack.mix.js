const { mix } = require('laravel-mix')

if (mix.config.inProduction) {
  mix.js('resources/assets/js/app.js', 'public/dist/js')
     .sass('resources/assets/sass/app.scss', 'public/dist/css')
     .sass('resources/assets/sass/auth.scss', 'public/dist/css')
     .version()
} else {
  mix.js('resources/assets/js/app.js', 'public/js')
     .sass('resources/assets/sass/app.scss', 'public/css')
     .sass('resources/assets/sass/auth.scss', 'public/css')
}

mix.browserSync({
  proxy: 'web:8000',
  port: 8001,
  open: false,
  notify: {
    styles: {
      top: 'auto',
      bottom: '0',
    }
  }
})
.disableNotifications()

