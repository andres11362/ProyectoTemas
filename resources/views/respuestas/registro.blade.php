@extends('layout.user')

@section('content')
    <div class="page-header">
        <h1>Alumno evaluado</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <th>Usuario</th>
            <th>Nombres</th>
            <th>Pregunta</th>
            <th>Respuesta correcta</th>
            <th>Respuesta seleccionada</th>
            </thead>
            @foreach($lista as $list)
                <tbody>
                    <td>{{$list->username}}</td>
                    <td>{{$list->nombres}}</td>
                    <td>{{$list->enunciado}}</td>
                    <td>{{$list->respuesta_correcta}}</td>
                    <td>{{$list->respuesta_s}}</td>
                </tbody>
            @endforeach
            <br>
            <br>
        </table>
        {!! $lista->render() !!}
    </div>
@endsection