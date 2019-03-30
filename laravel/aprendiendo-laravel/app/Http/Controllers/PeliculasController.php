<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    //
    public function index($pagina = 1)
    {
        $titulo = "Listado de mis peliculas";
        return view('pelicula.index', compact('titulo','pagina'));
        /**
         * Esta es la forma en la que la hizo el profe Victor Robles
         */
        // return view('pelicula.index', [
        //     'titulo' => $titulo,
        //     'pagina' => $pagina
        // ]);

    }

    /**
     * El $year es para el Middleware TestYear que se
     * agrego en Kernel.php
     */
    public function detalle($year = null)
    {
        return view('pelicula.detalle');
    }

    public function redirigir()
    {
        return redirect()->action('PeliculasController@detalle');
    }

}
