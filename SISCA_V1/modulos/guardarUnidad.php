<?php
	include ('conexion/conexion.php');

	if (empty($_REQUEST["nombreUnidad"]) or empty($_REQUEST["idMateria"])){
		echo "sin datos";
	} else{
		$idMateria = $_REQUEST["idMateria"];
		$nombreUnidad = $_REQUEST["nombreUnidad"];

		$query = "INSERT INTO tb_temaunidad (nom_temaU, tb_materias_id_materia) VALUES ('$nombreUnidad', $idMateria)";
		
		mysqli_query($mysqli,$query)or die(mysqli_error());
		echo "ok";
	}
?>