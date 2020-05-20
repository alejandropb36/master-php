<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;

class ImageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){
        //Vaslidation

        $validate = $this->validate($request, [
            'description' => 'required',
            //'image_path' => 'required|mimes:jpg, jpeg, png, gif',
            'image_path' => 'required|image'
        ]);

        // Recoger datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // var_dump($image_path);
        // die();

        //Asigna los valores a nuevo objeto
        $user = \Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $description;

        // Subir fichero
        if($image_path){
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('home')->with([
            'message' => 'La imagen se subio correctamente'
        ]);
    }

    public function getImage($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id) {
        $image = Image::find($id);

        return view('image.detail', [
            'image' => $image
        ]);
    }

    public function delete($id) {
        $user = \Auth::user();
        $image = Image::find($id);
        $comments = $image->comments;
        $likes = $image->likes;

        if($user && $image && $image->user->id == $user->id) {
            if($comments && count($comments) > 0) {
                foreach($comments as $comment) {
                    $comment->delete();
                }
            }

            if($likes && count($likes) > 0) {
                foreach($likes as $like) {
                    $like->delete();
                }
            }

            Storage::disk('images')->delete($image->image_path);

            $image->delete();

            $message = 'La imagen se ha borrado correctamente';
        } else {
            $message = 'Error al eliminar la imagen';
        }

        return redirect()->route('home')->with(['message' => $message]);

    }

    public function edit($id) {
        $user = \Auth::user();
        $image = Image::find($id);

        if($user && $image && $image->user_id == $user->id) {
            return view('image.edit', ['image' => $image]);
        }

        return redirect()->route('home');
    }

    public function update(Request $request) {

        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'image'
        ]);

        $image_id = $request->input('image_id');
        $image_path = $request->file('image_path');
        $description= $request->input('description');
        
        $image = Image::find($image_id);
        $image->description = $description;

        // Subir fichero
        if($image_path){
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->update();

        return redirect()->route('image.detail', ['id' => $image_id])->with(['message' =>'La foto se ha actualizado correctamente']);
    }
}
