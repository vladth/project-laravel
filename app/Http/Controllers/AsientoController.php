<?php

namespace App\Http\Controllers;

use App\Asiento;
use App\CuentaAsiento;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Luecano\NumeroALetras\NumeroALetras;
use App\Http\Requests\LibroRequest;

class AsientoController extends Controller
{

    public function index()
    {

        $asientos = Asiento::join('users', 'asientos.idusuario', '=', 'users.id')
            ->join('cuenta_asientos', 'asientos.id', '=', 'cuenta_asientos.id')
            ->select('asientos.id', 'asientos.nro', 'asientos.created_at', 'asientos.banco',
                'asientos.cheque', 'asientos.glosa', 'asientos.razon_social', 'asientos.concepto',
                'asientos.TDebe', 'asientos.THaber', 'asientos.estado', 'users.nombre')

            ->orderBy('asientos.id', 'desc')
            ->groupBy('asientos.id', 'asientos.nro', 'asientos.created_at', 'asientos.banco',
                'asientos.cheque', 'asientos.glosa', 'asientos.razon_social', 'asientos.concepto',
                'asientos.TDebe', 'asientos.THaber', 'asientos.estado', 'users.nombre')
            ->paginate(100000000);

        $cont = 0;

        return view('asiento.index', ["asientos" => $asientos, "cont" => $cont]);

    }

    public function create()
    {

        $cuentas = DB::table('cuentas as cuent')
            ->select(DB::raw('CONCAT(cuent.cuenta," - ",cuent.tipo_cuenta) AS cuenta_tipo'), 'cuent.id')
            ->where('cuent.condicion', '=', '1')
            ->orderBy('cuent.cuenta')
            ->get();

        $contar = DB::table('asientos')
            ->select(DB::raw('count(*)+1 as numero'))
            ->get();
        $cont = 0;
        return view('asiento.create', ["cuentas" => $cuentas, "contar" => $contar, 'cont' => $cont]);

    }

    public function store(LibroRequest $request)
    {

        $contar = DB::table('asientos')
            ->select(DB::raw('count(*)+1 as numero'))
            ->get();
        foreach ($contar as $numero) {
            $numero = $numero->numero;
        }

        try {

            DB::beginTransaction();

            $mytime = Carbon::now('America/La_Paz');

            $asiento                  = new Asiento();
            $asiento->idusuario       = \Auth::user()->id;
            $asiento->nro             = $numero;
            $asiento->fecha           = $mytime->toDateString();
            $asiento->forma_pago      = $request->forma_pago;
            $asiento->banco           = $request->banco;
            $asiento->cheque          = $request->cheque;
            $asiento->tipo_cambio     = $request->tipo_cambio;
            $asiento->cantidad_moneda = $request->cantidad_moneda;
            $asiento->razon_social    = $request->razon_social;
            $asiento->glosa           = $request->glosa;
            $asiento->concepto        = $request->concepto;
            $asiento->TDebe  = $request->total_debe;
            $asiento->THaber = $request->total_haber;
            $asiento->estado = 'Registrado';
            $asiento->save();

            $id_cuenta = $request->id_cuenta;
            $debe      = $request->debe;
            $haber     = $request->haber;

            $cont = 0;

            while ($cont < count($id_cuenta)) {

                $detalle = new CuentaAsiento();

                $detalle->idasiento = $asiento->id;
                $detalle->idcuenta  = $id_cuenta[$cont];
                $detalle->debe      = $debe[$cont];
                $detalle->haber     = $haber[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
        }

        return Redirect::to('asiento')->with('success', 'Libro Diario fue agregada con éxito');

    }

    public function show($id)
    {

        $asientos = Asiento::join('cuenta_asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
            ->select('asientos.id', 'asientos.nro', 'asientos.created_at', 'asientos.forma_pago', 'asientos.banco',
                'asientos.cheque', 'tipo_cambio', 'cantidad_moneda', 'asientos.glosa', 'asientos.razon_social', 'asientos.concepto',
                'asientos.TDebe', 'asientos.THaber', 'asientos.estado', DB::raw('sum(cuenta_asientos.debe) as totalD'), DB::raw('sum(cuenta_asientos.haber) as totalH'))
            ->where('asientos.id', '=', $id)
            ->orderBy('asientos.id', 'desc')
            ->groupBy('asientos.id', 'asientos.nro', 'asientos.created_at', 'asientos.forma_pago', 'asientos.banco',
                'asientos.cheque', 'tipo_cambio', 'cantidad_moneda', 'asientos.glosa', 'asientos.razon_social', 'asientos.concepto',
                'asientos.TDebe', 'asientos.THaber', 'asientos.estado')
            ->first();

        $detalles = CuentaAsiento::join('cuentas', 'cuenta_asientos.idcuenta', '=', 'cuentas.id')
            ->select('cuenta_asientos.debe', 'cuenta_asientos.haber', 'cuentas.tipo_cuenta as cuenta_tipo', 'cuentas.cuenta as cuenta01')
            ->where('cuenta_asientos.idasiento', '=', $id)
            ->orderBy('cuenta_asientos.id', 'asc')->get();

        return view('asiento.show', ['asientos' => $asientos, 'detalles' => $detalles]);
    }

    public function destroy(Request $request)
    {

        $asientos         = Asiento::findOrFail($request->id_asiento);
        $asientos->estado = 'Anulado';
        $asientos->save();
        return Redirect::to('asiento')->with('success', 'Libro Diario fue Anulado con éxito');

    }

    public function pdf(Request $request, $id)
    {

        $asientos = Asiento::join('users', 'asientos.idusuario', '=', 'users.id')
            ->join('cuenta_asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
            ->select('asientos.id', 'asientos.nro', 'asientos.created_at', 'asientos.forma_pago', 'asientos.banco',
                'asientos.cheque', 'tipo_cambio', 'cantidad_moneda', 'asientos.glosa', 'asientos.razon_social', 'asientos.concepto', 'asientos.TDebe', 'asientos.THaber', 'asientos.estado', DB::raw('sum(cuenta_asientos.debe) as totalD'), DB::raw('sum(cuenta_asientos.haber) as totalH'), 'asientos.created_at', 'users.nombre')
            ->where('asientos.id', '=', $id)
            ->orderBy('asientos.id', 'desc')
            ->groupBy('asientos.id', 'asientos.nro', 'asientos.created_at', 'asientos.forma_pago', 'asientos.banco',
                'asientos.cheque', 'tipo_cambio', 'cantidad_moneda', 'asientos.glosa', 'asientos.razon_social', 'asientos.concepto', 'asientos.TDebe', 'asientos.THaber', 'asientos.estado', 'asientos.created_at', 'users.nombre')
            ->take(1)->get();

        $detalles = CuentaAsiento::join('cuentas', 'cuenta_asientos.idcuenta', '=', 'cuentas.id')
            ->select('cuenta_asientos.debe', 'cuenta_asientos.haber', 'cuentas.tipo_cuenta as cuenta_tipo', 'cuentas.cuenta as cuenta01')
            ->where('cuenta_asientos.idasiento', '=', $id)
            ->orderBy('cuenta_asientos.id', 'asc')->get();

        $nroasiento = Asiento::select('nro')->where('id', $id)->get();

        $formatter = new NumeroALetras;

        $pdf = \PDF::loadView('pdf.asiento', ['asientos' => $asientos, 'detalles' => $detalles, 'formatter' => $formatter]);
        //$pdf->setPaper('a4','landscape');
        return $pdf->download('asientos-' . $nroasiento[0]->nro . '.pdf');

    }
}
