<?php
  session_start();
  if ($_SESSION['username']=="") {
    header("location: login.php");
    # code...
  }else{
    $usuario=$_SESSION['username'];
  }

 $hoy = date("Y-m-d");




?>
<!DOCTYPE html>
<html lang="es">
<head>
  <link href="css/icon.css" type="text/css" rel="stylesheet">
  <meta charset="UTF-8">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link rel="icon" href="images/favicon.ico" sizes="32x32">
  <link href="css/estilo.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <title>Forasteros</title>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<header>
  <div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
      <li><a class="brown-text" href="cerrar.php">Cerrar sesion</a></li>
    </ul>
      <nav class="brown darken-3" role="navigation">
        <!--Logo de la parte superior-->
        <div class="nav-wrapper container"><img class="brand-logo hide-on-med-and-down" id="logo" src="images/logo3.jpg" alt="fora">
          <ul class="right hide-on-med-and-down">
            <li><a href="index1.php" class="waves-effect waves-light">Inicio</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown1"><?php echo $usuario; ?><i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
          <!--Aqui esta el menu lateral del movil-->
          <ul id="nav-mobile" class="side-nav">
            <li><a href="index1.php" class="waves-effect waves-orange">Inicio</a></li>
          </ul>
          <!-- Esta linea indica que se activa cuando esta en el movil y no cuando esta en web, aqui tambien se le asigna el icono-->
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
      </nav>
    </div>
</header>
<main>
  <!--Titulo de la pagina-->
    <div id="index-banner" class="parallax-container1">
      <div class="section no-pad-bot">
        <div class="container">
          <h1 class="header center white-text text-lighten-2 animated fadeIn retraso-1">Administrador</h1>
        </div>
      </div>
      <div class="parallax"><img src="images/reservacion.jpg" alt="menu"></div>

    </div><!--Aqui termina el titulo-->
    <div class="container">
      <div class="section">

        <!--   Seccion de los iconos   -->
        <div class="row animated fadeIn retraso-1"> <!--Esto es una fila-->
          <div class="col s6"> <!--Esto es para colocarlos, exactamente no se para que sirve el s12 pero el m4 si lo mueves el texto se acomoda a horizontal-->
            <div class="icon-block">
              <h2 class="center text"><a href="deleteuser/eliminar.php"><i class="material-icons brown000">person_pin</i></a></h2>
              <h5 class="center"><span class="black-text">Eliminar usuario</span></h5>
              <p class="center text">Elimina un usuario del sistema</p>
            </div>
          </div>
          <div class="col s6"> <!--Esto es para colocarlos, exactamente no se para que sirve el s12 pero el m4 si lo mueves el texto se acomoda a horizontal-->
            <div class="icon-block">
              <h2 class="center text"><a href="editarusuario/actualizar.php"><i class="material-icons brown000">account_circle</i></a></h2>
              <h5 class="center"><span class="black-text">Editar Usuario</span></h5>
              <p class="center text">Cambia la informacion de los usuarios</p>
            </div>
          </div>
          <div class="row center">
            <a class="waves-effect waves-light btn" href="index1.php" target="_self"><i class="material-icons left">keyboard_backspace</i>Regresar</a>
          </div>
        </div>
      </div>
    </div>
  </main>



  <!--Aqui empieza el footer-->
  <footer class="page-footer brown"> <!--Aqui es para darle color-->
    <div class="footer-copyright">
      <div class="container">
      Hecho por <a class="orange-text text-lighten-3" href="#!">ShowBiz Team&copy;</a> <!--El class orange text sirve para darle color a una parte especifica, creo que tambien se puede usar span-->
      </div>
    </div>
  </footer>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/ajax.js"></script>
</body> 

</html>