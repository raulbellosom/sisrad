@extends('layouts.light')

@section('content')
<div class="container">
<form action="{{url('/docente')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('docente.form',['modo'=>'Crear', 'id'=>Auth::user()->id])
</form>

</div>
@endsection