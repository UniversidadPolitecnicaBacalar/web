<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso']) && isset($_POST['id']) && isset($_POST['accion'])){

  if ($_SESSION['acceso'] == 'Administrativo') {
    
  include("conexion_login.php");

  $accion 	= $_POST['accion'];
  $id 		= $_POST['id'];


  mysql_query("UPDATE usuarios SET estatus = '$accion' WHERE Id_usuario = '$id'", $con) or die ("Problemas al actualizar estatus");


  echo "Estatus modificado";








	}
	else {
	//de caso contrario redireciona al login
	echo "<script>history.back();</script>";
	}

} 
else {
//de caso contrario redireciona al login
echo "<script>history.back();</script>";
}
?>