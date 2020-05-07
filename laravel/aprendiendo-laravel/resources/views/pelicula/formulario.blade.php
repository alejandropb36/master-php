<h1>Formulario en Laravel</h1>

<form action=" {{action('PeliculasController@recibir')}} " method="POST">
    {{--
     - Esto es para proteger contra ataques
     - csrf si no lo ponemos no funciona
    --}}
    {{ csrf_field() }}

    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre">
    <br>

    <label for="email">Correo: </label>
    <input type="email" name="email">
    <br>

    <input type="submit" value="enviar">
</form>