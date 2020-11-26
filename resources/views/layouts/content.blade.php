
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">

        <title>Content</title>
    </head>
    <body>
        @include('partials.nav-header-main')
        <div class="container">
            @include('partials.session-flash-status')
        @yield('contenido')
        </div>
        <script src="{{ asset("js/app.js") }}"></script>
    </body>

</html>
