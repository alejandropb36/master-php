<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Titulo - @yield('titulo') </title>
    </head>
    <body>
        @section('header')
            <h1> Cabecera de la web (master) </h1>
        @show
        
        <hr>

        <div class="container">
            @yield('content')
        </div>
        
        <hr>

        @section('footer')
            <h1> Pie de página de la web (master) </h1>
        @show
    </body>

</html>