<?php
  include("../conexion/conexionMysql.php");
  Crear_Conexion();
    $username=$_POST["username"];
    $Oldpassword=md5($_POST["Oldpassword"]);
    $Newpassword=md5($_POST["Newpassword"]);
    $Newpassword2=md5($_POST["Newpassword2"]);
    $buscarUsuario=mysql_query("SELECT usuario,password FROM empleado WHERE usuario='$username' and password='$Oldpassword'");
    $NoUsuario = mysql_num_rows($buscarUsuario);
    if($NoUsuario==0){
            echo"Usuario incorrecto";
    }

    else{
      if($Newpassword!=$Newpassword2){
         echo"Verifique su nueva contraseña";
        
      }
      else{
            $actualizar= mysql_query("UPDATE empleado SET usuario='$username',password='$Newpassword' WHERE usuario='$username' and password='$Oldpassword'");
            echo"Contarseña actualizada";


            }
          }
        
        ?>