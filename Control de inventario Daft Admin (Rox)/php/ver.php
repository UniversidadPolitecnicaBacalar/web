<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
if (isset($_SESSION['username']) && $_SESSION['acceso'] == 'Administrativo'){
  

include("conexion.php");




$id=$_GET['id'];

$archivo = mysql_query("SELECT datos FROM cortes WHERE Id_corte='$id' ") or die ("Problemas en consulta".mysql_error());
$reg = mysql_fetch_array($archivo);




header("Content-type: text/plain");
echo $reg['datos'];
}
else{
	echo "<script>history.back();</script>";
}
?>