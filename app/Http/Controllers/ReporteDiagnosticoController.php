<?php

namespace App\Http\Controllers;

use App\Models\ReporteDiagnostico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReporteDiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();

        return view("reporte/tipoReporte/reporteDiagnostico", $user,$datos);
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
            'user_id'=>'required|int',
            'autor'=>'required|string',
            'nombre_reporte'=>'required|string',
            'asignatura'=>'required|string|max:50',
            'tipo_evaluacion'=>'required|string',
            'cantidad_alumnos'=>'required|string|max:2',
            'carrera'=>'required|string|max:5',
            'grado'=>'required|string|max:5',
            'grupo'=>'required|string|max:5',
            'turno'=>'required|string|max:10',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        ReporteDiagnostico::insert($datosReporte);

        return redirect('reporte')->with('mensaje','Reporte creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(ReporteDiagnostico $reporteDiagnostico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(ReporteDiagnostico $reporteDiagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReporteDiagnostico $reporteDiagnostico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReporteDiagnostico $reporteDiagnostico)
    {
        //
    }
}
