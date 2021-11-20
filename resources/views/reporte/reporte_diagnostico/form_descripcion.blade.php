@extends('layouts.light')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between m-2">
        <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
            Regresar
        </a>
        <a  class="btn btn-outline-success" href="{{url('/downloadPDF')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
            </svg>
            Descargar reporte
        </a>
    </div>
            @if(Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

        @if (count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach( $errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Titulo --}}
            <div class="bg-primary p-4 mt-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                 Reporte Diagnostico
            </div>
        {{-- Titulo --}}

        {{-- Tabla principal --}}
            <div class="d-flex justify-content-between">
                <table class="table table-responsive-sm table-responsive-md table-light table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Fecha de elaboración</th>
                            <th>Tipo de reporte</th>
                            <th>Carrera</th>
                            <th>Asignatura</th>
                            <th>Grado Grupo</th>
                            <th>Turno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$reporte_diagnostico->created_at}}</td>
                            <td>{{$reporte_diagnostico->nombre_reporte}}</td>
                            <td>{{$reporte_diagnostico->carrera}}</td>
                            <td>{{$reporte_diagnostico->asignatura}}</td>
                            <td>{{$reporte_diagnostico->grado}} {{$reporte_diagnostico->grupo}}</td>
                            <td>{{$reporte_diagnostico->turno}}</td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        {{-- Tabla principal --}}

        {{-- Conocimientos y competecias --}}
            <div class="mb-4 bg-white">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Conocimientos, competencias especificas y/o genericas previas
                </div>
                <div class="container">
                    <div class="row">
                        <table class="table table-light table-striped table-responsive-sm table-responsive-md">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="col-8" >Competencia</th>
                                    <th class="col-2 text-center">Nivel alcanzado</th>
                                    <th class="col-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($competencia as $comp)
                                <tr>
                                    <th class="col-8">{{$comp->competencia}}</th>
                                    <th class="col-2 text-center">
                                        @if ($comp->ponderacion==0)
                                            Nulo
                                        @endif
                                        @if ($comp->ponderacion==1)
                                            Bajo
                                        @endif
                                        @if ($comp->ponderacion==2)
                                            Aceptable
                                        @endif
                                        @if ($comp->ponderacion==3)
                                            Bueno
                                        @endif
                                    </th>
                                    <th class="col-2">
                                        <input type="hidden" value="{{$comp->id}}" id="id_reporte">
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar">
                                    </th>
                                </tr>
                            @endforeach     
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{-- <form class="row" id="form_contacto" method="POST" enctype="multipart/form-data"> --}}
                        
                        <div class="form-group col-8" >
                            <label class="mr-4" for="competencia">Competencia</label>
                            <input class="form-control" name="competencia" type="text" placeholder="Descripcion de la competencia" id="competencia" >
                        </div>
                        <div class="form-group col-4">
                            <label class=" mr-4" for="ponderacion">Nivel</label>
                            <select class="form-control" name="ponderacion" id="ponderacion">
                                <option value="" hidden></option>
                                <option value="0">Nulo</option>
                                <option value="1">Bajo</option>
                                <option value="2">Aceptable</option>
                                <option value="3">Bueno</option>
                            </select>
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="r_diagnostico_id" id="r_diagnostico_id" value="{{$reporte_diagnostico->id}}" >
                        
                    {{-- </form> --}}
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Añadir competencia" class="btn btn-success" id="enviar">
                    </div>
                </div>
            </div>

        {{-- Conocimientos y competecias --}}
        
        {{-- Plan accion general --}}
            <div class="mb-4 pb-4 bg-white ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción general
                </div>
                <div class="container">
                    <div class="row">
                        <table class="table table-light table-striped table-responsive-sm table-responsive-md">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="col-4" >Deficiencia General</th>
                                    <th class="col-4 text-center">Accion Sugeridas</th>
                                    <th class="col-2 text-center">Tiempo de Ejecucion</th>
                                    <th class="col-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="col-4">{{$pag_def}}</th>
                                    <th class="col-4 text-center">{{$pag_ac}}</th>
                                    <th class="col-2 text-center">{{$pag_time}}</th>
                                    <th class="col-2">
                                        <input type="hidden" value="{{$pag_id}}" id="pag_id">
                                        @if ($pag_id != 0)
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_pag">
                                        @endif
                                        
                                    </th>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mw-100 pl-4 pr-4">
                    @if(!($pag_id))
                    <div class="mb-3">
                        Deficiencias 
                        <textarea class="form-control mr-sm-2" id="deficiencia_general" id="" cols="" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        Acciones sugeridas y recursos necesarios 
                        <textarea class="form-control mr-sm-2" id="accion_general" cols="" rows="3"></textarea>
                    </div>
                    <div class="mb-3" >
                        Tiempo de ejecución e impacto en cronograma
                        <textarea class="form-control mr-sm-2" id="tiempo_general" cols="" rows="2"></textarea>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Crear Plan de Accion General" class="btn btn-success" id="btn_pag">
                    </div>
                </div>
            </div>
        {{-- Plan accion general --}}

        {{-- Plan accion particular --}}
            <div class="mb-4 pb-4 bg-white ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción particular
                </div>
                <div class="container">
                    <div class="row">
                        <table class="table table-light table-striped table-responsive-sm table-responsive-md">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="col-3" >Nombre del alumno</th>
                                    <th class="col-3 text-center">Deficiencias</th>
                                    <th class="col-4 text-center">Accion sugerida</th>
                                    <th class="col-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($pap as $paps)
                                @foreach ($paps as $datos)
                                <tr>
                                    <th class="col-3">{{$datos->alumno_particular}}</th>
                                    <th class="col-3">{{$datos->deficiencia_particular}}</th>
                                    <th class="col-4 ">{{$datos->accion_particular}}</th>
                                    <th class="col-2">
                                        <input type="hidden" value="{{$datos->id}}" id="pap_id">
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_pap">
                                    </th>
                                </tr>
                                @endforeach
                                
                                
                            @endforeach     
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mw-100 pl-4 pr-4">
                    <div class="mb-2">
                        Nombre del alumno 
                        <input class="form-control mr-sm-2" id="alumno_particular">
                    </div>
                    <div class="mb-2">
                        Deficiencias (temas, áreas, otros) 
                        <textarea class="form-control mr-sm-2" id="deficiencia_particular" rows="2"></textarea>
                    </div>
                    <div class="mb-2" >
                        Acción sugerida (academica, psicologica, etc)
                        <textarea class="form-control mr-sm-2" id="accion_particular" rows="2"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Añadir Caso Particular" class="btn btn-success" id="btn_pap">
                    </div>
                </div>
            </div>
        {{-- Plan accion general --}}

        {{-- Botones  --}}
            <div class="m-2 d-flex justify-content-end justify-content-md-between  ">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div>
                    <form action="{{url('/downloadPDF/'.$reporte_diagnostico->id)}}" method="GET">
                        
                        <button  class="btn btn-outline-success" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Descargar reporte
                        </button>
                    </form>
                    {{-- <input type="submit" value="Descargar" class="btn btn-outline-success" id="btn_descargar"> --}}
                </div>
            </div>
        {{-- Botones --}}
    {{-- Fin Formulario Reporte --}}
    </div>

    {{-- Script campos automaticos --}}

    <script>
            let boton = document.getElementById("enviar");
            let btn_borrar = document.getElementById("borrar");
            let competencia =  document.getElementById('competencia');
            let ponderacion = document.getElementById('ponderacion');
            let r_diagnostico_id = document.getElementById('r_diagnostico_id');
            let id_reporte = document.getElementById('id_reporte');
            let _token = document.getElementById('token');
        //     let btn_descargar =  document.getElementById('btn_descargar');
            
        // btn_descargar.addEventListener("click", function(e){
        //     // let datos = {r_diagnostico_id:r_diagnostico_id.value}
        //         e.preventDefault();
               
        //         fetch('/sisrad/public/downloadPDF?r_diagnostico_id='+r_diagnostico_id.value,{
        //             method: 'get',
        //             headers: {
        //                 'X-CSRF-TOKEN': _token.value,
        //                 'Content-Type': 'application/json',
        //             },
        //             // body: JSON.stringify(datos)
        //         }).then(response => response.json())
        //         .then(data => {
        //             console.log(data);
        //             // location.reload()
        //         }).catch(error => {
        //             console.log(error.message);
        //         })
        // })

            boton.addEventListener("click", function(e){
                
                let datos = {competencia:competencia.value, ponderacion:ponderacion.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/sisrad/public/reporte_diagnostico/competencia',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(datos)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            });

            
            btn_borrar.addEventListener("click", function(e){
                let borrar_dato = {id:id_reporte.value}
                e.preventDefault();

                fetch('/sisrad/public/reporte_diagnostico/borrar_competencia',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(borrar_dato)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            });

            let boton_pag = document.getElementById('btn_pag');
            let btn_borrar_pag = document.getElementById("borrar_pag");
            let deficiencia_general = document.getElementById('deficiencia_general');
            let accion_general = document.getElementById('accion_general');
            let tiempo_general = document.getElementById('tiempo_general');
            let pag_id = document.getElementById('pag_id');

            boton_pag.addEventListener("click", function(e){
                
                let datos = {deficiencia_general:deficiencia_general.value, accion_general:accion_general.value, tiempo_general:tiempo_general.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/sisrad/public/reporte_diagnostico/pag',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(datos)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                    clearInput();
                }).catch(error => {
                    console.log(error.message);
                })
            });

            if (btn_borrar_pag) {
                btn_borrar_pag.addEventListener("click", function(e){
                let borrar_dato = {id:pag_id.value}
                e.preventDefault();
                
                fetch('/sisrad/public/reporte_diagnostico/borrar_pag',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(borrar_dato)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            });
            }
            

            let boton_pap = document.getElementById('btn_pap');
            let btn_borrar_pap = document.getElementById("borrar_pap");
            let alumno_particular = document.getElementById('alumno_particular');
            let deficiencia_particular = document.getElementById('deficiencia_particular');
            let accion_particular = document.getElementById('accion_particular');
            let pap_id = document.getElementById('pap_id');

            boton_pap.addEventListener("click", function(e){
                
                let datos = {alumno_particular:alumno_particular.value, deficiencia_particular:deficiencia_particular.value, 
                accion_particular:accion_particular.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/sisrad/public/reporte_diagnostico/pap',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(datos)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            });

            if (btn_borrar_pap) {
                btn_borrar_pap.addEventListener("click", function(e){
                let borrar_dato = {id:pap_id.value}
                e.preventDefault();

                fetch('/sisrad/public/reporte_diagnostico/borrar_pap',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(borrar_dato)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
                });
            }
            


    </script>
    {{-- Script campos automaticos --}}
</div>
@endsection