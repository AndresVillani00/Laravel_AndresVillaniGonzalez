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

<a href="{{ url('profesor/create') }}" class="btn btn-outline-secondary">Registrar nuevo profesor</a>
<br>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach($profesores as $profesor)
        <tr>
            <td>{{ $profesor->id }}</td>
            <td>{{ $profesor->Nombre }}</td>
            <td>{{ $profesor->Apellido }}</td>
            <td>{{ $profesor->Email }}</td>
            <td>{{ $profesor->Telefono }}</td>
            <td>{{ $profesor->Direccion }}</td>
            <td><a href="{{ url('/profesor/'.$profesor->id.'/edit') }}" class="btn btn-info">
                    Editar
                <a>
            
            
            <form action="{{ url('/profesor/'.$profesor->id) }}" class="d-inline" method="post">
            @csrf 
            {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres Borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $profesores->links() !!}
</div>
@endsection
