<?php

namespace App\Http\Controllers;

use App\Categoria;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\CategoriaUpdateRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = DB::table('categorias')
            ->orderBy('id', 'desc')
            ->paginate(1000000000);
        $cont = 0;
        return view('categoria.index', ["categorias" => $categorias, "cont" => $cont]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        //
        $categoria              = new Categoria();
        $categoria->nombre      = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion   = '1';
        $categoria->save();
        return Redirect::to("categoria")->with('success', 'Categoria agregada con éxito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaUpdateRequest $request)
    {
        //
        $categoria              = Categoria::findOrFail($request->id_categoria);
        $categoria->nombre      = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion   = '1';
        $categoria->save();
        return Redirect::to("categoria")->with('success', 'Categoria actualizada con éxito');
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
        $categoria = Categoria::findOrFail($request->id_categoria);

        if ($categoria->condicion == "1") {

            $categoria->condicion = '0';
            $categoria->save();
            return Redirect::to("categoria")->with('success', 'Categoria desactivada con éxito');

        } else {

            $categoria->condicion = '1';
            $categoria->save();
            return Redirect::to("categoria")->with('success', 'Categoria activada con éxito');

        }
    }
}
