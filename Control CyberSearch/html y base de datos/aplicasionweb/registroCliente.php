<?php
include("conexion.php");

	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['direccion']) && !empty($_POST['direccion']) &&
	isset($_POST['celular']) && !empty($_POST['celular']) &&
	isset($_POST['fecha']) && !empty($_POST['fecha']))
	{

	$conexion=mysql_connect($host, $user, $pw) or die('problema al conectarse al host');
	mysql_select_db($bd, $conexion) or die("problemas al conectar la bd");
	mysql_query("INSERT INTO registrocliente(Nombre, Direccion, Telefono,FechaContrato)
	VALUES ('$_POST[nombre]', '$_POST[direccion]', '$_POST[celular]', '$_POST[fecha]')", $conexion);
	echo "datos insertados correctamente";
	}else{
		echo "Problema al insertar los datos"; 
	}


?>