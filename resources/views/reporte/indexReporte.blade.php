@extends('layouts.light')  
@section('content')

<div class="container">
    <a href="{{url('reporte/create')}}" class="btn btn-success" >+ Crear nuevo reporte</a>
        {{-- @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        @endif --}}
        mensaje de prueba
        
    

</div>
@endsection
