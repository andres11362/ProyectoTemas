@extends('layout.user')

@section('content')
    @include('alerts.registros')
    <div class="page-header">
        <h1>Listado de usuarios</h1>
    </div>

    <div class="table-responsive">
        {!! link_to_route('usuarios.create', $title = 'Crear usuario', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
        <br>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <td>Usuario</td>
                <td>Nombre</td>
                <td>Correo</td>
                <td>Rol</td>
                <td>Acciones</td>
            </thead>
            @foreach($users as $user)
            <tbody>
                <td>{{$user->username}}</td>
                <td>{{$user->nombres}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->rol}}</td>
                <td class="actions">
                    {!! link_to_route('usuarios.edit',$title = 'Editar', $parameters = $user->id, $attributes = ['class' => 'btn btn-warning'] ) !!}
                    {!!Form::open(['route'=> ['usuarios.destroy',$user], 'method' => 'DELETE'])!!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tbody>
            @endforeach
        </table>
        {!! $users->render() !!}
    </div>
@endsection