<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Hash;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;

class UsuarioController extends Controller
{
    //
    public function index()
    {

        return view('usuario.index');

    }

    public function update(UsuarioRequest $request){

        $user = User::findOrFail(\Auth::user()->id);        

        if ($request->hasFile('imagen')) {

            if ($user->imagen != 'userperfil.png') {
                Storage::delete('imagenes/usuario/' . $user->imagen);
            }

            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            $extension = $request->file('imagen')->guessClientExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('imagen')->storeAS('imagenes/usuario', $fileNameToStore);

        } else {

            $fileNameToStore = $user->imagen;
        }

        $user->imagen = $fileNameToStore;

        $user->save();
        return Redirect::to("usuario")->with('success', 'Foto de perfil actualizado con éxito');   
    }  

    public function show(){
        return View('usuario.password');
    }

    public function updatepassword(UsuarioUpdateRequest $request){

            if (Hash::check($request->mypassword,\Auth::user()->password)){
                $user = new User;
                $user->where('usuario', '=',\Auth::user()->usuario)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('usuario')->with('success', 'Su contraseña fue cambiado con éxito, inicie sesión');
            }
            else
            {
                return redirect('usuario/password')->with('confirError', 'Sus credenciales no coinciden con nuestros registros');
            }
        
    } 
}
