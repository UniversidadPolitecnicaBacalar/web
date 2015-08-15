<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registro</title>
</head>

<?php
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $conexion = mysql_connect($host_db, $user_db, $pass_db, "utf8");
    //Variables
    $nombre=utf8_decode($_POST["nombre"]);
    $telefono=($_POST["telefono"]);
    $email=utf8_decode($_POST["email"]);
    $personas=($_POST["no_personas"]);
    $fecha=($_POST["fecha"]);
    $hora=($_POST["hora"]);
    $minuto=($_POST["minuto"]);
    $comen=utf8_decode($_POST["comen"]);
    //terminan variables
    if ($nombre=="" or $telefono=="" or $email=="" or $personas=="" or $fecha=="" or $hora=="0" or $minuto=="0"){

        echo "<script lenguage='javascript'>
            alert('Por favor llene todos los campos');
            location.replace('reservacion.php');
            </script>";

    }
    else{
        mysql_select_db('restaurante', $conexion) or die("No se puede seleccionar la base de datos.");
        //mysql_set_charset($conexion,"utf-8");
        $reserva = "INSERT INTO datos_reservacion (nombre, telefono, email, no_personas, fecha, hora, minuto, comentario) VALUES ('$nombre','$telefono','$email','$personas', '$fecha', '$hora', '$minuto', '$comen')";

         
        if (!mysql_query($reserva, $conexion))
        {
        die('Error: ' . mysql_error());
            echo "<script lenguage='javascript'>
                alert('Error al guardar su reservacion.');
                location.replace('reservacion.php');
                </script>";
        }
        
        else{
            echo "<script lenguage='javascript'>
                alert('Su reservacion a sido guardada exitosamente.');
                location.replace('reservacion.php');
                </script>";
        }
    }
               
     
     
    ?>
 
</html>
