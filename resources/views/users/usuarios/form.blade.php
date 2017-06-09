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
<div class="form-group">
    {!! Form::label('rol', 'Rol') !!}
    {!! Form::select('rol', ['Admin' => 'Administrador', 'Docen' => 'Docente', 'Estud' => 'Estudiante'],null,['id' => 'rol', 'class' => 'form-control', 'placeholder' => 'Selecciona un rol']) !!}
</div>
<div class="form-group">
</div>