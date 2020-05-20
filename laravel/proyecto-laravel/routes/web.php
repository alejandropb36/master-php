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
//use App\Image;


Route::get('/', function () {

    /*
    $images = Image::all();
    foreach($images as $image){
        echo $image->image_path . "<br/>";
        echo $image->description . "<br/>";
        echo $image->user->name . " " . $image->user->surname . "<br/>";
        echo '<strong>LIKES: ' . count($image->likes) . '</strong>';
        if(count($image->comments) >= 1)
        {
            echo "<h4> Comentarios </h4>";
            foreach($image->comments as $comment){
                echo $comment->user->name . " " . $comment->user->surname . ": ";
                echo $comment->content . "<br>";
            }  
        }
        echo "<hr/>";
    }
    die();
    */
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
/**
 * Rutas de Usuarios
 */
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/user/{id}', 'UserController@profile')->name('user.profile');

/**
 * Rutas de Imagenes
 */
Route::get('/upload-image', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@save')->name('image.save');
Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/image/detail/{id}', 'ImageController@detail')->name('image.detail');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::get('/image/edit/{id}', 'ImageController@edit')->name('image.edit');
Route::put('/image/update', 'ImageController@update')->name('image.update');

// Rutas de Comentarios
Route::post('/comment', 'CommentController@store')->name('comment.store');
Route::get('/comment/{id}', 'CommentController@delete')->name('comment.delete');

// Rutas de Likes
Route::get('/like/{imageId}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{imageId}', 'LikeController@disLike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('like.index');