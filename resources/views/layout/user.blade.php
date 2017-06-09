<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto temas</title>

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/admin.css')!!}
    {!!Html::style('css/temas.css')!!}
    {!!Html::style('css/estilos.css')!!}

</head>

<body>

<div id="wrapper">


    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('inicio.index')}}">Temario</a>

        </div>


        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">@if(Auth::User()){!! Auth::user()->nombres !!}@endif
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('usuario.edit')}}"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{route('usuario.pass')}}"><i class="fa fa-exchange"></i> Cambiar contraseña</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{route('auth.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                    </li>
                </ul>
            </li>
        </ul>


        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    @if(Auth::user()->rol == 'Admin')
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('usuarios.index')}}"><i class='fa fa-plus fa-fw'></i> Lista</a>
                                </li>
                                <li>
                                    <a href="{{route('usuarios.create')}}"><i class='fa fa-plus fa-fw'></i> Crear usuario</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if((Auth::user()->rol == 'Admin') || (Auth::user()->rol == 'Docen'))
                        <li>
                            <a href="#"><i class="fa fa-book" aria-hidden="true"></i> Temas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('temas.index')}}"><i class='fa fa-plus fa-fw'></i> Lista</a>
                                </li>
                                <li>
                                    <a href="{{route('temas.create')}}"><i class='fa fa-plus fa-fw'></i> Crear tema</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-code-fork" aria-hidden="true"></i> Subtemas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('subtemas.index')}}"><i class='fa fa-plus fa-fw'></i> Lista</a>
                                </li>
                                <li>
                                    <a href="{{route('subtemas.create')}}"><i class='fa fa-plus fa-fw'></i> Crear subtema</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-question" aria-hidden="true"></i> Preguntas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('preguntas.index')}}"><i class='fa fa-plus fa-fw'></i>Lista</a>
                                </li>
                                <li>
                                    <a href="{{route('preguntas.create')}}"><i class='fa fa-plus fa-fw'></i>Crear pregunta</a>
                                </li>
                                <li>
                                    <a href="{{route('respuestas.habilitar')}}"><i class='fa fa-plus fa-fw'></i>Habilitar preguntas</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-comment" aria-hidden="true"></i> Respuestas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('respuestas.index')}}"><i class='fa fa-plus fa-fw'></i>Lista</a>
                                </li>
                                <li>
                                    <a href="{{route('respuestas.lista')}}"><i class='fa fa-plus fa-fw'></i>Registro</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->rol == 'Estud')
                        @if(!empty($temas))
                            @foreach($temas as $tema)
                                <li>
                                    <a href="#"><i class="fa fa-university" aria-hidden="true"></i> {{$tema->titulo}}<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a href="{!! URL::to('/tema',['id' => $tema->id ]) !!}"><i class='fa fa-plus fa-fw'></i> Introduccion</a></li>
                                        @foreach($tema->subtemas as $subtema)
                                                <li>
                                                    <a href="{!! URL::to('/temario',['tema' => $tema->titulo ,'id' => $subtema->id]) !!}"><i class='fa fa-plus fa-fw'></i>  {{$subtema->titulo}}</a>
                                                </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                        @if(isset($band))
                            <li><a href="{{route('temario.inicio')}}"><i class="fa fa-info-circle" aria-hidden="true"></i> Temario</a></li>
                        @endif
                        <li>
                            @if(isset($val))
                                @if($val == 0)
                                    <a href="{{route('examen.show', ['id' => 1])}}"><i class="fa fa-question-circle" aria-hidden="true"></i> Evaluacion</a>
                                @else
                                    <a href="{{route('examen.resultado')}}"><i class="fa fa-line-chart" aria-hidden="true"></i> Resultados</a>
                                @endif
                            @else
                                <a href="{{route('inicio.index')}}"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
                            @endif
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <br>
        @yield('content')
        <br>
        <br>
    </div>
</div>

{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}

@section('scripts')

@show



</body>

</html>