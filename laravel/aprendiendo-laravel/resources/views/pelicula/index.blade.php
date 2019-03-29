<!-- Esto es para trabajar de manera basica con un controlador -->

<h1>{{$titulo}}</h1>
<p>Accion index del controlador PeliculasController</p>

@if (isset($pagina))
    <h3> La pagina es {{$pagina}} </h3>
@endif

<a href=" {{action ('PeliculasController@detalle')}} ">Ir al detalle</a>