<?php

namespace App\Http\Controllers;

use App\Compra;
use App\DetalleCompra;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Luecano\NumeroALetras\NumeroALetras;
use App\Http\Requests\ComprasRequest;

class CompraController extends Controller
{

    public function index()
    {

        $compras = Compra::join('proveedores', 'compras.idproveedor', '=', 'proveedores.id')
            ->join('users', 'compras.idusuario', '=', 'users.id')
            ->join('detalle_compras', 'compras.id', '=', 'detalle_compras.idcompra')
            ->select('compras.id', 'compras.tipo_identificacion',
                'compras.num_compra', 'compras.created_at', 'compras.created_at', 'compras.impuesto',
                'compras.estado', 'compras.total', 'proveedores.nombre as proveedor', 'users.nombre')
            ->orderBy('compras.id', 'desc')
            ->groupBy('compras.id', 'compras.tipo_identificacion',
                'compras.num_compra', 'compras.created_at', 'compras.created_at', 'compras.impuesto',
                'compras.estado', 'compras.total', 'proveedores.nombre', 'users.nombre')
            ->paginate(1000000000000);

        $cont = 0;

        return view('compra.index', ["compras" => $compras, "cont" => $cont]);

    }

    public function create()
    {

        $proveedores = DB::table('proveedores')
            ->where('proveedores.condicion', '=', '1')->get();

        $productos = DB::table('productos as prod')
            ->select(DB::raw('CONCAT(prod.codigo," ",prod.nombre) AS producto'), 'prod.id')
            ->where('prod.condicion', '=', '1')->get();

        $contar = DB::table('compras')
            ->select(DB::raw('count(*)+1 as numero'))
            ->get();

        return view('compra.create', ["proveedores" => $proveedores, "productos" => $productos, 'contar' => $contar]);

    }

    public function store(ComprasRequest $request)
    {

        $contar = DB::table('compras')
            ->select(DB::raw('count(*)+1 as numero'))
            ->get();
        foreach ($contar as $numero) {
            $numero = $numero->numero;
        }

        try {

            DB::beginTransaction();

            $mytime = Carbon::now('America/La_Paz');

            $compra                      = new Compra();
            $compra->idproveedor         = $request->id_proveedor;
            $compra->idusuario           = \Auth::user()->id;
            $compra->tipo_identificacion = $request->tipo_identificacion;
            $compra->num_compra          = $numero;
            $compra->fecha_compra        = $mytime->toDateString();
            $compra->impuesto            = '0.13';
            $compra->total               = $request->total_pagar;
            $compra->estado              = 'Registrado';
            $compra->save();

            $id_producto = $request->id_producto;
            $cantidad    = $request->cantidad;
            $precio      = $request->precio_compra;

            $cont = 0;

            while ($cont < count($id_producto)) {

                $detalle = new DetalleCompra();

                $detalle->idcompra   = $compra->id;
                $detalle->idproducto = $id_producto[$cont];
                $detalle->cantidad   = $cantidad[$cont];
                $detalle->precio     = $precio[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
        }

        return Redirect::to('compra')->with('success', 'Compra Registrado con éxito');
    }

    public function show($id)
    {

        $compra = Compra::join('proveedores', 'compras.idproveedor', '=', 'proveedores.id')
            ->join('users', 'compras.idusuario', '=', 'users.id')
            ->join('detalle_compras', 'compras.id', '=', 'detalle_compras.idcompra')
            ->select('compras.id', 'compras.tipo_identificacion',
                'compras.num_compra', 'compras.created_at', 'compras.impuesto',
                'compras.estado', DB::raw('sum(detalle_compras.cantidad*precio) as total'), 'proveedores.nombre', 'proveedores.direccion', 'proveedores.email', 'proveedores.telefono', 'users.nombre as user')
            ->where('compras.id', '=', $id)
            ->orderBy('compras.id', 'desc')
            ->groupBy('compras.id', 'compras.tipo_identificacion',
                'compras.num_compra', 'compras.created_at', 'compras.impuesto',
                'compras.estado', 'proveedores.nombre', 'proveedores.direccion', 'proveedores.email', 'proveedores.telefono', 'users.nombre')
            ->first();

        $detalles = DetalleCompra::join('productos', 'detalle_compras.idproducto', '=', 'productos.id')
            ->select('detalle_compras.cantidad', 'detalle_compras.precio', 'productos.nombre as producto')
            ->where('detalle_compras.idcompra', '=', $id)
            ->orderBy('detalle_compras.id', 'desc')->get();

        return view('compra.show', ['compra' => $compra, 'detalles' => $detalles]);
    }

    public function destroy(Request $request)
    {

        $compra         = Compra::findOrFail($request->id_compra);
        $compra->estado = 'Anulado';
        $compra->save();
        return Redirect::to('compra')->with('success', 'Compra Anulado con éxito');

    }

    public function pdf(Request $request, $id)
    {

        $compra = Compra::join('proveedores', 'compras.idproveedor', '=', 'proveedores.id')
            ->join('users', 'compras.idusuario', '=', 'users.id')
            ->join('detalle_compras', 'compras.id', '=', 'detalle_compras.idcompra')
            ->select('compras.id', 'compras.tipo_identificacion',
                'compras.num_compra', 'compras.created_at', 'compras.impuesto', DB::raw('sum(detalle_compras.cantidad*precio) as total'),
                'compras.estado', 'proveedores.nombre', 'proveedores.tipo_documento', 'proveedores.num_documento','proveedores.direccion', 'proveedores.email', 'proveedores.telefono', 'users.nombre as user')
            ->where('compras.id', '=', $id)
            ->orderBy('compras.id', 'desc')
            ->groupBy('compras.id', 'compras.tipo_identificacion',
                'compras.num_compra', 'compras.created_at', 'compras.impuesto',
                'compras.estado', 'proveedores.nombre', 'proveedores.tipo_documento', 'proveedores.num_documento','proveedores.direccion', 'proveedores.email', 'proveedores.telefono', 'users.nombre')
            ->take(1)->get();

        $detalles = DetalleCompra::join('productos', 'detalle_compras.idproducto', '=', 'productos.id')
            ->select('detalle_compras.cantidad', 'detalle_compras.precio',
                'productos.nombre as producto')
            ->where('detalle_compras.idcompra', '=', $id)
            ->orderBy('detalle_compras.id', 'desc')->get();

        $numcompra = Compra::select('num_compra')->where('id', $id)->get();

        $formatter = new NumeroALetras;

        $pdf = \PDF::loadView('pdf.compra', ['compra' => $compra, 'detalles' => $detalles, 'formatter' => $formatter]);
        return $pdf->download('COMPRAS-' . $numcompra[0]->num_compra . '.pdf');
    }

}
