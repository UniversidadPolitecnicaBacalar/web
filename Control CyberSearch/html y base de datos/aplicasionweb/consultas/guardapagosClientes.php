<?php
include("conexion.php");

	if(isset($_POST['Fecha']) && !empty($_POST['Fecha']) &&
	isset($_POST['Nombre']) && !empty($_POST['Nombre']) && 
	isset($_POST['Domicilio']) && !empty($_POST['Domicilio']) &&
	isset($_POST['Cantidad']) && !empty($_POST['Cantidad']))
	{

	$conexion=mysql_connect($host, $user, $pw) or die('problema al conectarse al host');
	mysql_select_db($bd, $conexion) or die("problemas al conectar la bd");
	mysql_query("INSERT INTO pagocliente(Fecha, Nombre, Domicilio, cantidadPagar)
	VALUES ('$_POST[Fecha]','$_POST[Nombre]', '$_POST[Domicilio]', '$_POST[Cantidad]')", $conexion);
	echo "datos insertados correctamente";
	}else{
		echo "Problema al insertar los datos"; 
	}



?>