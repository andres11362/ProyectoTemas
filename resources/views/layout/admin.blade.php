<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/admin.css')!!}
    {!!Html::style('css/login.css') !!}
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Temario</a>
        </div>
        <ul class="nav navbar-nav">

        </ul>
    </div>
</nav>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <p>
            El formulario no se ha validado correctamente:
        </p>
        <ul>
        @foreach($errors->all() as $error) <!--indicamos que si hay un error en el login muestre un mensaje que contenga esos errores-->
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    @yield('content')
</div>
{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
@section('scripts')

@show

</body>
</html>