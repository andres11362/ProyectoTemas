@extends('layout.user')

@section('content')
    @include('alerts.registros')
    <div class="page-header">
        <h1>Lista de temas</h1>
    </div>
    <div class="table-responsive">
        {!! link_to_route('temas.create', $title = 'Crear tema', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
        <br>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </thead>
            @foreach($temas as $tema)
            <tbody>
                <td>{{$tema->titulo}}</td>
                <td>{{$tema->descripcion}}</td>
                <td class="actions">
                    {!! link_to_route('temas.edit',$title = 'Editar', $parameters = $tema->id, $attributes = ['class' => 'btn btn-warning'] ) !!}
                    {!!Form::open(['route'=> ['temas.destroy',$tema], 'method' => 'DELETE'])!!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tbody>
            @endforeach
        </table>
        {!! $temas->render() !!}
    </div>
@endsection