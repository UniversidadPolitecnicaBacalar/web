<?php
include_once("conexion.php"); 
// Pasamos los datos del formulario. 
$id= $_REQUEST['idalta_login']; 
$nombre = $_REQUEST['usuario']; 
$password = $_REQUEST['password']; 
 
// Pasamos los datos para actualizarlos en la tabla. 
$ssql = "DELETE FROM alta_login WHERE idalta_login='$id'"; 
// Liberamos los datos con la condición if. 
if (mysql_query($ssql)) {
	echo "<script lenguage='javascript'>
		alert('Usuario eliminado');
	    location.replace('../cerrar.php');
	    </script>"; 
} else {
	echo "<script lenguage='javascript'>
		alert('Error');
	    location.replace('eliminar.php');
	    </script>";
} 
// Mostramos los datos. 
// Cerramos la conexion con el servidor. 
mysql_close($conexion); 
?>