<?php
include("conexion.php");

	if(isset($_POST['dia']) && !empty($_POST['dia']) &&
	isset($_POST['inicio']) && !empty($_POST['inicio']) &&
	isset($_POST['fin']) && !empty($_POST['fin']) &&
	isset($_POST['ingresos']) && !empty($_POST['ingresos']) &&
	isset($_POST['gastos']) && !empty($_POST['gastos']))
	{

	$conexion=mysql_connect($host, $user, $pw) or die('problema al conectarse al host');
	mysql_select_db($bd, $conexion) or die("problemas al conectar la bd");
	mysql_query("INSERT INTO ingresos_gastos(Fecha, HoraInicio, HoraFin, CantidadIngresos, GastosDiarios)
	VALUES ('$_POST[dia]', '$_POST[inicio]', '$_POST[fin]', '$_POST[ingresos]', '$_POST[gastos]')", $conexion);
	echo "datos insertados correctamente";
	}else{
		echo "Problema al insertar los datos"; 
	}


?>