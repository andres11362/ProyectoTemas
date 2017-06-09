@extends('layout.user')

@section('content')
    @if(Session::has('editado'))
        <div class="alert alert-warning">
            <p>
                {{ Session::get('editado') }}
            </p>
        </div>
    @endif
    <div class="page-header">
        <h1>Lista de preguntas</h1>
    </div>
    <div class="table-responsive">
        <br>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <th>Pregunta</th>
            <th>Respuesta 1</th>
            <th>Respuesta 2</th>
            <th>Respuesta 3</th>
            <th>Respuesta 4</th>
            <th>Respuesta correcta</th>
            <th>Acciones</th>
            </thead>
            @foreach($respuestas as $respuesta)
                <tbody>
                <td>{{$respuesta->enunciado}}</td>
                <td>{{$respuesta->respuesta1}}</td>
                <td>{{$respuesta->respuesta2}}</td>
                <td>{{$respuesta->respuesta3}}</td>
                <td>{{$respuesta->respuesta4}}</td>
                <td>{{$respuesta->respuesta_correcta}}</td>
                <td class="actions">
                    {!! link_to_route('respuestas.edit',$title = 'Editar', $parameters = $respuesta->id, $attributes = ['class' => 'btn btn-warning'] ) !!}
                </td>
                </tbody>
            @endforeach
        </table>
        {!! $respuestas->render() !!}
    </div>

@endsection