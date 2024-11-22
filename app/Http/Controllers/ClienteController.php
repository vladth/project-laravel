<?php

namespace App\Http\Controllers;

use App\Cliente;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;

class ClienteController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes = DB::table('clientes')
            ->orderBy('id', 'desc')
            ->paginate(100000000000);
        $cont = 0;
        return view('cliente.index', ["clientes" => $clientes, "cont" => $cont]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        //
        $cliente                 = new Cliente();
        $cliente->nombre         = $request->nombre;
        $cliente->tipo_documento = $request->tipo_documento;
        $cliente->num_documento  = $request->num_documento;
        $cliente->expedito       = $request->expedito;
        $cliente->telefono       = $request->telefono;
        $cliente->email          = $request->email;
        $cliente->direccion      = $request->direccion;
        $cliente->save();
        return Redirect::to("cliente")->with('success', 'Cliente agregado con éxito');
    }

    public function show($id)
    {

        $clientes = DB::table('clientes')
            ->where('clientes.id', '=', $id)
            ->get();
        return view('cliente.show', ['clientes' => $clientes]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteUpdateRequest $request)
    {
        //
        $cliente                 = Cliente::findOrFail($request->id_cliente);
        $cliente->nombre         = $request->nombre;
        $cliente->tipo_documento = $request->tipo_documento;
        $cliente->num_documento  = $request->num_documento;
        $cliente->expedito       = $request->expedito;
        $cliente->telefono       = $request->telefono;
        $cliente->email          = $request->email;
        $cliente->direccion      = $request->direccion;
        $cliente->save();
        return Redirect::to("cliente")->with('success', 'Cliente actualizado con éxito');
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
        $cliente = Cliente::findOrFail($request->id_cliente);

        if ($cliente->condicion == "1") {

            $cliente->condicion = '0';
            $cliente->save();
            return Redirect::to("cliente")->with('success', 'Cliente inhabilitado con éxito');

        } else {

            $cliente->condicion = '1';
            $cliente->save();
            return Redirect::to("cliente")->with('success', 'Cliente habilitado con éxito');

        }
    }

}
