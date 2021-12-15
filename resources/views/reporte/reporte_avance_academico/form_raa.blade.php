<div class="d-flex justify-content-between m-2">
    <a class="btn btn-outline-danger" href="{{url('reporte_avance_academico/')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
        Regresar
    </a>
    <button class="btn btn-outline-success" type="submit">
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
            <div class="bg-primary p-4 mb-1 mt-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                {{$modo}} Reporte Avance Academico de Alumnos
            </div>
        {{-- Titulo --}}

        {{-- Información General --}}
            <div class="mb-4 pb-4 bg-white">
                <div class="bg-primary p-4 mb-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Información General del Reporte
                </div>
                <div class="m-2 row justify-content-between justify-content-md-around ">
                    <div class="form-group col-6 col-sm-6">
                        <label for="asignatura" class="col-form-label font-weight-bold text-md-right pr-2">Asignatura</label>
                        <input id="asignatura" class="form-control mr-2" name="asignatura" type="text" placeholder="Asignatura"
                            value="{{ isset($reporte_diagnostico->asignatura) ? $reporte_diagnostico->asignatura:old('asignatura') }}"
                        >
                    </div>
                    <div class="form-group col-6 col-sm-6">
                        <label for="carrera" class="col-form-label font-weight-bold text-md-right pr-2">Carrera</label> 
                        <input id="carrera" class="form-control mr-2" name="carrera" type="text" placeholder="carrera"
                            value="{{ isset($reporte_diagnostico->carrera) ? $reporte_diagnostico->carrera:old('carrera') }}"
                        >
                    </div>
                    <div class="form-group col-6 col-sm-6 col-md-3">
                        <label for="grado" class="col-form-label font-weight-bold text-md-right pr-2">Grado</label>
                        <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="Grado" min="0" max="9" pattern="^[0-9]+"
                            value="{{ isset($reporte_diagnostico->grado) ? $reporte_diagnostico->grado:old('grado') }}"
                        >
                    </div>
                    <div class="form-group col-6 col-sm-6 col-md-3">
                        <label for="grupo" class="col-form-label font-weight-bold text-md-right pr-2">Grupo</label> 
                        <input id="grupo" class="form-control mr-2" name="grupo" type="text" placeholder="Grupo"
                            value="{{ isset($reporte_diagnostico->grupo) ? $reporte_diagnostico->grupo:old('grupo') }}"
                        >
                    </div>
                    <div class="form-group col-6 col-sm-6 col-md-3">
                        <label for="turno" class="col-form-label font-weight-bold text-md-right pr-2">Turno</label> 
                        <select id="turno" class="form-control" name="turno"
                            value="{{ isset($reporte_diagnostico->turno) ? $reporte_diagnostico->turno:old('turno') }}"
                        >
                            <option value="{{ isset($reporte_diagnostico->turno) ? $reporte_diagnostico->turno:old('turno') }}" hidden>{{ isset($reporte_diagnostico->turno) ? $reporte_diagnostico->turno:old('turno') }}</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                    </div>
                    <div class="form-group col-6 col-sm-6 col-md-3">
                        <label for="total_alumnos" class="col-form-label font-weight-bold text-md-left pr-2">Total Alumnos</label>
                        <input id="total_alumnos" class="form-control mr-2" name="total_alumnos" type="number" placeholder="Total de alumnos" min="1" pattern="^[0-9]+"
                            value="{{ isset($raa->total_alumnos) ? $raa->total_alumnos:old('cantidad_alumnos') }}" 
                        >
                    </div>
                    <div class="form-group col-6 col-sm-6">
                        <label for="total_alumnos_ausentes" class="col-form-label font-weight-bold text-md-left pr-2">No. de alumnos que desde el inicio del semestre no se presentaron a las clases </label>
                        <input id="total_alumnos_ausentes" class="form-control mr-2" name="total_alumnos_ausentes" type="number" placeholder="Alumnos ausentes" min="1" pattern="^[0-9]+"
                            value="{{ isset($raa->total_alumnos_ausentes) ? $raa->total_alumnos_ausentes:old('total_alumnos_ausentes') }}" 
                        >
                    </div>
                    <div class="form-group col-6 col-sm-6">
                        <label for="total_alumnos_desertados" class="col-form-label font-weight-bold text-md-left pr-2">No. de alumnos que desertaron en el periodo</label>
                        <input id="total_alumnos_desertados" class="form-control mr-2" name="total_alumnos_desertados" type="number" placeholder="Alumnos desertados" min="1" pattern="^[0-9]+"
                            value="{{ isset($raa->total_alumnos_desertados) ? $raa->total_alumnos_desertados:old('total_alumnos_desertados') }}" 
                        >
                    </div>
                
                <div class="mw-100 d-flex justify-content-around">
                    <div class="d-flex align-items-center">
                        <input class="form-control " type="hidden" name="nombre_reporte"
                        value="Reporte Avance Académico" id="nombre_reporte"
                        >
                    </div>
                    <div class="d-flex align-items-center">
                        <input class="form-control " type="hidden" name="status"
                        value="1" id="status"
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


        {{-- Botones  --}}
            <div class="m-2 d-flex justify-content-end justify-content-md-between  ">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_avance_academico/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div>
                    <button class="btn btn-outline-success" type="submit">
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