<?php
	

$server = "localhost";
$username = "root";
$password = "";
$database = "bd_paciente";


$mysqli = mysqli_connect($server, $username, $password, $database) or die ("No se conecto: " . mysqli_error());
$mysqli->query("SET NAMES utf8"); //Para que lea los acentos de la DB
$rs = '
 SELECT * from paciente WHERE nss
 LIKE "'.ucfirst($_REQUEST['term']).'%"';

$q=$mysqli->query($rs);
$data = array();

while($row=$q->fetch_assoc()){
	$calidad=substr($row['agregado'], 0,2);
 $data[] = array(	
  'label' => $row['nom_paciente'].' '.$calidad.', '.$row['nss'],
  $nss=$row['nss'],
  $agregado=$row['agregado'],

 'href' => "windows/procesamientoPaciente/Modificacion.php?dato=".$nss."&agregado=".$agregado,
 );
}



echo json_encode($data);
flush(); 

?>