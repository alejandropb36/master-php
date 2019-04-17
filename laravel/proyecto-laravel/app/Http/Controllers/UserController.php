<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Esto corrige las regla unique de validacion
use Illuminate\Validation\Rule;
// Estos dos se usan para archivos
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    //
    public function config(){
        return view('user.config');
    }

    public function update(Request $request){

        // Conseguri el usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        /**
         * Validacion de los campos del usuario--
         * Para corregir la regla de unique:users
         * se utiliza Rule::unique('users')->ignore($id),
         * Siempre y cuando agreguemos:
         *      use Illuminate\Validation\Rule;
         * 
         */
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)]           
        ]);

        // Recoger los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        // Asigar los nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email= $email;

        // Subir la imagen
        $image = $request->file('image');
        if($image){
            // Nombre unico
            $image_name = time() . $image->getClientOriginalName();

            // Guardar en la carpeta storage (storage/app/users)
            Storage::disk('users')->put($image_name, File::get($image));

            // Seteo el nombre en el objeto
            $user->image = $image_name;
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'El usuario se actualizo correctamente']);
    }
}
