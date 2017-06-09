@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Edite sus datos</h1>
    </div>
    {!! Form::model($user, ['route' => ['usuario.update', $user], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('username', 'Usuario') !!}
                {!! Form::number('username',null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Ingresa el identificador del usuario']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombres', 'Nombres') !!}
                {!! Form::text('nombres',null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Ingresa los nombres del usuario']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::email('email',null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingresa el correo del usuario']) !!}
            </div>
        {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection