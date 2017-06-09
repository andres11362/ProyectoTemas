@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Cambie su contraseña</h1>
    </div>
    {!! Form::open( ['route' => ['usuario.change',], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('current_password', 'Contraseña actual: ') !!}
        {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Ingresa tu contraseña actual']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Nueva contraseña: ') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingresa tu nueva contraseña']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirma tu nueva contraseña']) !!}
    </div>
    {!! Form::submit('Cambiar contraseña', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}


@endsection


