<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Reporte;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $datos["users"]=User::where('userid','=',$user);
        // $datos = DB::table('users')->where('id',$id);
        $id = Auth::id();
        $datos["reportes"]=Reporte::where('iddocente','=',$id)->paginate(3);
        $user['users'] = Auth::user();

        return view("docente.index", $user, $datos);
    }
    public function guest()
    {
        return view("docente.guest");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("docente.create");
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
            'nombre'=>'required|string|max:100',
            'apellidoPaterno'=>'required|string|max:100',
            'apellidoMaterno'=>'required|string|max:100',
            'correo'=>'required|email',
            'telefono'=>'required|string|max:15',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'userid'=>'required'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'imagen.required'=>'La imagen es requerida'
        ];
        $this->validate($request, $campos, $mensaje);

        // $datosDocente = request()->all();
        $datosDocente = request()->except("_token");
        

        if($request->hasFile("imagen")){
            $datosDocente["imagen"]=$request->file("imagen")->store("uploads","public");
        }
        
        Docente::insert($datosDocente);

        // return response()->json($datosDocente);
        return redirect('docente')->with('mensaje','Docente creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $docente=Docente::findOrFail($id);
        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'nombre'=>'required|string|max:100',
            'apellidoPaterno'=>'required|string|max:100',
            'apellidoMaterno'=>'required|string|max:100',
            'correo'=>'required|email',
            'telefono'=>'required|string|max:15',
            'userid'=>'required'
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        if($request->hasFile("imagen")){
            $campos=['imagen'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['imagen.required'=>'La imagen es requerida'];
        }
        $this->validate($request, $campos, $mensaje);

        //
        $datosDocente = request()->except(['_token','_method']);
        
        if($request->hasFile("imagen")){
            $docente=Docente::findOrFail($id);
            
            Storage::delete('public/'.$docente->imagen);
            
            $datosDocente["imagen"]=$request->file("imagen")->store("uploads","public");
        }
        
        Docente::where('id','=',$id)->update($datosDocente);
        $docente=Docente::findOrFail($id);
        // return view('docente.edit', compact('docente'));
        return redirect('docente')->with('mensaje','Los cambios se han efectuado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente=Docente::findOrFail($id);
        if(Storage::delete('public/'.$docente->imagen)){
            Docente::destroy($id);
        }
        
        return redirect('docente')->with('mensaje','Docente borrado con éxito');
    }
}
