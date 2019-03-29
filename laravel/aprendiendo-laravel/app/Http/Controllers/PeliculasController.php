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

    public function detalle()
    {
        return view('pelicula.detalle');
    }

}
