<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fecha', function () {
    $titulo = "Fecha del día de hoy";
    return view('paginas.fecha', array(
        'titulo' => $titulo
    ));
});

/**
 * Esto es cuando el parametro es de manera
 * obligatoria
 */
// Route::get('/pelicula/{titulo}', function ($titulo) {
//     return view('paginas.pelicula', array(
//         'titulo' => $titulo
//     ));
// });

/**
 * Esto es cuando el parametro es de manera
 * opcional cambia con un {titulo"?"} y dando 
 * valor por defecto a la variable
 */
// Route::get('/pelicula/{titulo?}', function ($titulo = 'No pusiste pelicula') {
//     return view('paginas.pelicula', array(
//         'titulo' => $titulo
//     ));
// });

/**
 * Esto es cuando queremos agregar una
 * condicion y se utilizan expresiones
 * regulares
 */
Route::get('/pelicula/{titulo?}/{year?}', 
            function ($titulo = 'No pusiste pelicula',
                        $year = 2019) {
    return view('peliculas.pelicula', array(
        'titulo' => $titulo,
        'year' => $year
    ));
})->where(array(
    'titulo' => '[a-zA-Z]+',
    'yera' => '[0-9]+'
));

Route::get('/listado-peliculas', function () {
    $titulo = "Listado de Peliculas";
    $listado = array('Batman', 'Superman', 'Spiderman', 'Avengers');

    return view('peliculas.listado')
            ->with('titulo', $titulo)
            ->with('listado', $listado);
});

/**
 * Plantilla base o layout clase 334 Laravel
 */
Route::get('/pagina-generica', function () {
    return view('paginas.pagina');
});