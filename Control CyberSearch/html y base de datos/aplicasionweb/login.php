<?php

$nombre = $_POST['usuario'];
$pass = $_POST['pass'];
$contra= md5($pass);
mysql_connect('localhost','root','ch123456789') or die ('Problema al conectar el servidor');
mysql_select_db('bdcibersearch') or die ('error al tratar de conectar la base de datos');


$admin = mysql_query("SELECT * FROM usuarios where usuario = '$nombre' and contrasenia = '$contra'") or die ("No consulta");
$row = mysql_fetch_array($admin);

if($row>0){

	header("Location: gastos.html");
	

	}else {
		echo "ERROR CONTRASENA O NOMBRE DE USUARIO INCORRECTO";

	}

?>