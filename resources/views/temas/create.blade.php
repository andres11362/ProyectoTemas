@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Crear nuevo tema</h1>
    </div>
    {!! Form::open(['route' => 'temas.store', 'method' => 'post', 'files' => true, 'id' => 'create-form']) !!}
    <div class="col-md-12">
        <fieldset>
            <legend>Tema</legend>
            <div class="form-group">
                {!! Form::label('titulo', 'Titulo: ') !!}
                {!! Form::text('titulo', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa el titulo del tema', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion: ') !!}
                {!! Form::textarea('descripcion', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa la descripcion del tema', 'required' => 'required']) !!}
            </div>
            <input id="numero" name="numero" hidden value="1" />
            <input id="subitems" name="subitems" hidden value="0" />
        </fieldset>
    </div>
    <div id="subthemes"></div>
    <br>
    <div class="col-md-12 text-center">
        <button id="nuevo" class="btn btn-info">Nuevo subtema</button>
        <button id="clonar" class="btn btn-info hidden">Nuevo subtema</button>
        <button id="remover" class="btn btn-danger hidden">Quitar subtema</button>
        {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    <div class="clearfix"></div>
@endsection

@section('scripts')
    {!! Html::script('js/Temas/new.js') !!}
    {!! Html::script('js/Temas/subtemas.js') !!}
@endsection