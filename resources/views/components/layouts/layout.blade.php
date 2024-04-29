<!doctype html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio proyecto crud</title>
    <!-- shorto icon -->
    <link rel="shortcut icon" href="{{asset("/images/short-icon.svg")}}">
    <!-- añadimos el css y js -->
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body>
    <!-- insertamos el header -->
    <x-layouts.header/>

    <!-- insertamos el nav -->
    <x-layouts.nav/>

    <!-- insertamos el main -->
    <main class="h-main bg-blanco">
        {{$slot}}
    </main>

    <!-- insertamos el footer -->
    <x-layouts.footer/>
</body>
</html>
