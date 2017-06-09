@extends('layout.user')

@section('content')
    <div class="page-header">
        <h1>Alumnos evaluados</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <th>Usuario</th>
            <th>Respuestas correctas</th>
            <th>Respuestas totales</th>
            <th>Calificacion</th>
            <th>Acciones</th>
            </thead>
            @foreach($lista as $list)
                <tbody>
                    <td>{{$list->username}}</td>
                    <td>{{$list->correctas}}</td>
                    <td>{{$total}}</td>
                    <td><?php echo round((($list->correctas/$total)/2)*10,2) ?></td>
                    <td class="actions>">
                        {!! link_to_route('respuestas.alumno',$title = 'Mirar registro', $parameters = $list->id, $attributes = ['class' => 'btn btn-info'] ) !!}
                    </td>
                </tbody>
            @endforeach
            <br>
            <br>
        </table>
        {!! $lista->render() !!}
    </div>
@endsection