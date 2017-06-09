@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Crear usuario</h1>
    </div>
    {!! Form::open(['route' => 'usuarios.store', 'method' => 'post', 'id' => 'create-form']) !!}
        @include('users.usuarios.form')
    {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection