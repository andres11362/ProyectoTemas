@extends('layout.user')

@section('content')
	@include('alerts.request')
	 <div class="page-header">
		<h1>Editar pregunta</h1>
	 </div>
 	{!! Form::model($pregunta, ['route' => ['preguntas.update', $pregunta->id], 'files' => true, 'method' => 'PUT' ]) !!}
			<div class="form-group">
				{!! Form::label('enunciado', 'Enunciado: ') !!}
				{!! Form::textarea('enunciado', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa la descripcion del tema', 'required' => 'required']) !!}
			</div>
			 <div class="form-group">
				 {!! Form::file('imagen') !!}
			 </div>
        	{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection