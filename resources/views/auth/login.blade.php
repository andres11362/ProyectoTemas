@extends('layout.admin')

@section('content')
    @include('alerts.login')
    <br>
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Bienvenido</h3>
                <p>Por favor ingresa tus credenciales para entrar</p>
            </div>
           <div class="form-top-right">
                <i class="fa fa-key">

                </i>
           </div>
        </div>

        <div class="form-bottom">
        {!!Form::open(['route' => 'auth.login', 'method' => 'POST']) !!} <!--inicio del formulario mediante el uso de laravel collective-->
            <div class="form-group">
                {!!Form::label('username:', 'Usuario')!!}
                {!!Form::text('username',null,['class' => 'form-control', 'placeholder' => 'Ingresa tu usuario' ]) !!}
            </div>
            <div class="form-group">
                {!!Form::label('password:', 'Contraseña')!!}
                {!!Form::password('password',['class' => 'form-control', 'placeholder' => 'Ingresa tu contraseña' ]) !!}
            </div>
            {!! Form::submit('Acceder', ['class' => 'btn btn-info btn-lg', 'id' => 'login']) !!}
            <br>
            <br>
            <div class="link-center">
                {!! link_to('password/email', $title = '¿Has olvidado tu contraseña?', $attributes = ['class' => 'btn btn-link']) !!}
            </div>
            {!!Form::close() !!}
        </div>


    </div>
@endsection