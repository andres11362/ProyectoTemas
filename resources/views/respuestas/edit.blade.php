@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Editar las respuestas</h1>
    </div>

    <div class="text-center">
        <h4>Pregunta: {{ $pregunta->enunciado }}</h4>
    </div>
    {!! Form::model($respuesta, [ 'route' => [ 'respuestas.update', $respuesta->id ] , 'method' => 'PUT'] ) !!}
        <div class="form-group">
            {!! Form::label('respuesta1', 'Respuesta 1: ') !!}
            {!! Form::text('respuesta1', null, ['id' => 'respuesta1', 'class' => 'form-control', 'placeholder' => 'Ingresa la primera respuesta', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('respuesta2', 'Respuesta 2: ') !!}
            {!! Form::text('respuesta2', null, ['id' => 'respuesta2', 'class' => 'form-control', 'placeholder' => 'Ingresa la segunda respuesta', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('respuesta3', 'Respuesta 3: ') !!}
            {!! Form::text('respuesta3', null, ['id' => 'respuesta3', 'class' => 'form-control', 'placeholder' => 'Ingresa la tercera respuesta', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('respuesta4', 'Respuesta 4: ') !!}
            {!! Form::text('respuesta4', null, ['id' => 'respuesta4', 'class' => 'form-control', 'placeholder' => 'Ingresa la cuarta respuesta', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('respuesta_correcta', 'Respuesta correcta: ') !!}
            {!! Form::selectRange('respuesta_correcta', 1,4 ,null, ['id' => 'rcorrecta', 'class' => 'form-control', 'placeholder' => 'Seleccione el valor de la respuesta',  'required' => 'required']) !!}
        </div>
        {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection