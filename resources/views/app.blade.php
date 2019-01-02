<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
       <div id="app">
            <main-app></main-app>
       </div>
    </body>
    <script src="{{ elixir('js/app.js') }}"></script>
</html>
