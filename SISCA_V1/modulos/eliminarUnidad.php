<?php

include ('conexion/conexion.php');
//$fecha = date("Y-m-d H:i:s");


$idUnidad = $_REQUEST["id"];


$sql = "DELETE FROM tb_temaunidad WHERE id_temaU='$idUnidad'";

if (mysqli_query($mysqli, $sql)) {
	echo "1";
} else {
	echo "0";
}
		
	
?>