@extends('layouts.master')

@section('titulo' , 'Master en PHP')

<!-- Esto es para agregar contenido en especifico a la plantilla maestra -->
@section('header')
    @parent()
    <h2>Este texto no sustituye si no que agrega</h2>
@stop

@section('content')

    <h2>Contenido de la web (master)</h2>

@stop