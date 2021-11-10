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
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand mb-0 h1" href="{{url('reporte/')}}">Mis reportes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <div class="navbar-nav justify-items-center">
                    <a href="{{url('reporte_diagnostico/')}}" class="nav-link" >Reporte Diagnostico</a>
                    <a class="nav-link" href="#">Reporte de Avance Programatico</a>
                    <a class="nav-link" href="#">Reporte de Avance Academico</a>
                    <a class="nav-link" href="#">Reporte Departamental</a>
                    <a class="nav-link" href="#">Reporte Final</a>
                </div>
            </div>
          </nav>
    {{-- Barra de navegación  --}}

    {{-- Tabla principal --}}
    <div class="bg-white ">
        <div class="m-4 justify-content-lg-around">
            <form class="form-inline my-2 my-lg-0" style="padding-top: 25px; padding-bottom: 10px">
                <input class="form-control mr-sm-2" style="width: 80%; padding-left: 20px" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="col-sm-12  row-sm-12">
            <table class="table table-responsive table-light col-12 table-striped">
                <thead class="bg-white">
                    <tr>
                        <th>Fecha de elaboración</th>
                        <th>Tipo de reporte</th>
                        <th>Carrera</th>
                        <th>Asignatura</th>
                        <th>Grado Grupo</th>
                        <th>Turno</th>
                        <th>Acciones</th>
                        <th>Descargar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportes as $reporte)
                    <tr>
                        <td>{{$reporte->created_at}}</td>
                        <td>{{$reporte->tipoReporte}}</td>
                        <td>{{$reporte->carrera}}</td>
                        <td>{{$reporte->asignatura}}</td>
                        <td>{{$reporte->grado}} {{$reporte->grupo}}</td>
                        <td>{{$reporte->turno}}</td>
                        <td>
                            <a href="{{url('/reporte/'.$reporte->id.'/edit') }}" class="btn btn-warning">
                                Editar
                            </a> 
                            <form action="{{ url('/reporte/'.$reporte->id) }}" class="d-inline" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                            <input type="submit" onclick="return confirm('¿Deseas borrar este reporte?')" 
                            value="Borrar" class="btn btn-danger">
                            </form>
                        </td>
                        <td>
                            <a  class="btn btn-primary" href="{{url('/downloadPDF')}}">Descargar</a>
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
