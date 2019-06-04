<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluminate\Support\Facades\Storage;
use Iluminate\Support\Facades\File;
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
        $image_path = $request->input('image_path');
        $description = $request->input('description');

        var_dump($image_path);
        die();

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
}
