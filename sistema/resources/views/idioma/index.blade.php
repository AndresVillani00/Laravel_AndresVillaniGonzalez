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

<a href="{{ url('idioma/create') }}" class="btn btn-outline-secondary">Registrar nuevo idioma</a>
<br>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Idioma</th>
            <th>Nivel</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach($idiomas as $idioma)
        <tr>
            <td>{{ $idioma->id }}</td>
            <td>{{ $idioma->Idioma }}</td>
            <td>{{ $idioma->Nivel }}</td>
            <td><a href="{{ url('/idioma/'.$idioma->id.'/edit') }}" class="btn btn-info">
                    Editar
                <a>
            
            
            <form action="{{ url('/idioma/'.$idioma->id) }}" class="d-inline" method="post">
            @csrf 
            {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres Borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $idiomas->links() !!}
</div>
@endsection
