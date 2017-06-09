@extends('layout.user')

@section('content')
    <div class="page-header">
        <h1>{{$subtema->titulo}}</h1>
    </div>

    <div class="col-md-12">
        <div class="imagen">
            <img src="../../imagenes/{{$theme->titulo}}/{{$subtema->titulo}}.{{$images->path}}" width="300px" height="300px" class="img-responsive center" />
        </div>
    </div>

    <div class="col-md-12">
        <p class="text-justify">{{$subtema->texto}}</p>
    </div>

    {!! link_to_route('temario.inicio',$title = 'Volver', $parameters = null, $attributes = ['class' => 'btn btn-default'] ) !!}
    <br>
    <br>
@endsection