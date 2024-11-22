<?php

namespace App\Http\Controllers;

use App\Cuenta;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CuentaRequest;
use App\Http\Requests\CuentaUpdateRequest;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request) {

            $sql     = trim($request->get('buscarTexto'));
            $cuentas = DB::table('cuentas')
                ->where('cuenta', 'LIKE', '%' . $sql . '%')
                ->orwhere('tipo_cuenta', 'LIKE', '%' . $sql . '%')
                ->orderBy('cuenta', 'asc')
                ->paginate(100000000);
            return view('cuenta.index', ["cuentas" => $cuentas, "buscarTexto" => $sql]);

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentaRequest $request)
    {
        //
        $cuenta                   = new Cuenta();
        $cuenta->tipo_plan_cuenta = $request->tipo_plan_cuenta;
        $cuenta->cuenta           = $request->cuenta;
        $cuenta->tipo_cuenta      = $request->tipo_cuenta;
        $cuenta->condicion        = '1';
        $cuenta->save();
        return Redirect::to("cuenta")->with('success', 'Cuenta agregada con éxito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CuentaUpdateRequest $request)
    {
        //
        $cuenta                   = Cuenta::findOrFail($request->id_cuenta);
        $cuenta->tipo_plan_cuenta = $request->tipo_plan_cuenta;
        $cuenta->cuenta           = $request->cuenta;
        $cuenta->tipo_cuenta      = $request->tipo_cuenta;
        $cuenta->condicion        = '1';
        $cuenta->save();
        return Redirect::to("cuenta")->with('success', 'Cuenta actualizada con éxito');
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
        $cuenta = Cuenta::findOrFail($request->id_cuenta);

        if ($cuenta->condicion == "1") {

            $cuenta->condicion = '0';
            $cuenta->save();
            return Redirect::to("cuenta")->with('success', 'Cuenta Desactivada con éxito');

        } else {

            $cuenta->condicion = '1';
            $cuenta->save();
            return Redirect::to("cuenta")->with('success', 'Cuenta Activada con éxito');

        }
    }
}
