const { mix } = require('laravel-mix')

if (process.env.NODE_ENV == 'production') {
  mix.js('resources/assets/js/app.js', 'public/dist/js')
     .sass('resources/assets/sass/app.scss', 'public/dist/css')
     .version()
} else {
  mix.js('resources/assets/js/app.js', 'public/js')
     .sass('resources/assets/sass/app.scss', 'public/css')
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

