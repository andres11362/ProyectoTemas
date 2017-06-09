@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Editar usuario</h1>
    </div>
    {!! Form::model($user, ['route' => ['usuarios.update', $user], 'method' => 'put']) !!}
        @include('users.usuarios.form')
        {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection