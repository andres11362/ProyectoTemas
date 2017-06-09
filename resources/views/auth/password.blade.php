@extends('layout.admin')

@section('content')
    @if (session('status'))
        <p class="alert alert-success">{{ session('status') }}</p>
    @endif
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Bienvenido</h3>
                <p>Ingresa tu correo para solicitar la recuperacion de contraseña</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-question" aria-hidden="true"></i>
            </div>
        </div>

        <div class="form-bottom">
            {!!Form::open(['url' => '/password/email']) !!}
                <div class="form-group">
                    {!!Form::label('email:', 'Correo electronico')!!}
                    {!!Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Ingresa tu correo electronico' ]) !!}
                </div>
                {!! Form::submit('Enviar datos', ['class' => 'btn btn-info btn-lg', 'id' => 'login']) !!}
                <br>
                <br>
                <div class="link-center">
                    {!! link_to_route('auth.login', $title = 'Volver', $parameters = '', $attributes = ['class' => 'btn btn-default']) !!}
                </div>
            {!!Form::close() !!}
        </div>
    </div>
@endsection