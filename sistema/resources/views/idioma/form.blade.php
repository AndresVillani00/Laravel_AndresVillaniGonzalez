<h2>{{ $modo }} Idioma</h2>

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
    <label for="Idioma">   Idioma   </label>
    <input type="text" class="form-control" name="Idioma" value="{{ isset($idioma->Idioma)?$idioma->Idioma:old('Idioma') }}" id="Idioma">
</div>

<div class="form-group">
    <label for="Nivel">   Nivel   </label>
    <input type="text" class="form-control" name="Nivel" value="{{ isset($idioma->Nivel)?$idioma->Nivel:old('Nivel') }}" id="Nivel">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">

<a href="{{ url('idioma/') }}"  class="btn btn-primary">Volver</a>

  <br>
