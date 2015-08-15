<?php  
/* Editar. */  
// Incluimos la conexión. 
include_once("conexion.php"); 
// Seleccionamos los campos y la tabla. 
$ssql = "select idalta_login, usuario, password FROM alta_login"; 
// Liberamos los datos. 
$rs_libros = mysql_query($ssql); 
// Pasamos los datos de la query a un array con un bucle while. 
while($fila = mysql_fetch_array($rs_libros)) { 
// Pasamos la variable $fila y creamos un enlace para pasar la id por url = $_GET. 
echo'<a href="editar.php?id=' . $fila['idalta_login'] . '">Editar</a> '; 
// Sacamos todas las filas de la base con el array. 
echo $fila["idalta_login"] . " | "; 
echo $fila["usuario"] . " | "; 
echo $fila["password"] . "<br />"; 
} 
?>