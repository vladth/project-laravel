<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function index(Request $request)
    {

        $saldoD = 0;
        $saldoH = 0;
        $act    = 0;

        $sql_fecha_start = trim($request->get('start'));
        $sql_fecha_end   = trim($request->get('end'));

        if ($sql_fecha_start != "" && $sql_fecha_end != "") {

            if ($sql_fecha_start && $sql_fecha_end) {

                $totalmayor = DB::table('cuenta_asientos')
                    ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                    ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                    ->select('cuentas.tipo_cuenta', 'cuentas.tipo_plan_cuenta', DB::raw('sum(cuenta_asientos.debe) as totalD'), DB::raw('sum(cuenta_asientos.haber) as totalH'))
                    ->groupBy('cuentas.tipo_cuenta', 'cuentas.tipo_plan_cuenta')
                    ->where('asientos.estado', '=', 'Registrado')
                    ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                    ->get();

                $totalactivos = DB::table('cuenta_asientos')
                    ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                    ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                    ->select('cuentas.tipo_plan_cuenta', DB::raw('(sum(cuenta_asientos.debe) - sum(cuenta_asientos.haber)) as activoT'))
                    ->groupBy('cuentas.tipo_plan_cuenta')
                    ->where('cuentas.tipo_plan_cuenta', '=', 'ACTIVO')
                    ->where('asientos.estado', '=', 'Registrado')
                    ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                    ->get();

                $totalpasivos = DB::table('cuenta_asientos')
                    ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                    ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                    ->select('cuentas.tipo_plan_cuenta', DB::raw('(sum(cuenta_asientos.debe) - sum(cuenta_asientos.haber)) as pasivoT'))
                    ->groupBy('cuentas.tipo_plan_cuenta')
                    ->where('cuentas.tipo_plan_cuenta', '=', 'PASIVO')
                    ->where('asientos.estado', '=', 'Registrado')
                    ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                    ->get();

                $totalpatrimonios = DB::table('cuenta_asientos')
                    ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                    ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                    ->select('cuentas.tipo_plan_cuenta', DB::raw('(sum(cuenta_asientos.debe) - sum(cuenta_asientos.haber)) as patrimonioT'))
                    ->groupBy('cuentas.tipo_plan_cuenta')
                    ->where('cuentas.tipo_plan_cuenta', '=', 'PATRIMONIO')
                    ->where('asientos.estado', '=', 'Registrado')
                    ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                    ->get();

                return view('general.index', ['totalmayor' => $totalmayor, 'saldoD' => $saldoD, 'saldoH' => $saldoH, 'totalactivos' => $totalactivos, 'totalpasivos' => $totalpasivos, 'totalpatrimonios' => $totalpatrimonios, 'act' => $act]);
            }

        } else {
            $sql_fecha_start = '1990-01-01';
            $sql_fecha_end   = '1990-31-12';

            $totalmayor = DB::table('cuenta_asientos')
                ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                ->select('cuentas.tipo_cuenta', 'cuentas.tipo_plan_cuenta', DB::raw('sum(cuenta_asientos.debe) as totalD'), DB::raw('sum(cuenta_asientos.haber) as totalH'))
                ->groupBy('cuentas.tipo_cuenta', 'cuentas.tipo_plan_cuenta')
                ->where('asientos.estado', '=', 'Registrado')
                ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                ->get();

            $totalactivos = DB::table('cuenta_asientos')
                ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                ->select('cuentas.tipo_plan_cuenta', DB::raw('(sum(cuenta_asientos.debe) - sum(cuenta_asientos.haber)) as activoT'))
                ->groupBy('cuentas.tipo_plan_cuenta')
                ->where('cuentas.tipo_plan_cuenta', '=', 'ACTIVO')
                ->where('asientos.estado', '=', 'Registrado')
                ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                ->get();

            $totalpasivos = DB::table('cuenta_asientos')
                ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                ->select('cuentas.tipo_plan_cuenta', DB::raw('(sum(cuenta_asientos.debe) - sum(cuenta_asientos.haber)) as pasivoT'))
                ->groupBy('cuentas.tipo_plan_cuenta')
                ->where('cuentas.tipo_plan_cuenta', '=', 'PASIVO')
                ->where('asientos.estado', '=', 'Registrado')
                ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                ->get();

            $totalpatrimonios = DB::table('cuenta_asientos')
                ->join('asientos', 'asientos.id', '=', 'cuenta_asientos.idasiento')
                ->join('cuentas', 'cuentas.id', '=', 'cuenta_asientos.idcuenta')
                ->select('cuentas.tipo_plan_cuenta', DB::raw('(sum(cuenta_asientos.debe) - sum(cuenta_asientos.haber)) as patrimonioT'))
                ->groupBy('cuentas.tipo_plan_cuenta')
                ->where('cuentas.tipo_plan_cuenta', '=', 'PATRIMONIO')
                ->where('asientos.estado', '=', 'Registrado')
                ->whereBetween('cuenta_asientos.created_at', [$sql_fecha_start, $sql_fecha_end])
                ->get();

            return view('general.index', ['totalmayor' => $totalmayor, 'saldoD' => $saldoD, 'saldoH' => $saldoH, 'totalactivos' => $totalactivos, 'totalpasivos' => $totalpasivos, 'totalpatrimonios' => $totalpatrimonios, 'act' => $act]);
        }

        echo "Pagina no encontrada";

    }

}
