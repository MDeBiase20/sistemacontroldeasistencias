<?php

namespace App\Http\Controllers;

use App\Models\Ministerio;
use Illuminate\Http\Request;

class MinisterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ministerios = Ministerio::all();
        return view('ministerios.index', ['ministerios'=>$ministerios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ministerios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Almacenar los registros a la base de datos
        // $ministerio = request()->all();
        // return response()->json($ministerio);

        //Validamos los campos
        $request->validate([
            'nombre_ministerio'=>'required',
            'fecha_ingreso'=>'required'
        ]);

        //Instanciamos el modelo ministerio para poder guardar los registros a la BD
        $ministerio = new Ministerio();

        $ministerio->nombre_ministerio = $request->nombre_ministerio;
        $ministerio->descripcion = $request->descripcion;
        $ministerio->estado = '1';
        $ministerio->fecha_ingreso = $request->fecha_ingreso; 

        $ministerio->save();

        return redirect()->route(route:'ministerios.index')->with('mensaje','Registro guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ministerio  $ministerio
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $ministerio = Ministerio::FindOrFail($id);
        return view('ministerios.show', ['ministerios'=>$ministerio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ministerio  $ministerio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ministerio = Ministerio::FindOrFail($id);
        return view('ministerios.edit', ['ministerios'=>$ministerio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ministerio  $ministerio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Validamos los campos
        $request->validate([
            'nombre_ministerio'=>'required',
            'fecha_ingreso'=>'required'
        ]);

        //Buscamos el ministerio por el id
        $ministerio = Ministerio::find($id);

        $ministerio->nombre_ministerio = $request->nombre_ministerio;
        $ministerio->descripcion = $request->descripcion;
        $ministerio->fecha_ingreso = $request->fecha_ingreso;

        $ministerio->save();
        return redirect()->route(route:'ministerios.index')->with('mensaje','Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ministerio  $ministerio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ministerio::destroy($id);
        return redirect()->route(route:'ministerios.index')->with('mensaje', 'Registro eliminado correctamente');
    }
}
