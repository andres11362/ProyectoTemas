@extends('layout.user')

@section('content')
    @include('alerts.registros')
    <div class="page-header">
        <h1>Lista de preguntas</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            {!! Form::model($preguntas, ['route' => 'respuestas.habilitar', 'method' => 'PUT']) !!}
                <thead>
                <th>Enunciado</th>
                <th><input type="checkbox" id="select_all"/></th>
                </thead>
                @foreach($preguntas as $pregunta)
                    <tbody>
                    <td>{{$pregunta->enunciado}}</td>
                    <td>
                        {!! Form::hidden('value['.$pregunta->id.']', 0) !!}
                        {!! Form::checkbox('value['.$pregunta->id.']',1,$pregunta->habilitada,['class' => 'selected']) !!}
                    </td>
                    </tbody>
                @endforeach
            {!! Form::submit('Editar', ['class' => 'btn btn-warning pull-right']) !!}
            <br>
            <br>
            {!! Form::close() !!}
        </table>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/Preguntas/todas.js') !!}
@endsection