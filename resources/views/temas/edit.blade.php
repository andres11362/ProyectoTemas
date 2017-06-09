@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Editar tema</h1>
    </div>
    {!! Form::model($tema, ['route' => ['temas.update', $tema ], 'method' => 'put']) !!}
    <div class="col-md-12">
        <div class="form-group">
                {!! Form::label('titulo', 'Titulo: ') !!}
                {!! Form::text('titulo', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa el titulo del tema']) !!}
        </div>
        <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion: ') !!}
                {!! Form::textarea('descripcion', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa la descripcion del tema']) !!}
        </div>
        {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
@endsection