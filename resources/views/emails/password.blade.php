<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head> <!--plantilla de envio de correo-->
<body>
<h1>¡¡Hola!! </h1>
<p>Te hemos enviado un correo ya que se has solicitado la recuperacion de tu contraseña para que puedas acceder a la plataforma,
    a continuacion el siguiente enlace</p>
<p>Enlace: {{ url('password/reset/'.$token) }} </p>
<p>Atte: Administracion del sitio.</p>
</body>
</html>