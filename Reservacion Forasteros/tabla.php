  <?php
  session_start();
  if ($_SESSION['username']=="") {
    header("location: ../login.php");
    # code...
  }else{
    $usuario=$_SESSION['username'];
  }
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
  <title>Terminar</title>
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
    <div class="row animated fadeIn retraso-1">
      <div class="col s12">
      <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header active white-text"><i class="material-icons white000">local_play</i>Reservaciones</div>
            <div class="collapsible-body">
          
        <?php
            date_default_timezone_set("America/Mexico_City");
          $hoy = date("Y-m-d");
                $conexion = mysqli_connect("localhost","root","","restaurante");
                mysqli_set_charset($conexion,"utf-8");     
                // Verifica la connection
                if (!$conexion) {
                    die("Error en la conexcion: " . mysqli_connect_error());
                } else {
                  // Conexion exitosa
                  $sql = "SELECT iddatos_reservacion, nombre, telefono, no_personas, fecha, hora, minuto, comentario  FROM datos_reservacion WHERE fecha='$hoy' ";
                  $resultado = mysqli_query($conexion, $sql);
                  if (mysqli_num_rows($resultado) > 0) {
                    // imprime los datos
                    
                          echo "<table class='hoverable centered'>";
                          echo "<thead><tr><th data-field='id'>no. Reservacion</th><th>NOMBRE</th><th>TELEFONO</th><th>NO. DE PERSONAS</th><th>FECHA</th><th>HORA</th><th>MINUTO</th><th>COMENTARIOS</th><th></th></tr></thead>";
                          while($campo = mysqli_fetch_assoc($resultado)) {
                            $id = $campo["iddatos_reservacion"];
                            //echo "<td>".$campo["id"]. "</td>";
                            echo "<tbody>";
                              echo "<td>".utf8_encode($campo["iddatos_reservacion"]). "</td>";
                              echo "<td>".utf8_encode($campo["nombre"]). "</td>";
                              echo "<td>".utf8_encode($campo["telefono"]). "</td>";
                              echo "<td>".utf8_encode($campo["no_personas"]). "</td>";
                              echo "<td>".utf8_encode($campo["fecha"]). "</td>";
                              echo "<td>".utf8_encode($campo["hora"]). "</td>";
                              echo "<td>".utf8_encode($campo["minuto"])."</td>";
                              echo "<td>".utf8_encode($campo["comentario"]). "</td>";
                              echo "<td> <form action='actual.php' method='post'><button type='hidden' id='text' name='id' value='$id' class='btn waves-effect waves-light' type='submit' name='action'>Listo<i class='material-icons'>done</i></button></form> </td>";
                              echo "</tr>";
                            echo "</tbody>";
                          }
                          echo "</table>";      
                  } // fin del if
                }
                mysqli_close($conexion);
        ?>
            </div>
          </li>
        </ul>
        <a class="col s2 offset-s10 waves-effect waves-light btn" href="index1.php" target="_self"><i class="material-icons left">keyboard_backspace</i>Regresar</a>
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