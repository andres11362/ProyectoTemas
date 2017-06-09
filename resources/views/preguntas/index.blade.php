@extends('layout.user')

@section('content')
    @include('alerts.registros')
	<div class="page-header">
        <h1>Lista de preguntas</h1>
    </div>
    <div class="table-responsive">
        {!! link_to_route('preguntas.create', $title = 'Crear pregunta', $parameters = '', $attributes = ['class' => 'btn btn-primary pull-right']) !!}
        <br>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <th>Enunciado</th>
            <th>Estado</th>
            <th>Acciones</th>
            </thead>
            @foreach($preguntas as $pregunta)
                <tbody>
                <td>{{$pregunta->enunciado}}</td>
                @if($pregunta->habilitada == false )
                    <td>Deshabilitado</td>
                @else
                    <td>Habilitado</td>
                @endif
                <td class="actions">
                    {!! link_to_route('preguntas.edit',$title = 'Editar', $parameters = $pregunta->id, $attributes = ['class' => 'btn btn-warning'] ) !!}
                    {!!Form::open(['route'=> ['preguntas.destroy',$pregunta], 'method' => 'DELETE'])!!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
                </tbody>
            @endforeach
        </table>
        {!!$preguntas->render()!!}
    </div>
@endsection