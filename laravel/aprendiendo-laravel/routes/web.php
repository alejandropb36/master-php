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

Route::get('/', function ()
{
    return view('welcome');
});

/**
 * Rutas de peliculas
 */
Route::get('/peliculas/{pagina?}', 'PeliculasController@index');
/**
 * Para ponerle nombre a la ruta hay que pasar
 * un array con los parametros 'uses' y 'as'.
 * 
 * Para el Middleware se le agrego este mismo 
 * elemento y manda llamar al middleware que
 * agregamos en Kernel.php
 */
Route::get('/detalle/{year?}', [
    'middleware' => 'testyear',
    'uses' => 'PeliculasController@detalle',
    'as' => 'detalle.pelicula'
]);

Route::get('/redirigir', 'PeliculasController@redirigir');

Route::get('/formulario', 'PeliculasController@formulario');
Route::post('/recibir', 'PeliculasController@recibir');

/**
 * Esto ya crea todas las rutas estandar para un CRUD
 * lo puedes visualizar con php artisan route:list
 */
Route::resource('usuario', 'UsuarioController');


/**
 * Rutas de Frutas
 */
Route::group(['prefix' => 'frutas'], function () {
    Route::get('index', 'FrutaController@index');
    Route::get('detail/{id}', 'FrutaController@detail');
    Route::get('create', 'FrutaController@create');
    Route::post('save', 'FrutaController@save');
    Route::get('delete/{id}', 'FrutaController@delete');
    Route::get('edit/{id}', 'FrutaController@edit');
    Route::post('update', 'FrutaController@update');
});
/*
Route::get('/fecha', function () {
    $titulo = "Fecha del día de hoy";
    return view('paginas.fecha', array(
        'titulo' => $titulo
    ));
});
*/
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
// Route::get('/pelicula/{titulo?}/{year?}',
//             function ($titulo = 'No pusiste pelicula',
//                         $year = 2019) {
//     return view('peliculas.pelicula', array(
//         'titulo' => $titulo,
//         'year' => $year
//     ));
// })->where(array(
//     'titulo' => '[a-zA-Z]+',
//     'yera' => '[0-9]+'
// ));

// Route::get('/listado-peliculas', function () {
//     $titulo = "Listado de Peliculas";
//     $listado = array('Batman', 'Superman', 'Spiderman', 'Avengers');

//     return view('peliculas.listado')
//             ->with('titulo', $titulo)
//             ->with('listado', $listado);
// });

// /**
//  * Plantilla base o layout clase 334 Laravel
//  */
// Route::get('/pagina-generica', function () {
//     return view('paginas.pagina');
// });

