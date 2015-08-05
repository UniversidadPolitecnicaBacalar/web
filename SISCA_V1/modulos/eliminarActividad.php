<?php

include ('conexion/conexion.php');
//$fecha = date("Y-m-d H:i:s");


$idActividad= $_REQUEST["id"];


$sql = "DELETE FROM tb_actividad WHERE idact='$idActividad'";

if (mysqli_query($mysqli, $sql)) {
	echo "1";
} else {
	echo "0";
}
		
	
?>