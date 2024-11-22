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

class VentaController extends Controller
{

    public function index()
    {

        $ventas = Venta::join('clientes', 'ventas.idcliente', '=', 'clientes.id')
            ->join('users', 'ventas.idusuario', '=', 'users.id')
            ->join('detalle_ventas', 'ventas.id', '=', 'detalle_ventas.idventa')
            ->select('ventas.id', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto',
                'ventas.estado', 'ventas.total', 'clientes.nombre as cliente', 'users.nombre')
            ->orderBy('ventas.id', 'desc')
            ->groupBy('ventas.id', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto',
                'ventas.estado', 'ventas.total', 'clientes.nombre', 'users.nombre')
            ->paginate(100000000000);

        $cont = 0;

        return view('venta.index', ["ventas" => $ventas, "cont" => $cont]);

    }

    public function create()
    {

        $clientes = DB::table('clientes')
            ->where('clientes.condicion', '=', '1')->get();

        $productos = DB::table('productos as prod')
            ->join('detalle_compras', 'prod.id', '=', 'detalle_compras.idproducto')
            ->select(DB::raw('CONCAT(prod.codigo," ",prod.nombre) AS producto'), 'prod.id', 'prod.stock', 'prod.precio_venta', 'prod.descuento')
            ->where('prod.condicion', '=', '1')
            ->where('prod.stock', '>', '0')
            ->groupBy('producto', 'prod.id', 'prod.stock', 'prod.precio_venta', 'prod.descuento')
            ->get();

        $contar = DB::table('ventas')
            ->select(DB::raw('count(*)+1 as numero'))
            ->get();

        return view('venta.create', ["clientes" => $clientes, "productos" => $productos, 'contar' => $contar]);

    }

    protected function generateCode()
    {
        return Keygen::bytes()->generate(
            function ($key) {

                $random = Keygen::numeric()->generate();

                return substr(md5($key . $random . strrev($key)), mt_rand(0, 8), 20);
            },
            function ($key) {

                return join('-', str_split($key, 4));
            },
            'strtoupper'
        );
    }

    protected function controlCode()
    {
        return Keygen::bytes()->generate(
            function ($key) {

                $random = Keygen::numeric()->generate();

                return substr(md5($key . $random . strrev($key)), mt_rand(0, 8), 10);
            },
            function ($key) {

                return join('-', str_split($key, 2));
            },
            'strtoupper'
        );
    }

    public function store(VentasRequest $request)
    {

        $contar = DB::table('ventas')
            ->select(DB::raw('count(*)+1 as numero'))
            ->get();
        foreach ($contar as $numero) {
            $numero = $numero->numero;
        }

        try {

            DB::beginTransaction();
            $mytime = Carbon::now('America/La_Paz');

            $venta            = new Venta();
            $venta->idcliente = $request->id_cliente;
            $venta->idusuario = \Auth::user()->id;

            $control               = $this->controlCode();
            $venta->codigo_control = $control;

            $autorizacion          = Keygen::numeric(15)->generate();
            $venta->autorizacion   = $autorizacion;

            $venta->tipo_identificacion = $request->tipo_identificacion;
            $venta->num_venta           = $numero;
            $venta->fecha_venta         = $mytime->toDateString();
            $venta->impuesto            = "0.16";
            $venta->total               = $request->total_pagar;

            $code     = $this->generateCode();
            $codeback = Keygen::numeric(8)->generate();
            $fechaday = $mytime->toDateString();

            $QRCODE = 'qr/' . '' . $numero . '.png';
            QRCode::text('AMORTIGUADORES ANA NIT: 129485028 AUTORIZACION: ' . $autorizacion . ' CONTROL: ' . $control . ' CODIGO:' . $code . ' ' . $venta->tipo_identificacion . ': ' . $codeback . $venta->num_venta . ' FECHA: ' . $fechaday . ' MONTO TOTAL: ' . $venta->total)
                ->setSize(10)
                ->setMargin(2)
                ->setOutFile($QRCODE)
                ->png();

            $venta->venta_qr = $QRCODE;
            $venta->estado   = 'Registrado';
            $venta->save();

            $id_producto = $request->id_producto;
            $cantidad    = $request->cantidad;
            $descuento   = $request->descuento;
            $precio      = $request->precio_venta;

            $cont = 0;

            while ($cont < count($id_producto)) {

                $detalle = new DetalleVenta();

                $detalle->idventa    = $venta->id;
                $detalle->idproducto = $id_producto[$cont];
                $detalle->cantidad   = $cantidad[$cont];
                $detalle->precio     = $precio[$cont];
                $detalle->descuento  = $descuento[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();
        }

        return Redirect::to('venta')->with('success', 'La Venta fue realizado con éxito');
    }

    public function show($id)
    {

        $venta = Venta::join('clientes', 'ventas.idcliente', '=', 'clientes.id')
            ->join('detalle_ventas', 'ventas.id', '=', 'detalle_ventas.idventa')
            ->select('ventas.id', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto', 'ventas.venta_qr',
                'ventas.autorizacion','ventas.estado', 'clientes.nombre', 'clientes.tipo_documento', 'clientes.num_documento', 'clientes.expedito', 'clientes.telefono',
                DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total')
            )
            ->where('ventas.id', '=', $id)
            ->orderBy('ventas.id', 'desc')
            ->groupBy('ventas.id', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto', 'ventas.venta_qr','ventas.autorizacion','ventas.estado', 'clientes.nombre', 'clientes.tipo_documento', 'clientes.num_documento', 'clientes.expedito', 'clientes.telefono')
            ->first();

        $detalles = DetalleVenta::join('productos', 'detalle_ventas.idproducto', '=', 'productos.id')
            ->select('detalle_ventas.cantidad', 'detalle_ventas.precio', 'detalle_ventas.descuento', 'productos.nombre as producto')
            ->where('detalle_ventas.idventa', '=', $id)
            ->orderBy('detalle_ventas.id', 'desc')->get();

        return view('venta.show', ['venta' => $venta, 'detalles' => $detalles]);
    }

    public function anulado()
    {

        $venta = Venta::join('clientes', 'ventas.idcliente', '=', 'clientes.id')
            ->join('detalle_ventas', 'ventas.id', '=', 'detalle_ventas.idventa')
            ->select('ventas.id', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto', 'ventas.venta_qr',
                'ventas.autorizacion','ventas.estado', 'clientes.nombre', 'clientes.tipo_documento', 'clientes.num_documento', 'clientes.expedito', 'clientes.telefono',
                DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total')
            )
            ->where('ventas.id', '=', $id)
            ->orderBy('ventas.id', 'desc')
            ->groupBy('ventas.id', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto', 'ventas.venta_qr','ventas.autorizacion','ventas.estado', 'clientes.nombre', 'clientes.tipo_documento', 'clientes.num_documento', 'clientes.expedito', 'clientes.telefono')
            ->first();

        $detalles = DetalleVenta::join('productos', 'detalle_ventas.idproducto', '=', 'productos.id')
            ->select('detalle_ventas.cantidad', 'detalle_ventas.precio', 'detalle_ventas.descuento', 'productos.nombre as producto')
            ->where('detalle_ventas.idventa', '=', $id)
            ->orderBy('detalle_ventas.id', 'desc')->get();

        return view('venta.anulado', ['venta' => $venta, 'detalles' => $detalles]);
    }

    public function destroy(Request $request)
    {

        $venta         = Venta::findOrFail($request->id_venta);
        $venta->estado = 'Anulado';
        $venta->save();
        return Redirect::to('venta')->with('success', 'La Venta fue Anulada con éxito');

    }

    public function pdf(Request $request, $id)
    {

        $venta = Venta::join('clientes', 'ventas.idcliente', '=', 'clientes.id')
            ->join('users', 'ventas.idusuario', '=', 'users.id')
            ->join('detalle_ventas', 'ventas.id', '=', 'detalle_ventas.idventa')
            ->select('ventas.codigo_control', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto', 'ventas.venta_qr',
                'ventas.autorizacion', 'ventas.estado', DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total'), 'clientes.nombre', 'clientes.tipo_documento', 'clientes.num_documento',
                'clientes.direccion', 'clientes.email', 'clientes.telefono', 'users.usuario')
            ->where('ventas.id', '=', $id)
            ->orderBy('ventas.id', 'desc')
            ->groupBy('ventas.codigo_control', 'ventas.tipo_identificacion',
                'ventas.num_venta', 'ventas.fecha_venta', 'ventas.impuesto', 'ventas.venta_qr',
                'ventas.autorizacion', 'ventas.estado', 'clientes.nombre', 'clientes.tipo_documento', 'clientes.num_documento',
                'clientes.direccion', 'clientes.email', 'clientes.telefono', 'users.usuario')
            ->take(1)->get();

        $detalles = DetalleVenta::join('productos', 'detalle_ventas.idproducto', '=', 'productos.id')
            ->select('detalle_ventas.cantidad', 'detalle_ventas.precio', 'detalle_ventas.descuento',
                'productos.nombre as producto')
            ->where('detalle_ventas.idventa', '=', $id)
            ->orderBy('detalle_ventas.id', 'desc')->get();

        $numventa = Venta::select('num_venta')->where('id', $id)->get();

        $formatter = new NumeroALetras;

        $pdf = \PDF::loadView('pdf.venta', ['venta' => $venta, 'detalles' => $detalles, 'formatter' => $formatter]);
        return $pdf->download('FACTURA-' . $numventa[0]->num_venta . '.pdf');
    }

}
