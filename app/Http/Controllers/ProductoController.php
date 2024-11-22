<?php

namespace App\Http\Controllers;

use App\Producto;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductosRequest;
use App\Http\Requests\ProductosUpdateRequest;

class ProductoController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $productos = DB::table('productos as p')
            ->join('categorias as c', 'p.idcategoria', '=', 'c.id')
            ->select('p.id', 'p.idcategoria', 'p.nombre', 'p.descripcion', 'p.precio_venta', 'p.descuento', 'p.codigo', 'p.stock', 'p.imagen', 'p.condicion', 'c.nombre as categoria')
            ->orderBy('p.id', 'desc')
            ->paginate(100000000000);

        $categorias = DB::table('categorias')
            ->select('id', 'nombre', 'descripcion')
            ->where('condicion', '=', '1')->get();

        $cont = 0;

        return view('producto.index', ["productos" => $productos, "categorias" => $categorias, "cont" => $cont]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosRequest $request)
    {
        //
        $producto               = new Producto();
        $producto->idcategoria  = $request->id;
        $producto->codigo       = $request->codigo;
        $producto->nombre       = $request->nombre;
        $producto->descripcion  = $request->descripcion;
        $producto->precio_venta = $request->precio_venta;
        $producto->descuento    = $request->descuento;
        $producto->stock        = '0';
        $producto->condicion    = '0';

        if ($request->hasFile('imagen')) {

            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            $extension = $request->file('imagen')->guessClientExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('imagen')->storeAs('imagenes/producto', $fileNameToStore);

        } else {

            $fileNameToStore = "noproducto.png";
        }

        $producto->imagen = $fileNameToStore;

        $producto->save();
        return Redirect::to("producto")->with('success', 'Producto Registrado con éxito');
    }
    public function show($id)
    {

        $producto = Producto::join('categorias', 'productos.idcategoria', '=', 'categorias.id')
            ->select('productos.id', 'productos.idcategoria', 'productos.codigo', 'productos.nombre', 'productos.descripcion', 'productos.precio_venta', 'productos.descuento', 'categorias.nombre as nombre_categoria', 'productos.stock', 'productos.condicion', 'productos.imagen', 'productos.updated_at', 'productos.created_at')
            ->where('productos.id', '=', $id)
            ->get();

        $categorias = DB::table('categorias')
            ->select('id', 'nombre', 'descripcion')
            ->where('condicion', '=', '1')->get();

        return view('producto.show', ['producto' => $producto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductosUpdateRequest $request)
    {
        //
        $producto               = Producto::findOrFail($request->id_producto);
        $producto->idcategoria  = $request->id;
        $producto->codigo       = $request->codigo;
        $producto->nombre       = $request->nombre;
        $producto->descripcion  = $request->descripcion;
        $producto->precio_venta = $request->precio_venta;
        $producto->descuento    = $request->descuento;
        
        
        if ($request->hasFile('imagen')) {

            if ($producto->imagen != 'noproducto.png') {
                Storage::delete('imagenes/producto/' . $producto->imagen);
            }

            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            $extension = $request->file('imagen')->guessClientExtension();

            $fileNameToStore = time() . '.' . $extension;

            $path = $request->file('imagen')->storeAs('imagenes/producto', $fileNameToStore);

        } else {

            $fileNameToStore = $producto->imagen;
        }

        $producto->imagen = $fileNameToStore;

        $producto->save();
        return Redirect::to("producto")->with('success', 'Producto actualizado con éxito');
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
        $producto = Producto::findOrFail($request->id_producto);

        if ($producto->condicion == "1") {

            $producto->condicion = '0';
            $producto->save();
            return Redirect::to("producto")->with('success', 'Producto inhabilitado con éxito');

        } else {

            $producto->condicion = '1';
            $producto->save();
            return Redirect::to("producto")->with('success', 'Producto habilitado con éxito');

        }
    }

    public function listarPdf()
    {

        $productos = Producto::join('categorias', 'productos.idcategoria', '=', 'categorias.id')
            ->select('productos.id', 'productos.idcategoria', 'productos.codigo', 'productos.nombre', 'productos.precio_venta', 'categorias.nombre as nombre_categoria', 'productos.stock', 'productos.condicion')
            ->orderBy('productos.nombre', 'desc')->get();

        $cont = Producto::count();

        $pdf = \PDF::loadView('pdf.productospdf', ['productos' => $productos, 'cont' => $cont]);
        return $pdf->download('productos.pdf');

    }
}
