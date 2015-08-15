<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <link rel="icon" href="images/favicon.ico" sizes="32x32">
  <link href="css/varela.css" type="text/css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/login.css"  media="screen,projection"/>
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <div id="login">
    <h2><span class="fontawesome-lock"></span>Registro</h2>
    <form action="agregar.php" method="post">
      <fieldset>
        <p><label for="nombre">Nombre</label></p>
        <p><input class="required" request type="text" name="nombre" maxlength="16"></p>

        <p><label for="nombre">Apellido</label></p>
        <p><input class="required" type="text" name="apellido" maxlength="16"></p>

        <p><label for="nombre">Usuario</label></p>
        <p><input class="required" type="text" name="usuario" maxlength="16"></p>

        <p><label for="pass">Contaseña</label></p>
        <p><input class="required" type="password" name="password" maxlength="16"></p>
        
        <p><input type="reset" mane="clear" value="Borrar"></p>
        <p><input type="submit" name="enviar" value="Registrar usuario"></p>
        
      </fieldset>
    </form>
  </div>
</body> 
</html>


