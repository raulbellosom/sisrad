@extends('layouts.light')  
@section('content')

<div class="container">
        {{-- Codigo para recepcion de un mensaje --}}
            @if(Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        {{-- Codigo para recepcion de un mensaje --}}

    {{-- Barra de navegación  --}}
        <nav class="navbar navbar-expand-xl navbar-dark bg-secondary">
            <a class="navbar-brand" href="{{url('reporte/')}}">Mis reportes</a>
            <button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <div class=" nav navbar-nav">
                    <a href="{{url('reporte_diagnostico/')}}" class="nav-link active text-info h6 mb-0" >Reporte Diagnostico</a>
                    <a class="nav-link text-light  h6 mb-0" href="#">Reporte de Avance Programatico</a>
                    <a class="nav-link text-light h6 mb-0" href="#">Reporte de Avance Academico</a>
                    <a class="nav-link text-light  h6 mb-0" href="#">Reporte Departamental</a>
                    <a class="nav-link text-light h6 mb-0" href="#">Reporte Final</a>
                </div>
            </div>
        </nav>
    {{-- Barra de navegación  --}}

    {{-- Tabla principal --}}
        

        <div class="bg-white">
            <div class="m-4 justify-content-lg-around">
                <form class="row m-4 d-flex justify-content-between pt-4 ">
                    <input class="form-control col-7 col-sm-6 col-md-8 col-lg-6 mb-1" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-primary col-4 col-sm-4 col-md-3 col-lg-2 mb-1" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        Buscar
                    </button>
                    <a href="reporte_diagnostico/create" class="btn btn-outline-success col-12 col-sm-12 col-md-12 col-lg-3 mb-1"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Crear Reporte Diagnostico
                    </a>
                </form>
            </div>
            <div class="col-sm-12 row-sm-12">
                <table class="table table-responsive-sm table-responsive-md table-light table-striped">
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
                            <td>{{Str::substr($reporte->created_at, 0, 10)}}</td>
                            <td>{{$reporte->nombre_reporte}}</td>
                            <td>{{$reporte->carrera}}</td>
                            <td>{{$reporte->asignatura}}</td>
                            <td class="text-center">{{$reporte->grado}} {{$reporte->grupo}}</td>
                            {{-- <td>{{$reporte->turno}}</td> --}}
                            <td class="d-flex justify-content-between">
                                <a href="{{url('/reporte_diagnostico/'.$reporte->id.'/edit') }}" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    Editar
                                </a> 
                                <form action="{{url('/downloadPDF/'.$reporte->id)}}" method="GET">
                                    <button  class="btn btn-success" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                        Descargar
                                    </button>
                                </form>
                                <form action="{{ url('/reporte_diagnostico/'.$reporte->id) }}" method="POST">
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
            <div style="display:flex; justify-content: center">
                {!! $reportes->links() !!}
            </div>
        </div>
    
    {{-- Tabla principal --}}

</div>
@endsection
