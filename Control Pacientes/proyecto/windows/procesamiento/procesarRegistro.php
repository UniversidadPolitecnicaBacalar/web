

<?php

include("../conexion/conexionMysql.php");
Crear_Conexion();

// verificamos si se han enviado ya las variables necesarias.
   $username = $_REQUEST["username"];
   $password = md5($_REQUEST["password"]);
   $password2 = md5($_REQUEST["password2"]);
   $nombre = $_REQUEST["nombre"];


   // Hay campos en blanco
   
      // ¿Coinciden las contraseñas?
      if($password!=$password2) {
        echo "Las contraseñas son diferentes.";
           
           
      }
      else{         // Comprobamos si el nombre de usuario o la cuenta de correo ya existían
         $checkuser = mysql_query("SELECT usuario FROM empleado WHERE usuario='$username'");
         $username_exist = mysql_num_rows($checkuser);
         if ($username_exist>0) {
            echo"El usuario ya se encuentra registrado.";
         }
         else{
            $query = "INSERT INTO empleado (nom_empleado,usuario,password)
            VALUES ('$nombre','$username','$password')";
            mysql_query($query) or die(mysql_error());
            echo "ok";
            
         }
      }
   

?>