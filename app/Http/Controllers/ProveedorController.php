<?php

namespace App\Http\Controllers;

use App\Proveedor;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedorRequest;
use App\Http\Requests\ProveedorUpdateRequest;

class ProveedorController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $proveedores = DB::table('proveedores')
            ->orderBy('id', 'desc')
            ->paginate(100000000000);
        $cont = 0;
        return view('proveedor.index', ["proveedores" => $proveedores, "cont" => $cont]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        //
        $proveedor                 = new Proveedor();
        $proveedor->nombre         = $request->nombre;
        $proveedor->tipo_documento = $request->tipo_documento;
        $proveedor->num_documento  = $request->num_documento;
        $proveedor->expedito       = $request->expedito;
        $proveedor->telefono       = $request->telefono;
        $proveedor->email          = $request->email;
        $proveedor->direccion      = $request->direccion;
        $proveedor->save();
        return Redirect::to("proveedor")->with('success', 'Proveedor Registrado con éxito');
    }

    public function show($id)
    {

        $proveedor = DB::table('proveedores')
            ->where('proveedores.id', '=', $id)
            ->get();
        return view('proveedor.show', ['proveedor' => $proveedor]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorUpdateRequest $request)
    {
        //
        $proveedor                 = Proveedor::findOrFail($request->id_proveedor);
        $proveedor->nombre         = $request->nombre;
        $proveedor->tipo_documento = $request->tipo_documento;
        $proveedor->num_documento  = $request->num_documento;
        $proveedor->expedito       = $request->expedito;
        $proveedor->telefono       = $request->telefono;
        $proveedor->email          = $request->email;
        $proveedor->direccion      = $request->direccion;
        $proveedor->save();
        return Redirect::to("proveedor")->with('success', 'Proveedor actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $proveedor = Proveedor::findOrFail($request->id_proveedor);

        if ($proveedor->condicion == "1") {

            $proveedor->condicion = '0';
            $proveedor->save();
            return Redirect::to("proveedor")->with('success', 'Proveedor inhabilitado con éxito');

        } else {

            $proveedor->condicion = '1';
            $proveedor->save();
            return Redirect::to("proveedor")->with('success', 'Proveedor habilitado con éxito');

        }
    }

}
