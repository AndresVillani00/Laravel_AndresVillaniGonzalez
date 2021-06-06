@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/idioma') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('idioma.form',['modo'=>'Crear'])
    
</form>
</div>
@endsection
