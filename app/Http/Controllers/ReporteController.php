<?php

namespace App\Http\Controllers;


use App\Models\ReporteDiagnostico;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();

        return view("reporte.indexReporte", $user, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("reporte.createReporte");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'tipoReporte'=>'required|int',
            'carrera'=>'required|string|max:5',
            'asignatura'=>'required|string|max:50',
            'grado'=>'required|string|max:5',
            'grupo'=>'required|string|max:5',
            'turno'=>'required|string|max:10',
            'iddocente'=>'required|int',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        Reporte::insert($datosReporte);

        return redirect('docente')->with('mensaje','Reporte creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        //
        return view('reporte.indexReporte');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reporte=Reporte::findOrFail($id);
        return view('reporte.editReporte', compact('reporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'tipoReporte'=>'required|string|max:50',
            'carrera'=>'required|string|max:5',
            'asignatura'=>'required|string|max:50',
            'grado'=>'required|string|max:5',
            'grupo'=>'required|string|max:5',
            'turno'=>'required|string|max:10',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        
        $this->validate($request, $campos, $mensaje);

        //
        $datosReporte = request()->except(['_token','_method']);
        
        
        Reporte::where('id','=',$id)->update($datosReporte);
        $reporte=Reporte::findOrFail($id);
        return redirect('docente')->with('mensaje','Los cambios se han efectuado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reporte::destroy($id);
        return redirect('docente')->with('mensaje','Reporte borrado con éxito');
    }
}
