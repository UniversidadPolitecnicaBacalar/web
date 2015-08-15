<!doctype html>
<html lang="en-US">
<head>

  <meta charset="utf-8">

  <title>Login</title>

  <link href="css/varela.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/login.css">

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

  <div id="login">

    <h2><span class="fontawesome-lock"></span>Iniciar Sesion</h2>

    <form action="altauser.php" method="POST">

      <fieldset>

        <p><label for="usuario">Usuario</label></p>
        <p><input type="text" id="usuario" name="usuario" placeholder="Usuario"></p>

        <p><label for="password">Contraseña</label></p>
        <p><input type="password" id="password" name="password" placeholder="Contraseña"></p>

        <p><input type="submit" value="Inicia Sesion"></p>
        <p><input type="reset" mane="clear" value="Borrar"></p>
      </fieldset>

    </form>

  </div> <!-- end login -->

</body> 
</html>
