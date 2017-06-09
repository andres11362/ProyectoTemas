@extends('layout.user')

@section('content')
    @include('alerts.registros')
    <div class="page-header">
        <h1>Lista de subtemas</h1>
    </div>
    <div class="table-responsive">
        {!! link_to_route('subtemas.create', $title = 'Crear subtema', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
        <br>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Acciones</th>
            </thead>
            @foreach($subtemas as $subtema)
                <tbody>
                <td>{{$subtema->titulo}}</td>
                <td>{{$subtema->texto}}</td>
                <td class="actions">
                    {!! link_to_route('subtemas.edit',$title = 'Editar', $parameters = $subtema->id, $attributes = ['class' => 'btn btn-warning'] ) !!}
                    {!!Form::open(['route'=> ['subtemas.destroy',$subtema], 'method' => 'DELETE'])!!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
                </tbody>
            @endforeach
        </table>
        {!!$subtemas->render()!!}
    </div>
@endsection