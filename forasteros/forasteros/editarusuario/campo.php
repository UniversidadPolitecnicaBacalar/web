<?php
include_once("conexion.php"); 
// Pasamos los datos del formulario. 
$id= $_REQUEST['idalta_login']; 
$nombre = $_REQUEST['usuario']; 
$password = $_REQUEST['password']; 
 
// Pasamos los datos para actualizarlos en la tabla. 
$ssql = "UPDATE `alta_login` SET `idalta_login`='$id',`usuario`='$nombre',`password`='$password' WHERE `idalta_login`='$id'"; 
// Liberamos los datos con la condición if. 
if (mysql_query($ssql)) {
echo "Actualizacion exitosa "; 
} else { 
echo "Error de actualizacion "; 
} 
// Mostramos los datos. 

echo '<a href="editar.php" target="_self">Atras</a> <a href="actualizacion.php" target="_self">Inicio</a>'; 
// Cerramos la conexion con el servidor. 
mysql_close($conexion); 
?>