<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head> <!--plantilla de envio de correo-->
<body>
<h1>¡¡Hola {{$nombres}}!! </h1>
<p>Te hemos enviado un correo ya que se ha creado un usuario para que puedas acceder a la plataforma,
    a continuacion te damos los siguientes datos:</p>
<p>Enlace: {{url('/')}}</p>
<p>Usuario: <b>{{$username}}</b></p>
<p>Contraseña: <b>{{$password}}</b></p>
<p>Recuerda cambiar tu contraseña despues de ingresar a la plataforma.</p>
<p>Un saludo</p>
<p>Atte: Administracion del sitio.</p>
</body>
</html>