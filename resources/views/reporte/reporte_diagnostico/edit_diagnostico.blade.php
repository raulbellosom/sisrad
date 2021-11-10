@extends('layouts.light')

@section('content')
<div class="container">
<form action="{{url('/reporte_diagnostico/'.$reporte_diagnostico->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reporte.reporte_diagnostico.form_diagnostico',['modo'=>'Editar'])
</form>

</div>
@endsection