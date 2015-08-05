<?php
	include ('conexion/conexion.php');

	if (empty($_REQUEST["nombreActividad"]) or empty($_REQUEST["idMateria"]) or empty($_REQUEST["idActividad"]) or empty($_REQUEST["evidencia"])or empty($_REQUEST["unidad"])){
		echo "sin datos";
	} else{
		$idMateria = $_REQUEST["idMateria"];
		$idActividad = $_REQUEST["idActividad"];

		$nombreActividad = $_REQUEST["nombreActividad"];
		$evidencia = $_REQUEST["evidencia"];
		$unidad = $_REQUEST["unidad"];

		$query = "UPDATE tb_actividad SET 
		nom_actividad='$nombreActividad',
		tb_competencias_id_competencia=$evidencia,
		tb_temaUnidad_id_temaU=$unidad,
		tb_temaUnidad_tb_materias_id_materia=$idMateria WHERE idact=$idActividad";

		mysqli_query($mysqli,$query)or die(mysqli_error());
		echo "ok";
	}
?>