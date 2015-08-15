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
echo "Actualizacion exitosa "; 
} else { 
echo "Error de actualizacion "; 
} 
// Mostramos los datos. 

echo '<a href="delete.php" target="_self">Atras</a> <a href="actualizar.php" target="_self">Inicio</a>'; 
// Cerramos la conexion con el servidor. 
mysql_close($conexion); 
?>