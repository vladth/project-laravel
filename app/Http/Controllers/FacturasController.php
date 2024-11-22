<?php

namespace App\Http\Controllers;

use App\DetalleVenta;
use App\Venta;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Keygen;
use Luecano\NumeroALetras\NumeroALetras;
use QRCode;
use App\Http\Requests\VentasRequest;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$Fanulado = DB::table('ventas')
    			->where('ventas.estado','=','anulado')
    			->orderBy('ventas.updated_at','desc')
    			->get();

    			$cont = 0;

        return view('venta.anulado',['Fanulado' => $Fanulado,'cont' => $cont]);

    }

}
