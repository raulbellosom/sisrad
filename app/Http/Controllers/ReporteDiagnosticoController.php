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
        $id = Auth::id();
        $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();
        return view('reporte/reporte_diagnostico/indexDiagnostico', $user, $datos);
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

        return view("reporte/reporte_diagnostico/create_diagnostico", $user,$datos);
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
            'asignatura'=>'required|string',
            'tipo_evaluacion'=>'required|string',
            'cantidad_alumnos'=>'required|int',
            'carrera'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
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
    public function edit($id)
    {
        $user['users'] = Auth::user();
        $reporte_diagnostico=ReporteDiagnostico::findOrFail($id);
        return view('reporte.reporte_diagnostico.edit_diagnostico', $user, compact('reporte_diagnostico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'user_id'=>'required|int',
            'autor'=>'required|string',
            'nombre_reporte'=>'required|string',
            'asignatura'=>'required|string',
            'tipo_evaluacion'=>'required|string',
            'cantidad_alumnos'=>'required|int',
            'carrera'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except('_token','_method');
        
        ReporteDiagnostico::insert($datosReporte);

        ReporteDiagnostico::where('id','=',$id)->update($datosReporte);
        $reporte_diagnostico=ReporteDiagnostico::findOrFail($id);

        return redirect('reporte_diagnostico')->with('mensaje','Reporte ha sido modificado con éxito');
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
