<?php
	include ('conexion/conexion.php');

	if (empty($_REQUEST["nombreUnidad"]) or empty($_REQUEST["idMateria"])or empty($_REQUEST["idUnidad"])){
		echo "sin datos";
	} else{
		$idMateria = $_REQUEST["idMateria"];
		$idUnidad = $_REQUEST["idUnidad"];
		$nombreUnidad = $_REQUEST["nombreUnidad"];

		$query = "UPDATE tb_temaunidad SET nom_temaU='$nombreUnidad' WHERE tb_materias_id_materia=$idMateria AND id_temaU=$idUnidad";
		
		mysqli_query($mysqli,$query)or die(mysqli_error());
		echo "ok";
	}
?>