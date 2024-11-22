<?php

namespace App\Http\Controllers;

use App\Rol;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RolController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $roles = DB::table('roles')
            ->orderBy('id', 'desc')
            ->paginate(100000000);
        $cont = 0;
        return view('rol.index', ["roles" => $roles, "cont" => $cont]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $rol = Rol::findOrFail($request->id_rol);

        if ($rol->condicion == "1") {

            $rol->condicion = '0';
            $rol->save();
            return Redirect::to("rol")->with('success', 'El rol fue desactivado con éxito');

        } else {

            $rol->condicion = '1';
            $rol->save();
            return Redirect::to("rol")->with('success', 'El rol fue activado con éxito');

        }
    }

}
