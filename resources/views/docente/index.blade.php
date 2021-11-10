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
        <div class="col-sm-12  row-sm-12">
            <table class="table table-responsive col-12 ">
                <thead>
                    <tr>
                        <th>Datos docente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>
                                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$users->imagen}}" width="100px" alt="imagenDocente">
                                {{$users->imagen}}
                            </p>
                            <h6>ID {{$users->id}}</h6>
                            <h6>Nombre {{$users->name}}</h6>
                            <h6>Correo {{$users->email}}</h6>
                            <a href="{{url('/docente/'.$users->id.'/edit') }}" class="btn btn-outline-primary">
                                Editar Perfil
                            </a> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    {{-- Tabla superior perfil --}}

    {{-- Reportes Index --}}
        {{-- Barra superior --}}
            <div class="mt-5" style="display: flex; justify-content: space-between;align-content: center center; padding: 5px;"> 
                <div>
                    <h4>Ultimos reportes</h4>
                </div>
                <div>
                    <a href="{{url('reporte/index')}}" class="btn btn-outline-success" >Crear nuevo reporte</a>
                    <a href="{{url('/downloadPDF')}}" class="btn btn-outline-primary" >Ver todos los reportes</a>
                </div>
            </div>
        {{-- Barra superior --}}

        {{-- Tabla reportes index  --}}
            <div>
                <table class="table table-responsive table-light col-12 table-striped">
                    <thead class="bg-white">
                        <tr>
                            <th>Fecha de elaboración</th>
                            <th>Tipo de reporte</th>
                            <th>Carrera</th>
                            <th>Asignatura</th>
                            <th>Grado</th>
                            <th>Grupo</th>
                            <th>Turno</th>
                            <th>Acciones</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reporte_diagnostico as $reporte)
                        <tr>
                            <td>{{$reporte->created_at}}</td>
                            <td>{{$reporte->tipoReporte}}</td>
                            <td>{{$reporte->carrera}}</td>
                            <td>{{$reporte->asignatura}}</td>
                            <td>{{$reporte->grado}}</td>
                            <td>{{$reporte->grupo}}</td>
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
                <div style="display:flex; justify-content: center">
                    {!! $reporte_diagnostico->links() !!}
                </div> 
            </div>
        {{-- Tabla reportes index  --}}
    {{-- Reportes Index --}}
    
</div>
{{-- Container --}}
@endsection