@extends('layout.admin')

@section('content')
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>Bienvenido</h3>
                <p>Ingresa tus datos para recuperar tu contraseña</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-exchange" aria-hidden="true"></i>
            </div>
        </div>

        <div class="form-bottom">
            {!!Form::open(['url' => '/password/reset']) !!}
                <div class="form-group">
                    {!!Form::hidden('token',$token, null) !!}
                </div>
                <div class="form-group">
                    {!!Form::label('email', 'Correo electronico: ')!!}
                    {!!Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Ingresa tu correo electronico', 'value' => "{{old('email')}}" ]) !!}
                </div>
                <div class="form-group">
                    {!!Form::label('password', 'Nueva contraseña: ')!!}
                    {!!Form::password('password',['class' => 'form-control', 'placeholder' => 'Ingresa tu nueva contraseña']) !!}
                </div>
                <div class="form-group">
                    {!!Form::label('password_confirmation', 'Confirmar contraseña: ')!!}
                    {!!Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => 'Ingresa de nuevo tu nueva contraseña']) !!}
                </div>
                {!! Form::submit('Reestablecer contraseña', ['class' => 'btn btn-info btn-lg', 'id' => 'login']) !!}
                <br>
                <br>
            {!!Form::close() !!}
        </div>
    </div>
@endsection