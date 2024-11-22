<?php

namespace App\Http\Controllers;

use DB;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {

            $sql       = trim($request->get('buscarTexto'));
            $productos = DB::table('productos as p')
                ->join('categorias as c', 'p.idcategoria', '=', 'c.id')
                ->select('p.id', 'p.idcategoria', 'p.nombre', 'p.descripcion', 'p.precio_venta', 'p.descuento', 'p.codigo', 'p.stock', 'p.imagen', 'p.condicion', 'c.nombre as categoria')
                ->where('p.nombre', 'LIKE', '%' . $sql . '%')
                ->orwhere('p.codigo', 'LIKE', '%' . $sql . '%')
                ->orderBy('p.id', 'desc')
                ->paginate(12);

            $categorias = DB::table('categorias')
                ->select('id', 'nombre', 'descripcion')
                ->where('condicion', '=', '1')->get();

            $cont = 0;

            return view('welcome', ["productos" => $productos, "categorias" => $categorias, "cont" => $cont, "buscarTexto" => $sql]);
        }
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'name'    =>  'required',
      'email'   =>  'required|email',
      'message' =>  'required'
     ],
     [
      'name.required' => 'El nombre es obligatorio',
      'email.required' => 'El correo es obligatorio',
      'email.email' => 'Debe ser un correo valido y el correo es obligatorio',
      'message.required' => 'Es necesario que describa su consulta'
    ]);

        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'message'   =>   $request->message
        );

     Mail::to('info@innovaciontecnologia.com')->send(new SendMail($data));
     return back()->with('success', 'Enviado.');

    }

}
