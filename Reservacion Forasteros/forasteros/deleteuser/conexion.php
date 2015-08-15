<?php 
//Conectamos con el servidor. 
$conexion = mysql_connect("localhost","root","4321")or die(mysql_error()); 
//Seleccionamos la base de datos. 
mysql_select_db("restaurante")or die(mysql_error()); 
?>