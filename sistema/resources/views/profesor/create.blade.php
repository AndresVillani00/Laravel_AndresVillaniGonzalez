@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/profesor') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('profesor.form',['modo'=>'Crear'])
    
</form>
</div>
@endsection
