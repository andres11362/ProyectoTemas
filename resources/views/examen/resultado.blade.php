@extends('layout.user')

@section('content')
    <div class="page-header">
        <h1>Resultado examen</h1>
    </div>
    <dl>
        <dt><h3>Alumno:</h3></dt>
        <dd><h5>{{Auth::user()->nombres}}</h5></dd>
        <dt><h3>Preguntas correctas:</h3></dt>
        <dd><h5>{{$correctas}}</h5></dd>
        <dt><h3>Total de preguntas:</h3></dt>
        <dd><h5>{{$total}}</h5></dd>
        <dt><h3>Porcentaje alcanzado</h3></dt>
        <dd><h5>{{$porcentaje}}</h5></dd>
        <dt><h3>Nota definitiva</h3></dt>
        <dd><h5>{{$resultado}}</h5></dd>
        <dt><h3>Conclusion</h3></dt>
        <dd>
            @if($resultado <= 2.96)
                <span class="alert-danger">
                    <h5>No has aprobado</h5>
                </span>
            @else
                <span class="alert-success">
                    <h5>Has aprobado</h5>
                </span>
            @endif
        </dd>
    </dl>
    {!! link_to_route('inicio.index', $title = 'Inicio', $parameters = null, $attributes = ['class' => 'btn btn-default']) !!}
    <br>
    <br>
@endsection
