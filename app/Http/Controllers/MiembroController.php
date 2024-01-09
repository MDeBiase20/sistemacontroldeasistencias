<?php

namespace App\Http\Controllers;

use App\Models\Miembro; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MiembroController extends Controller
{

    public function index(){
        $miembros = Miembro::all()->sortByDesc('id');
        return view ('miembros.index', ['miembros'=>$miembros]);
    }
    
    public function create(){
        return view ('miembros.create');
    }

    public function store(Request $request){
        // $miembro = request()-> all();
        // return response()->json($miembro);

        //Validación de los campos desde el Back-end
        $request->validate([
            'nombre_apellido'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'fecha_nacimiento'=>'required',
            //'fotografia'=>'required',
            'email'=>'required',
            'ministerio'=>'required'
        ]);

        $miembro = new Miembro();

        $miembro->nombre_apellido = $request->nombre_apellido;
        $miembro->direccion = $request->direccion;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->genero = $request->genero;
        $miembro->email = $request->email;
        $miembro->estado = '1';
        $miembro->ministerio = $request->ministerio;
        // $miembro->fotografia = $request->fotografia;
        if($request->hasFile(key:'fotografia')){
            $miembro->fotografia = $request->file(key: 'foto')->store(path: 'fotografias_miembros', options: 'public');
         }
        $miembro->fecha_ingreso = date($format = 'Y-m-d');
        
        $miembro->save();
        //Para que al guardar los registros se redireccione a la página donde está el listado
        return redirect()->route(route: 'miembros.index')->with('mensaje','Registro guardado exitosamente');
    }

    //función para mostrar los registros completos en un formulario
    public function show($id){
        $miembros = Miembro::findOrFail($id);
        return view ('miembros.show', ['miembros'=>$miembros]);
        
    }

    //función para editar registros de la base de datos
    public function edit($id){
        $miembros = Miembro::findOrFail($id);
        return view('miembros.edit', ['miembros'=>$miembros]);
    }

    //función para actualizar los registros de la base de datos
    //Todos los campos que están en el formulario los podamos guardar, el $id va para que se actualice dependiendo del id seleccionado
    public function update(Request $request, $id){

        $request->validate([
            'nombre_apellido'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'fecha_nacimiento'=>'required',
            //'fotografia'=>'required',
            'email'=>'required',
            'ministerio'=>'required'
        ]);

        $miembro = Miembro::find($id);

        $miembro->nombre_apellido = $request->nombre_apellido;
        $miembro->direccion = $request->direccion;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->genero = $request->genero;
        $miembro->email = $request->email;
        $miembro->ministerio = $request->ministerio;

        //validar si existe o no la fotografía.
        //Si es que existe un archivo
        if($request->hasFile(key:'fotografia')){

            //Lo eliminamos
            Storage::delete(path:'public/'.$miembro->fotografia);

            //Subimos el archivo nuevo
            $miembro->fotografia = $request->file(key: 'foto')->store(path: 'fotografias_miembros', options: 'public');
         }

         $miembro->save();

         return redirect()->route(route: 'miembros.index')->with('mensaje','Registro actualizado exitosamente');
    }    
    
    public function destroy($id){

        $miembro = Miembro::find($id);

        Storage::delete(path:'public/'.$miembro->fotografia);
        Miembro::destroy($id);
        return redirect()->route(route: 'miembros.index')->with('mensaje','Registro eliminado exitosamente');
    }
}
