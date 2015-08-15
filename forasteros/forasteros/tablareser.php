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
    <?php

            $conexion = mysqli_connect("localhost","root","","restaurante");
            mysqli_set_charset($conexion,"utf-8");     
            // Verifica la connection
            if (!$conexion) {
                die("Error en la conexcion: " . mysqli_connect_error());
            } else {
              // Conexion exitosa
              $sql = "SELECT iddatos_reservacion, nombre, telefono, no_personas, fecha, hora, minuto, comentario  FROM datos_reservacion";
              $resultado = mysqli_query($conexion, $sql);
              if (mysqli_num_rows($resultado) > 0) {
                // imprime los datos
                
                      echo "<table class='bordered centered'>";
                      echo "<thead><tr><th data-field='id'>no. Reservacion</th><th>NOMBRE</th><th>TELEFONO</th><th>NO. DE PERSONAS</th><th>FECHA</th><th>HORA</th><th>MINUTO</th><th>COMENTARIOS</th></tr></thead>";
                      while($campo = mysqli_fetch_assoc($resultado)) {
                        //echo "<td>".$campo["id"]. "</td>";
                        echo "<tbody>";
                          echo "<td>".utf8_encode($campo["iddatos_reservacion"]). "</td>";
                          echo "<td>".utf8_encode($campo["nombre"]). "</td>";
                          echo "<td>".utf8_encode($campo["telefono"]). "</td>";
                          echo "<td>".utf8_encode($campo["no_personas"]). "</td>";
                          echo "<td>".utf8_encode($campo["fecha"]). "</td>";
                          echo "<td>".($campo["hora"]). "</td>";
                          echo "<td>".($campo["minuto"])."</td>";
                          echo "<td>".utf8_encode($campo["comentario"]). "</td>";
                          echo "</tr>";
                        echo "</tbody>";
                      }
                      echo "</table>";      
              } // fin del if
            }
            mysqli_close($conexion);
    ?>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/ajax.js"></script>
</body>
</html>
