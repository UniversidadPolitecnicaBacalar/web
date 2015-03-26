<?php 
	
	require("conexion.php");
		
	$con = mysql_connect($host,$user,$password) or die ("Problemas al conectar al servidor");
	#conexion a la base de datos
	mysql_select_db($database,$con) or die ("Problemas al conectar a la base de datos");

	#variable de la id que ha sido mandada anteriormente
	$id = $_POST['id'];
	

	#query donde agarra los valores que tienen el ID
	$registro = mysql_query("SELECT * FROM alumnos WHERE ID = '$id'") or die ("Problemas en consulta".mysql_error());
	$reg = mysql_fetch_array($registro);
	#array donde se le asigna un numero a cada valor
	$datos = array(
					0 => $reg['Apellido_paterno'], 
					1 => $reg['Apellido_materno'], 
					2 => $reg['Nombre'], 
					3 => $reg['Fecha_de_nacimiento'],
					4 => $reg['Lugar_de_nacimiento'],
					5 => $reg['Domicilio'],
					6 => $reg['Ciudad'],
					7 => $reg['Colonia'],
					8 => $reg['Numero_exterior'],
					9 => $reg['Telefono_movil'],
					10 => $reg['Telefono_fijo'],

					);
echo json_encode($datos);
?>