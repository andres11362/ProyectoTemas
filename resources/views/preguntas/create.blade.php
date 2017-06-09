@extends('layout.user')

@section('content')
	@include('alerts.request')
	 <div class="page-header">
		<h1>Crear nueva pregunta</h1>
	 </div>
		{!! Form::open(['route' => 'preguntas.store', 'method' => 'post', 'files' => true, 'id' => 'create-form']) !!}
			<div class="form-group">
				<div class="form-group">
					{!! Form::label('enunciado', 'Enunciado: ') !!}
					{!! Form::textarea('enunciado', null, ['id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingresa la descripcion del tema', 'required' => 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::file('imagen') !!}
				</div>
			</div>
		   <div class="page-header">
			   <h3>Respuestas</h3>
		   </div>
			@for($i = 0; $i<=3; $i++)
			<div class="radio preg">
				<input type="radio" name="escogida" value="{{ $i }}" required><label class="preguntas">
				<input type="text" class="form-control" placeholder="Ingrese la respuesta numero {{ $i + 1 }}" name="respuesta[{{ $i }}]" required>
				</label>
				<br>
			</div>
			@endfor
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
    	{!! Form::close() !!}
	<br>
	<br>
@endsection