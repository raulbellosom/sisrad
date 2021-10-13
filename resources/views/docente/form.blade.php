
<h1>{{$modo}} docente</h1>

@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
@endif
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" 
    value="{{ isset($docente->nombre) ? $docente->nombre:old('nombre') }}" id="nombre">
</div>
<div class="form-group">
    <label for="apellidoPaterno">Apellido Paterno</label>
    <input type="text" class="form-control" name="apellidoPaterno" 
    value="{{ isset($docente->apellidoPaterno) ? $docente->apellidoPaterno:old('apellidoPaterno')}}" id="apellidoPaterno">
</div>
<div class="form-group">
    <label for="apellidoMaterno">Apellido Materno</label>
    <input type="text" class="form-control" name="apellidoMaterno" 
    value="{{isset($docente->apellidoMaterno) ? $docente->apellidoMaterno:old('apellidoMaterno')}}" id="apellidoMaterno">
</div>
<div class="form-group">
    <label for="correo">Correo</label>
    <input type="text" class="form-control" name="correo" 
    value="{{ isset($docente->correo) ? $docente->correo:old('correo') }}" id="correo">
</div>
<div class="form-group">
    <label for="telefono">Número de telefono</label>
    <input type="tel" class="form-control" name="telefono" 
    value="{{ isset($docente->telefono) ? $docente->telefono:old('telefono') }}" id="telefono">
</div>

<div class="form-group">
    <label for="imagen">Imagen de perfil</label>
    <br>
    @if(isset($docente->imagen))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$docente->imagen}}" width="100px" alt="imagenDocente">
    @endif
    <input type="file" class="form-control" name="imagen" value="" id="imagen">
</div>
<div class="form-group"  >
    <input type="hidden" class="form-control" name="userid" 
    value="{{ $id }}" id="userid">
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a  class="btn btn-primary" href="{{url('docente/')}}">Regresar</a>