@include('includes.header')

<!-- Imprimiendo por pantalla -->
<h1>{{$titulo}}</h1>
<h2>{{$listado[1]}}</h2>
<p>{{ date('Y') }}</p>


<!-- Comentarios -->
<!-- Esto es un comentario de HTML -->
<?php
    /**Esto es un comentario de php */
    // o este
?>

{{-- Esto es un comentario en Larave blade --}}

<!-- Mostrar si existe  -->
<?= isset($director) ? $director : 'No hay director'; ?>
{{ $director ?? 'No hay director con Blade de Laravel'}}

<!-- Condicionales -->
@if($titulo && count($listado) >= 5)
    <h1>El titulo existe y es este: {{$titulo}} y el listado es mayor a 5</h1>
@elseif($titulo)
    <h2>Titulo existe y el listado no es mayor a 5</h2>
@else
    <h1>El titulo no existe </h1>
@endif


<!-- Bucles // Loops -->
@for($i = 0; $i <= 20; $i++)
    El numero es: {{$i}} <br/>
@endfor

<hr>

<?php $i = 0;?>
@while($i <= 50)
    @if($i % 2 == 0)
        Numero par: {{$i}} <br/>
    @endif
    <?php $i++; ?>
@endwhile

<hr>

@foreach ($listado as  $pelicula)
    <p> {{$pelicula}} </p>
@endforeach

@include('includes.footer')