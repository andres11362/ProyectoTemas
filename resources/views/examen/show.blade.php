@extends('layout.user')

@section('content')

    <div class="page-header">
        <h1>Pregunta {{$id}}</h1>
    </div>
                {!! Form::open() !!}
                @foreach($preguntas as $pregunta)
                    @if(!empty($pregunta->path))
                        <div class="col-md-12">
                            <div class="img-center">
                                <img src="../imagenes/preguntas/{{$pregunta->path}}" class="img-responsive">
                            </div>
                        </div>
                    @endif
                <div class="col-md-12">
                    <div class="col-md-9">
                        <h2 class="text-center"><b>{{$pregunta->enunciado}}</b></h2>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                        <input type="hidden" name="_id" value="{{ $id }}" id="_id">
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="valor" value="1"/>{{$pregunta->respuesta1}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="valor" value="2"/>{{$pregunta->respuesta2}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="valor" value="3"/>{{$pregunta->respuesta3}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label><input type="radio" name="valor" value="4"/>{{$pregunta->respuesta4}}</label>
                            </div>
                        </div>
                        @endforeach
                        <button class="btn btn-info" id="evaluar">Verificar respuesta</button>
                        {!! Form::close() !!}
                        @if($band == false)
                            {!! link_to_route('examen.show', $title = 'Siguente pregunta', $parameters = $siguiente, $attributes = ['class' => 'btn btn-primary boton hidden']) !!}
                        @else
                            {!! link_to_route('examen.resultado', $title = 'Finalizar evaluacion', $parameters = null, $attributes = ['class' => 'btn btn-default boton hidden']) !!}
                        @endif
                    </div>
                    <div class="col-md-3" id="respuesta"></div>
                </div>
    <div class="clearfix"></div>
@endsection

@section('scripts')
    {!! Html::script('js/Preguntas/verificar.js') !!}
    {!! Html::script('js/Preguntas/respuesta.js') !!}
@endsection