<?php

namespace App\Http\Controllers;

use App\Models\Raa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RaaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=Raa::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();
        return view('reporte/reporte_avance_academico/raa_index', $user, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $datos["reportes"]=Raa::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();

        return view("reporte/reporte_avance_academico/raa_create", $user,$datos);
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
            'carrera'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
            'total_alumnos'=>'required|int',
            'total_alumnos_ausentes'=>'required|int',
            'total_alumnos_desertados'=>'required|int',
            'status'=>'required|int',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        Raa::insert($datosReporte);

        return redirect('reporte_avance_academico')->with('mensaje','Reporte creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function show(raa $raa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user['users'] = Auth::user();
        $raa=Raa::findOrFail($id);
        // $competencias['competencia'] = Rd_competencia::where('r_diagnostico_id','=',$id)->paginate(5);
        // $pap['paps'] = Rd_pap::where('r_diagnostico_id','=',$id)->paginate(5);
        // $pag_def = Rd_pag::where('r_diagnostico_id','=',$id)->value('deficiencia_general');
        // $pag_id = Rd_pag::where('r_diagnostico_id','=',$id)->value('id');
        // $pag_ac = Rd_pag::where('r_diagnostico_id','=',$id)->value('accion_general');
        // $pag_time = Rd_pag::where('r_diagnostico_id','=',$id)->value('tiempo_general');

        
        // $competencias = Arr::add($competencias, 'pag_def',$pag_def);
        // $competencias = Arr::add($competencias, 'pag_id',$pag_id);
        // $competencias = Arr::add($competencias, 'pag_ac',$pag_ac);
        // $competencias = Arr::add($competencias, 'pag_time',$pag_time);
        // $competencias = Arr::add($competencias, 'pap',$pap);

        // var_dump($competencias);

        return view('reporte.reporte_avance_academico.form_raa_descripcion', compact('raa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, raa $raa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Raa::destroy($id);
        return redirect('reporte_avance_academico')->with('mensaje','Reporte borrado con éxito');
    }
}
