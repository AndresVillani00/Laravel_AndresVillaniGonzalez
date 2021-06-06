@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/profesor/'.$profesor->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
    @include('profesor.form',['modo'=>'Editar'])
</form>
</div>
@endsection
