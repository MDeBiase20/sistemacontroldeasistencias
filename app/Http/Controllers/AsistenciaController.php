<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use App\Models\Miembro;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\App;

/**
 * Class AsistenciaController
 * @package App\Http\Controllers
 */
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::paginate();

        return view('asistencia.index', compact('asistencias'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }

    //funciones para los reportes
    public function reportes()
    {
        return view('asistencia.reportes');
    }

    public function pdf()
    {
        //$pdf = App::make('dompdf.wrapper');
       // $pdf->loadHTML('<h1>Test</h1>');
       $asistencias = Asistencia::paginate();
       $pdf = Pdf::loadView('asistencia.pdf', ['asistencias'=> $asistencias]);
        return $pdf->stream();
        

        // return view('asistencia.pdf', compact('asistencias'))
        //     ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }

    public function pdf_fechas(Request $request)
    {
        $fi= $request->fi;
        $ff= $request->ff;
        $asistencias = Asistencia::where('fecha', '>=', $fi)
        ->where('fecha', '<=', $ff)->get();


        $pdf = Pdf::loadView('asistencia.pdf_fechas', ['asistencias'=> $asistencias]);
        return $pdf->stream();
        
        //$pdf = App::make('dompdf.wrapper');
       // $pdf->loadHTML('<h1>Test</h1>');
    //    $asistencias = Asistencia::paginate();
       

        //return view('asistencia.pdf_fechas', ['asistencias'=> $asistencias]);
        

        // return view('asistencia.pdf', compact('asistencias'))
        //     ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }
    //Fin funciones para los reportes

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asistencia = new Asistencia();
        $miembro = Miembro::pluck('nombre_apellido', 'id');
        return view('asistencia.create', compact('asistencia', 'miembro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asistencia::$rules);

        $asistencia = Asistencia::create($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);
        $miembro = Miembro::pluck('nombre_apellido', 'id');
        return view('asistencia.edit', compact('asistencia', 'miembro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        request()->validate(Asistencia::$rules);

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id)->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia deleted successfully');
    }
}
