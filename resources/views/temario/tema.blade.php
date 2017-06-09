@extends('layout.user')

@section('content')
    <div class="page-header">
        <h1>{{$tema->titulo}}</h1>
    </div>
    <div class="col-md-12">
        <p class="text-justify">{{$tema->descripcion}}</p>
    </div>
        {!! link_to_route('temario.inicio',$title = 'Volver', $parameters = null, $attributes = ['class' => 'btn btn-default'] ) !!}
    <br>
    <br>
@endsection