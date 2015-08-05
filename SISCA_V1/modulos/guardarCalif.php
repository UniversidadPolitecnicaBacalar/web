<?php
	include ('conexion/conexion.php');

	if (empty($_REQUEST["idCalifica"]) or empty($_REQUEST["calificacion"])){
		echo "sin datos";
	} else{
		$idCalif = $_REQUEST["idCalifica"];
		$calificacion = $_REQUEST["calificacion"];

		$query = "UPDATE tb_alumnos_calificacionesxactividad SET 
		calificacion_act = $calificacion WHERE idAlCa=$idCalif";

		mysqli_query($mysqli,$query)or die(mysqli_error());
		echo "ok";
	}
?>