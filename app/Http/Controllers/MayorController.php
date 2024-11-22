<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class MayorController extends Controller
{

    public function index(Request $request)
    {
        
        $cuentas = DB::table('cuentas as cuent')
            ->select(DB::raw('CONCAT(cuent.cuenta," - ",cuent.tipo_cuenta) AS cuenta_tipo'), 'cuent.id')
            ->where('cuent.condicion', '=', '1')
            ->orderBy('cuent.cuenta')
            ->get();

        $saldoD = 0;
        $saldoH = 0;

        $sql_cuenta      = trim($request->get('sql_cuenta'));
        $sql_fecha_start = trim($request->get('start'));
        $sql_fecha_end   = trim($request->get('end'));

        if ($sql_fecha_start != "" && $sql_fecha_end != "") {

            if ($sql_fecha_start && $sql_fecha_end) {

                $totalmayor = DB::table('cuenta_asientos')
                    ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                    ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                    ->select(DB::raw('sum(cuenta_asientos.debe) as totalD'), DB::raw('sum(cuenta_asientos.haber) as totalH'))
                    ->where('asientos.estado', '=', 'Registrado')
                    ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                    ->get();

                $mayores = DB::table('cuenta_asientos')
                    ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                    ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                    ->select('asientos.nro', 'cuenta_asientos.created_at', 'cuenta_asientos.debe', 'cuenta_asientos.haber', 'cuentas.cuenta as cuenta01', 'cuentas.tipo_cuenta as cuenta_tipo')
                    ->where('asientos.estado', '=', 'Registrado')
                    ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                    ->orderBy('cuentas.tipo_cuenta')
                    ->get();

                $star = Carbon::parse($sql_fecha_start)->formatLocalized('%d de %B %Y al');
                $end  = Carbon::parse($sql_fecha_end)->formatLocalized('%d de %B %Y');

                return view('mayor.index', ['mayores' => $mayores, 'totalmayor' => $totalmayor, 'sql_cuenta' => $sql_cuenta, 'cuentas' => $cuentas, 'saldoD' => $saldoD, 'saldoH' => $saldoH, 'star' => $star, 'end' => $end]);
            }

        } else {
            $totalmayor = DB::table('cuenta_asientos')
                ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                ->select(DB::raw('sum(cuenta_asientos.debe) as totalD'), DB::raw('sum(cuenta_asientos.haber) as totalH'))
                ->where('cuentas.id', '=', $sql_cuenta)
                ->where('asientos.estado', '=', 'Registrado')
                ->get();

            $mayores = DB::table('cuenta_asientos')
                ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                ->select('asientos.nro', 'cuenta_asientos.created_at', 'cuenta_asientos.debe', 'cuenta_asientos.haber', 'cuentas.cuenta as cuenta01', 'cuentas.tipo_cuenta as cuenta_tipo')
                ->where('cuentas.id', '=', $sql_cuenta)
                ->where('asientos.estado', '=', 'Registrado')
                ->get();

            $star = '';
            $end  = '';

            return view('mayor.index', ['mayores' => $mayores, 'totalmayor' => $totalmayor, 'cuentas' => $cuentas, 'saldoD' => $saldoD, 'saldoH' => $saldoH, 'star' => $star, 'end' => $end]);

        }

    }

}
