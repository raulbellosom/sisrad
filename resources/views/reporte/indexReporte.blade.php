@extends('layouts.app')
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
        
    <a href="{{url('docente/create')}}" class="btn btn-success" >Registrar nuevo docente</a>
    <br>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Numero de telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($docentes as $docente)
            <tr>
                <td>{{$docente->id}}</td>
                <td>
                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$docente->imagen}}" width="100px" alt="imagenDocente">
                    {{-- {{$docente->imagen}} --}}
                </td>
                <td>{{$docente->nombre}}</td>
                <td>{{$docente->apellidoPaterno}}</td>
                <td>{{$docente->apellidoMaterno}}</td>
                <td>{{$docente->correo}}</td>
                <td>{{$docente->telefono}}</td>
                <td>
                    <a href="{{url('/docente/'.$docente->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a> 
                    <form action="{{ url('/docente/'.$docente->id) }}" class="d-inline" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Deseas borrar este reporte?')" 
                    value="Borrar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $docentes->links() !!}

</div>
@endsection
