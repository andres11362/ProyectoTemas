@extends('layout.user')

@section('content')
    @if (Session::has('status'))
        <div class='text-success'>
            {{Session::get('status')}}
        </div>
    @endif
    @include('alerts.registros')
    <div class="page-header">
        <h1>Bienvenido</h1>
    </div>
    @if(Auth::user()->rol == 'Admin')
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="icons">
                    <a href="{{route('usuarios.index')}}"><i class="fa fa-users fa-fw"></i><h2>Usuarios</h2></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icons">
                    <a href="{{route('temas.index')}}"><i class="fa fa-book fa-fw"></i><h2>Temas</h2></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icons">
                    <a href="{{route('subtemas.index')}}"><i class="fa fa-code-fork fa-fw"></i><h2>Subtemas</h2></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icons">
                    <a href="{{route('preguntas.index')}}"><i class="fa fa-question fa-fw"></i><h2>Preguntas</h2></a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="icons">
                    <a href="{{route('preguntas.index')}}"><i class="fa fa-comment fa-fw"></i><h2>Respuestas</h2></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icons">
                    <a href="{{route('respuestas.habilitar')}}"><i class="fa fa-check-circle fa-fw"></i><h2>Habilitar preguntas</h2></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icons">
                    <a href="{{route('respuestas.lista')}}"><i class="fa fa-list fa-fw"></i><h2>Registros evaluacion</h2></a>
                </div>
            </div>
        </div>
    @endif
    @if(Auth::user()->rol == 'Estud')
        @if(isset($val))
            <div class="col-md-12">
                <div class="col-md-6">
                     <div class="icons">
                          <a href="{{route('temario.inicio')}}"><i class="fa fa-info-circle"></i><h2>Temario</h2></a>
                     </div>
                </div>
                @if($val == 0)
                    <div class="col-md-6">
                        <div class="icons">
                            <a href="{{route('examen.show', ['id' => 1])}}"><i class="fa fa-question-circle" ></i><h2>Evaluacion</h2></a>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="icons">
                            <a href="{{route('examen.resultado')}}"><i class="fa fa-line-chart"></i> <h2>Resultados</h2></a>
                        </div>
                    </div>
                @endif
            </div>
       @endif
    @endif
    <div class="clearfix"></div>
@endsection