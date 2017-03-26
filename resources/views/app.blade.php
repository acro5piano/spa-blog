<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='https://cdnjs.cloudflare.com/ajax/libs/element-ui/1.2.5/theme-default/fonts/element-icons.ttf' rel='stylesheet' type='text/css'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/element-ui/1.2.5/theme-default/fonts/element-icons.woff' rel='stylesheet' type='text/css'>

        <title>Codecheer</title>

        <!-- Heroku 環境では yarn run できないので -->
        @if (env('APP_ENV') === 'production')
            <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
        @else
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @endif

        <script>
            window.Laravel = {};
            window.Laravel.csrfToken = "{{ csrf_token() }}";
        </script>
    </head>
    <body>
        <div id="app">
        </div>
    </body>

    <!-- Heroku 環境では yarn run できないので -->
    @if (env('APP_ENV') === 'production')
        <script src="{{ mix('dist/js/app.js') }}"></script>
    @else
        <script src="{{ mix('js/app.js') }}"></script>
    @endif
</html>
