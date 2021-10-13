@extends('layouts.light')
@section('content')

<div class="container">
    
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        @endif
        
    <table class="table table-light">
        <thead class="thead-dark">
            <tr>
                <th>Datos docente</th>
                <th>Menu de reportes</th>
            </tr>
        </thead>
        <tbody>
            {{-- <p>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$docente->imagen}}" width="100px" alt="imagenDocente">
                {{-- {{$docente->imagen}} --}}
            {{-- </p> --}} 
            <td>
                {{-- <h5>{{$docentes->name}}</h5>
                <h5>{{$docentes->email}}</h5> --}}
                <h6>ID {{$users->id}}</h6>
                <h6>Nombre {{$users->name}}</h6>
                <h6>Correo {{$users->email}}</h6>
                <a href="{{url('/docente/'.$users->id.'/edit') }}" class="btn btn-warning">
                    Editar Perfil
                </a> 
            </td>
            <td>
                Avance de competencias
            </td>
            
        </tbody>
    </table>
    <div style="">
        <div style="display: flex;justify-content: space-between;align-content: center center;background-color: #343a40; padding: 5px; color: white">
            
            <div>
                <h4>Ultimos reportes</h4>
            </div>
            <div>
                <a href="{{url('reporte/create')}}" class="btn btn-success" >+ Crear nuevo reporte</a>
                <a  class="btn btn-primary" href="{{url('/downloadPDF')}}">Ver todos los reportes</a>
            </div>
            
        </div>
        <table class="table table-dark">
            <thead class="thead-dark">
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
                @foreach ($reportes as $reporte)
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
                        <input type="submit" onclick="return confirm('¿Deseas borrar este usuario?')" 
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

</div>
@endsection