<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Hash;

class UserController extends Controller
{
    //
    public function index()
    {

        $usuarios = DB::table('users')
            ->join('roles', 'users.idrol', '=', 'roles.id')
            ->select('users.id', 'users.nombre', 'users.tipo_documento',
                'users.num_documento', 'users.expedito', 'users.direccion', 'users.telefono',
                'users.email', 'users.usuario', 'users.password',
                'users.condicion', 'users.idrol', 'users.imagen', 'roles.nombre as rol')
            ->orderBy('users.id', 'desc')
            ->paginate(1000000);

        $roles = DB::table('roles')
            ->select('id', 'nombre', 'descripcion')
            ->where('condicion', '=', '1')
            ->orderBy('roles.id', 'desc')
            ->get();

        $cont = 0;

        return view('user.index', ["usuarios" => $usuarios, "roles" => $roles, "cont" => $cont]);

    }

    public function store(UserRequest $request)
    {

        $user                 = new User();
        $user->nombre         = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento  = $request->num_documento;
        $user->expedito       = $request->expedito;
        $user->telefono       = $request->telefono;
        $user->email          = $request->email;
        $user->direccion      = $request->direccion;
        $user->usuario        = $request->usuario;
        $user->password       = bcrypt($request->password);
        $user->condicion      = '1';
        $user->idrol          = $request->id_rol;

        if ($request->hasFile('imagen')) {

            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            $extension = $request->file('imagen')->guessClientExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('imagen')->storeAs('imagenes/usuario', $fileNameToStore);

        } else {

            $fileNameToStore = "perfil.png";
        }

        $user->imagen = $fileNameToStore;

        $user->save();
        return Redirect::to("user")->with('success', 'Usuario Registrado con éxito');
    }

    public function show($id)
    {

        $users = DB::table('users')
            ->join('roles', 'users.idrol', '=', 'roles.id')
            ->select('users.id', 'users.nombre', 'users.tipo_documento',
                'users.num_documento', 'users.expedito', 'users.direccion', 'users.telefono',
                'users.email', 'users.usuario', 'users.password',
                'users.condicion', 'users.idrol', 'users.imagen', 'roles.nombre as rol', 'roles.descripcion')
            ->where('users.id', '=', $id)
            ->get();

        $roles = DB::table('roles')
            ->select('id', 'nombre', 'descripcion')
            ->where('condicion', '=', '1')->get();

        return view('user.show', ['users' => $users, 'roles' => $roles]);

    }

    public function update(UserUpdateRequest $request)
    {

        $user                 = User::findOrFail($request->id_usuario);
        $user->nombre         = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento  = $request->num_documento;
        $user->expedito       = $request->expedito;
        $user->telefono       = $request->telefono;
        $user->email          = $request->email;
        $user->direccion      = $request->direccion;
        $user->usuario        = $request->usuario;
        $user->password       = bcrypt($request->password);
        $user->condicion      = '1';
        $user->idrol          = $request->id_rol;


        if ($request->hasFile('imagen')) {


            if ($user->imagen != 'userperfil.png') {
                Storage::delete('imagenes/usuario/' . $user->imagen);
            }

            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            $extension = $request->file('imagen')->guessClientExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('imagen')->storeAs('imagenes/usuario', $fileNameToStore);

        } else {

            $fileNameToStore = $user->imagen;
        }

        $user->imagen = $fileNameToStore;


        $user->save();
        return Redirect::to("user")->with('success', 'Usuario actualizado con éxito');
    }

    public function destroy(Request $request)
    {
        
        $user = User::findOrFail($request->id_usuario);

        if ($user->condicion == "1") {

            $user->condicion = '0';
            $user->save();
            return Redirect::to("user")->with('success', 'Usuario inhabilitado con éxito');

        } else {

            $user->condicion = '1';
            $user->save();
            return Redirect::to("user")->with('success', 'Usuario habilitado con éxito');

        }
    }

    
}
