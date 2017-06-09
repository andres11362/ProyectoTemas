@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Editar subtema</h1>
    </div>
    {!! Form::model($subtema, ['route' => ['subtemas.update', $subtema->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo: ') !!}
            {!! Form::text('titulo', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa el titulo del tema', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('texto', 'Descripcion: ') !!}
            {!! Form::textarea('texto', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa la descripcion del tema', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!!Form::label('tema_id','Tema:')!!}
            {!!Form::select('tema_id',$theme,null,['class' => 'form-control', 'required' => 'required'])!!}
        </div>
        <div class="form-group">
            {!! Form::file('imagen') !!}
        </div>
    {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection