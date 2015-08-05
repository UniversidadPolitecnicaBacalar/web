<?php
session_start();
include ('conexion/conexion.php');
$usuario = $_REQUEST["txtUser"];
$password = $_REQUEST["txtPwd"];

$query = "SELECT * FROM tb_maestros WHERE usuario_maestro='".$usuario."' 
AND pwd_maestro='".$password."'";
//echo $query;
$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);

if( $num_row ==1 )
 {
 $_SESSION['id_usuario']=$row['id_maestro'];
 $_SESSION['usuario']=$row['usuario_maestro'];
 

 echo '1';
  }
  else
     {
 echo '0';
  }
?>