@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/idioma/'.$idioma->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
    @include('idioma.form',['modo'=>'Editar'])
</form>
</div>
@endsection
