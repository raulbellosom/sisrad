<div class="d-flex justify-content-between">
    <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
        Regresar
    </a>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
        </svg>
        {{$modo}} reporte
    </button>
</div>

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
                {{$modo}} Reporte Diagnostico
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
                        <input id="asignatura" class="form-control mr-2" name="asignatura" type="text" placeholder="Asignatura"
                            value="{{ isset($reporte_diagnostico->asignatura) ? $reporte_diagnostico->asignatura:old('asignatura') }}"
                        >
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="tipo_evaluacion" class="col-form-label text-md-right pr-2">Tipo de evaluacón</label>
                        <input id="tipo_evaluacion" class="form-control mr-2" name="tipo_evaluacion" type="text" placeholder="Tipo de evaluación"
                            value="{{ isset($reporte_diagnostico->tipo_evaluacion) ? $reporte_diagnostico->tipo_evaluacion:old('tipo_evaluacion') }}"
                        >
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="cantidad_alumnos" class="col-form-label text-md-right pr-2">Alumnos evaluados</label>
                        <input id="cantidad_alumnos" class="form-control mr-2" name="cantidad_alumnos" type="number" placeholder="Número de alumnos" min="1" pattern="^[0-9]+"
                            value="{{ isset($reporte_diagnostico->cantidad_alumnos) ? $reporte_diagnostico->cantidad_alumnos:old('cantidad_alumnos') }}" 
                        >
                    </div>
                </div>
                <div class="mb-4 col-md-12 mw-100 d-flex justify-content-around">
                    <div class="form-group d-flex align-items-center">
                        <label for="carrera" class="col-form-label text-md-right pr-2">Carrera</label> 
                        <input id="carrera" class="form-control mr-2" name="carrera" type="text" placeholder="carrera"
                            value="{{ isset($reporte_diagnostico->carrera) ? $reporte_diagnostico->carrera:old('carrera') }}"
                        >
                    </div>
                    <div class="form-group form-group d-flex align-items-center">
                        <label for="grado" class="col-form-label text-md-right pr-2">Grado</label>
                        <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="Grado" min="0" max="9" pattern="^[0-9]+"
                            value="{{ isset($reporte_diagnostico->grado) ? $reporte_diagnostico->grado:old('grado') }}"
                        >
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="grupo" class="col-form-label text-md-right pr-2">Grupo</label> 
                        <input id="grupo" class="form-control mr-2" name="grupo" type="text" placeholder="Grupo"
                            value="{{ isset($reporte_diagnostico->grupo) ? $reporte_diagnostico->grupo:old('grupo') }}"
                        >
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="turno" class="col-form-label text-md-right pr-2">Turno</label> 
                        <select id="turno" class="form-control" name="turno"
                            value="{{ isset($reporte_diagnostico->turno) ? $reporte_diagnostico->turno:old('turno') }}"
                        >
                            <option value="{{ isset($reporte_diagnostico->turno) ? $reporte_diagnostico->turno:old('turno') }}" hidden>{{ isset($reporte_diagnostico->turno) ? $reporte_diagnostico->turno:old('turno') }}</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
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
            <div class="d-flex justify-content-end">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                        </svg>
                        {{$modo}} reporte
                    </button>
                </div>
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