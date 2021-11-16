@extends('layouts.light')
@section('content')
{{-- Container --}}
<div class="container">
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        @endif
    {{-- Tabla superior perfil --}}
        <div class="col-sm-12  row-sm-12 mt-4">
            <div class="mt-5 ml-4 mr-4 d-flex justify-content-between"> 
                <div>
                    <h5 class="font-weight-bold text-uppercase">Información del usuario</h5>
                </div>
                <div>
                    {{-- <a href="{{url('/infoUser/'.$users->id.'/edit') }}" class="btn btn-outline-primary m-auto"> --}}
                    @if($info_user=='1')
                        <a href="{{url('/infoUser/'.$users->id.'/edit') }}" class="btn btn-outline-primary m-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Editar Perfil
                        </a>
                    @else
                        <a href="{{url('docente/create') }}" class="btn btn-outline-primary m-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Crear Perfil
                        </a>
                    @endif
                    
                    {{-- <p>{{$info_user}}</p> --}}
                    
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <table class="table table-light">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th colspan="2" class="text-center">Datos docente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td class="text-center" rowspan="2">
                                <p>
                                    @if ($imagen!=null)
                                        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$imagen}}" width="100px" alt="imagenUsuario">
                                    @else
                                        <img class="img-thumbnail img-fluid" src="{{asset('storage/uploads/7PiW8C4MYaGWIpFxZgZVMKFdd0uU2mFe4Quj26vJ.png')}}" width="100px" alt="imagenUsuario">
                                    @endif
                                    
                                    
                                </p> 
                                Nombre <p class="font-weight-bold">{{$users->name}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Correo electronico {{$users->email}}</p> 
                                <p>Tipo de usuario 
                                @if ($users->typeUser == '1')
                                    Docente
                                @endif
                                @if ($users->typeUser == '2')
                                    Administrativo
                                @endif
                                @if ($users->typeUser == '3')
                                    Docente - Administrativo
                                @endif
                                @if ($users->typeUser == '4')
                                    Usuario Maestro
                                @endif  
                                </p> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    {{-- Tabla superior perfil --}}

    {{-- Reportes Index --}}
        
        <div class="col-sm-12  row-sm-12 mt-4">
            {{-- Barra superior --}}
                <div class="mt-5 ml-4 mr-4 d-flex justify-content-between"> 
                    <div>
                        <h5 class="font-weight-bold text-uppercase">Ultimos reportes</h5>
                    </div>
                    <div>
                        <a href="{{url('reporte/index')}}" class="btn btn-outline-primary" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                            </svg>
                            Ver todos los reportes
                        </a>
                        {{-- <a href="{{url('/downloadPDF')}}" class="btn btn-outline-primary" >Ver todos los reportes</a> --}}
                    </div>
                </div>
            {{-- Barra superior --}}

            {{-- Tabla reportes index  --}}
                <div class="col-sm-12  row-sm-12">
                    <table class="table table-responsive table-light   table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Fecha de elaboración</th>
                                <th>Tipo de reporte</th>
                                <th>Carrera</th>
                                <th>Asignatura</th>
                                <th>Grado Grupo</th>
                                {{-- <th>Turno</th> --}}
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportes as $reporte)
                            <tr>
                                <td>{{$reporte->created_at}}</td>
                                <td>{{$reporte->nombre_reporte}}</td>
                                <td>{{$reporte->carrera}}</td>
                                <td>{{$reporte->asignatura}}</td>
                                <td>{{$reporte->grado}} {{$reporte->grupo}}</td>
                                {{-- <td>{{$reporte->turno}}</td> --}}
                                <td>
                                    <a href="{{url('/reporte_diagnostico/'.$reporte->id.'/edit') }}" class="btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        Editar
                                    </a> 
                                    <a  class="btn btn-success" href="{{url('/downloadPDF')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                        </svg>
                                        Descargar
                                    </a>
                                    <form action="{{ url('/reporte/'.$reporte->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('¿Deseas borrar este reporte?')" 
                                    value="Borrar" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                        Borrar
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach      
                        </tbody>
                    </table>
                </div>
            {{-- Tabla reportes index  --}}
        </div>
    {{-- Reportes Index --}}
    
</div>
{{-- Container --}}
@endsection