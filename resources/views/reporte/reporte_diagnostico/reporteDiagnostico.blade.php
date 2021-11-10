@extends('layouts.light')  

@section('content')
<div class="container">
    {{-- Inicio Formulario Reporte --}}
    <form action="{{url('/reporte_diagnostico')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
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
            <div class="bg-primary p-4 mb-4 mt-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                Reporte Diagnostico
            </div>
        {{-- Titulo --}}

        {{-- Información General --}}
            <div class="mb-4 pb-4 bg-white">
                <div class="bg-primary p-4 mb-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Información General
                </div>
                <div class="mb-4 col-md-12 d-flex justify-content-around">
                    <div class="form-group d-flex align-items-center">
                        <label for="asignatura" class="col-form-label text-md-right pr-2">Asignatura</label>
                        <input id="asignatura" class="form-control" name="asignatura" type="text" placeholder="Asignatura"
                            value="{{ isset($reporte->asignatura) ? $reporte->asignatura:old('asignatura') }}" id="asignatura"
                        >
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tipo-tipo_evaluacion" class="col-form-label text-md-right pr-2">Tipo de evaluacón</label>
                        <input id="tipo_evaluacion" class="form-control" name="tipo_evaluacion" type="text" placeholder="Tipo de evaluación"
                            value="{{ isset($reporte->tipo_evaluacion) ? $reporte->tipo_evaluacion:old('tipo_evaluacion') }}" id="tipo_evaluacion"
                        >
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="total-cantidad_alumnos" class="col-form-label text-md-right pr-2">Alumnos evaluados</label>
                        <input id="cantidad_alumnos" class="form-control" name="cantidad_alumnos" type="number" placeholder="Número de alumnos" min="1" pattern="^[0-9]+"
                            value="{{ isset($reporte->cantidad_alumnos) ? $reporte->cantidad_alumnos:old('cantidad_alumnos') }}" id="cantidad_alumnos"
                        >
                    </div>
                </div>
                <div class="mb-4 mw-100 d-flex justify-content-around">
                    <div class="form-group d-flex align-items-center">
                        <label for="carrera" class="col-form-label text-md-right pr-2">Carrera</label> 
                        <input id="carrera" class="form-control mr-2" name="carrera" type="text" placeholder="Grado">
                    </div>
                    <div class="form-group form-group d-flex align-items-center">
                        <label for="grado" class="col-form-label text-md-right pr-2">Grado</label>
                        <input id="grado" class="form-control mr-2" name="grado" type="text" placeholder="Grado" min="1" max="9" pattern="^[0-9]+">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="grupo" class="col-form-label text-md-right pr-2">Grupo</label> 
                        <input id="grupo" class="form-control mr-2" name="grupo" type="text" placeholder="Grupo">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="turno" class="col-form-label text-md-right pr-2">Turno</label> 
                        <select id="turno" class="form-control" name="turno" id="turno">
                            <option value="" hidden></option>
                            <option value="matutino">Matutino</option>
                            <option value="vespertino">Vespertino</option>
                        </select>
                    </div>
                </div>
                <div class="mw-100 d-flex justify-content-around">
                    <div class="d-flex align-items-center">
                        <input class="form-control " type="hidden" name="nombre_reporte"
                        value="Reporte Diagnostico" id="nombre_reporte"
                        >
                    </div>
                    <div class="d-flex align-items-center">
                        <input class="form-control " type="hidden" name="autor"
                        value="{{ $users->name}}" id="autor"
                        >
                    </div>
                    <div class="d-flex align-items-center">
                        <input class="form-control " type="hidden" name="user_id"
                        value="{{ $users->id}}" id="user_id"
                        >
                    </div>
                    <div class="d-flex align-items-center">
                        <input class="form-control" type="hidden" name="created_at" 
                        {{-- value="{{ date(DATE_COOKIE) }}" id="createAt"> --}}
                        {{date_default_timezone_set("America/Mexico_City")}}
                        value="{{ date('Y-m-d h:i:s') }}" id="created_at"
                        >
                    </div>
                </div>
            </div>
        {{-- Información General --}}

        {{-- Conocimientos y competecias --}}
            {{-- <div class="mb-4 pb-4 bg-white">
                <div class="bg-primary p-4 mb-4 text-center text-light font-weight-bold text-h1 text-uppercase" style="border-top-right-radius: 10px; border-top-left-radius: 10px;">
                    Conocimientos, competencias especificas y/o genericas previas
                </div>
                <div class="mw-100 pl-4 pr-4">
                    <div class="mb-4">
                    Número de competencias a evaluar
                        <select class="ml-2"  style="width: 50px" name="" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="mb-2" style="display: flex;">
                        Competencia 1 
                        <input class="form-control mr-sm-2 w-50 h-50 p-2 ml-2 mr-2" type="text">
                        Nivel Alcanzado 
                        <input class="form-control mr-sm-2 w-25 h-50 p-2 ml-2" type="text">
                    </div>
                    <div class="mb-2" style="display: flex;">
                        Competencia 2 
                        <input class="form-control mr-sm-2 w-50 h-50 p-2 ml-2 mr-2" type="text">
                        Nivel Alcanzado 
                        <input class="form-control mr-sm-2 w-25 h-50 p-2 ml-2" type="text">
                    </div>
                    <div class="mb-2" style="display: flex;">
                        Competencia 3 
                        <input class="form-control mr-sm-2 w-50 h-50 p-2 ml-2 mr-2" type="text">
                        Nivel Alcanzado 
                        <input class="form-control mr-sm-2 w-25 h-50 p-2 ml-2" type="text">
                    </div>
                    <div class="mb-2" style="display: flex;">
                        Competencia 4 
                        <input class="form-control mr-sm-2 w-50 h-50 p-2 ml-2 mr-2" type="text">
                        Nivel Alcanzado 
                        <input class="form-control mr-sm-2 w-25 h-50 p-2 ml-2" type="text">
                    </div>
                </div>
            </div> --}}
        {{-- Conocimientos y competecias --}}

        {{-- Conocimientos y competecias prueba --}}
        
            <div class="mb-4 pb-4 bg-white">
                <div class="bg-primary p-4 mb-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Conocimientos, competencias especificas y/o genericas previas
                </div>
                <div class="mw-100 pl-4 pr-4">
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            <button class="btn btn-primary" id="agregar">Agregar campo</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row clonar">
                                <div class="form-group col-md-10" >
                                    <div style="display: flex">
                                        <label class="mr-4" for="Nombres">Competencia</label>
                                        <input type="text" id="nombre" class="form-control">
                                    </div>
                                    <span class="badge badge-pill badge-danger puntero ocultar" style="cursor: pointer">Eliminar</span>
                                </div>
                                <div class="form-group col-md-2" style="display: flex">
                                    <label class=" mr-4" for="nivel">Nivel</label>
                                    <select class="form-control" id="nivel" id="nivel">
                                        <option value="" hidden></option>
                                        <option value="0">Nulo</option>
                                        <option value="1">Bajo</option>
                                        <option value="2">Aceptable</option>
                                        <option value="3">Bueno</option>
                                    </select>
                                </div>
                            </div>
                            <div id="contenedor"></div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- Conocimientos y competecias prueba --}}
        
        {{-- Plan accion general --}}
            <div class="mb-4 pb-4 bg-white ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción general
                </div>
                <div class="mw-100 mt-4 pl-4 pr-4">
                    <div class="mb-3">
                        Deficiencias 
                        <textarea class="form-control mr-sm-2" id="deficiencia" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        Acciones sugeridas y recursos necesarios 
                        <textarea class="form-control mr-sm-2" id="accion_g" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class="mb-3" >
                        Tiempo de ejecución e impacto en cronograma
                        <textarea class="form-control mr-sm-2" id="tiempo_g" id="" cols="" rows="4"></textarea>
                    </div>
                </div>
            </div>
        {{-- Plan accion general --}}

        {{-- Plan accion particular --}}
            <div class="mb-4 pb-4 bg-white ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción particular
                </div>
                <div class="mw-100 pl-4 pr-4">
                    <div class="mb-2">
                        Nombre del alumno 
                        <textarea class="form-control mr-sm-2" id="tiempo" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class="mb-2">
                        Deficiencias (temas, áreas, otros) 
                        <textarea class="form-control mr-sm-2" id="tiempo" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class="mb-2" >
                        Acción sugerida (academica, psicologica, etc)
                        <textarea class="form-control mr-sm-2" id="tiempo" id="" cols="" rows="4"></textarea>
                    </div>
                </div>
            </div>
        {{-- Plan accion general --}}

        {{-- Botones  --}}
            <div class="float-right ">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Crear reporte">
                <a class="btn btn-outline-danger my-2 my-sm-0" href="{{url('reporte_diagnostico/')}}">Cancelar</a>
            </div>
        {{-- Botones --}}

        
    </form>
    {{-- Fin Formulario Reporte --}}
</div>

{{-- Script campos automaticos --}}

    <script>
        let agregar = document.getElementById('agregar');
        let contenido = document.getElementById('contenedor');

        agregar.addEventListener('click', e =>{
            e.preventDefault();

            let clonado = document.querySelector('.clonar');
            let clon = clonado.cloneNode(true);

            contenido.appendChild(clon).classList.remove('clonar');

            let remover_ocutar = contenido.lastChild.childNodes[1].querySelectorAll('span');
            remover_ocutar[0].classList.remove('ocultar');
        });

        contenido.addEventListener('click', e =>{
            e.preventDefault();
            if(e.target.classList.contains('puntero')){
                let contenedor  = e.target.parentNode.parentNode;
            
                contenedor.parentNode.removeChild(contenedor);
            }
        });
    </script>
{{-- Script campos automaticos --}}
@endsection