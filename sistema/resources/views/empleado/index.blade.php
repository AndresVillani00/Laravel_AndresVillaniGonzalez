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

<a href="{{ url('empleado/create') }}" class="btn btn-outline-secondary">Registrar nuevo empleado</a>
<br>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->Apellido }}</td>
            <td>{{ $empleado->Email }}</td>
            <td><a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-info">
                    Editar
                <a>
            
            
            <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
            @csrf 
            {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres Borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection
