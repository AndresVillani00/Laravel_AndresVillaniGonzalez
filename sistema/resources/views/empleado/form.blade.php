<h2>{{ $modo }} Empleado</h2>

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
    <input type="text" class="form-control" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="Nombre">

    <label for="Apellido">   Apellido   </label>  
    <input type="text" class="form-control" name="Apellido" value="{{ isset($empleado->Apellido)?$empleado->Apellido:old('Apellido') }}" id="Apellido">
</div>

<div class="form-group">
    <label for="Email">   Correo Electronico   </label>
    <input type="email" class="form-control" name="Email" value="{{ isset($empleado->Email)?$empleado->Email:old('Email') }}" id="Email">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a href="{{ url('empleado/') }}"  class="btn btn-primary">Volver</a>

  <br>
