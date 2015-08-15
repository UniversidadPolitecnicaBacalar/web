<?php  
/* Para iniciar las sesiones. */ 
session_start(); 
// Incluimos la conexión. 
include_once("conexion.php"); 
// Pasamos el id por $_GET desde la url. 
$id = @$_GET["id"]; 
// Seleccionamos la id y pasamos la variable id. 
$ssql = "select * from alta_login where idalta_login=" . $id; 
// Liberamos los datos. 
$rs_libros = mysql_query($ssql); 
// Pasamos los datos de la query a un array con un bucle while. 
while(@$fila = mysql_fetch_array($rs_libros)) { 
// Sacamos todas las filas de la base con el array. 
echo "Nombre: "; 
echo $fila["usuario"] . " | "; 
echo "Contrasenia: "; 
echo $fila["password"] . " | "; 

 "<br /><br />"; 
// Pasmos el id seleccionado a una sesión y las demás filas = campos. 
$_SESSION["idalta_login"]=$id; 
$_SESSION["usuario"]=$fila["usuario"]; 
$_SESSION["password"]=$fila["password"]; 
} 
// En el formulario pasamos los datos en cada celda. 
?> 

<a href="actualizacion.php" target="_self">Atras</a><br /> 
<form action="campo.php" method="post">  
<input type="hidden" name="idalta_login" value="<?php echo  $_SESSION['idalta_login'];?>">
<br /> 
Usuario: 
<br /> 
<input type="text" name="usuario" value="<?php echo $_SESSION['usuario'];?>"> 
<br/><br/> 
Password: 
<br /> 
<input type="text" name="password" value="<?php echo $_SESSION['password'];?>"> <br/><br/> 
 <br/><br/> 
<input type="submit" value="Editar"> 
</form>