<?php
	include ('conexion/conexion.php');

	if (empty($_REQUEST["nombreActividad"]) or empty($_REQUEST["idMateria"]) or empty($_REQUEST["evidencia"])or empty($_REQUEST["unidad"])){
		echo "sin datos";
	} else{
		$idMateria = $_REQUEST["idMateria"];
		$nombreActividad = $_REQUEST["nombreActividad"];
		$evidencia = $_REQUEST["evidencia"];
		$unidad = $_REQUEST["unidad"];

		$query = "INSERT INTO tb_actividad (nom_actividad,tb_competencias_id_competencia,tb_temaUnidad_id_temaU,tb_temaUnidad_tb_materias_id_materia) 
		VALUES ('$nombreActividad', $evidencia, $unidad, $idMateria)";
		mysqli_query($mysqli,$query)or die(mysqli_error());
		echo "ok";
	}
?>