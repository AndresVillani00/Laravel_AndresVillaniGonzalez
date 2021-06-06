<h2>{{ $modo }} Profesor</h2>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
               <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif

<div class="form-group">
    <label for="Nombre">   Nombre   </label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($idioma->Nombre)?$idioma->Nombre:old('Nombre') }}" id="Idioma">
</div>

<div class="form-group">
    <label for="Apellido">   Apellido   </label>
    <input type="text" class="form-control" name="Apellido" value="{{ isset($idioma->Apellido)?$idioma->Apellido:old('Apellido') }}" id="Apellido">
</div>

<div class="form-group">
    <label for="Email">   Correo Electronico   </label>
    <input type="text" class="form-control" name="Email" value="{{ isset($idioma->Email)?$idioma->Email:old('Email') }}" id="Nivel">
</div>

<div class="form-group">
    <label for="Telefono">   Telefono   </label>
    <input type="text" class="form-control" name="Telefono" value="{{ isset($idioma->Telefono)?$idioma->Telefono:old('Telefono') }}" id="Telefono">
</div>

<div class="form-group">
    <label for="Direccion">   Direccion   </label>
    <input type="text" class="form-control" name="Direccion" value="{{ isset($idioma->Direccion)?$idioma->Direccion:old('Direccion') }}" id="Direccion">
</div>



<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a href="{{ url('profesor/') }}"  class="btn btn-primary">Volver</a>

  <br>
