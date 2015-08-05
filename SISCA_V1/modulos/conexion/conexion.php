<?php


define("DBHOST4","localhost");

define("DBUSUARIO4","root");

define("DBPASS4","");

define("DBNOMBRE4","db_sisca");







function mysqli_conexion(){

	$mysqli ;



	$mysqli = mysqli_connect(DBHOST4, DBUSUARIO4, DBPASS4, DBNOMBRE4) or die ("No se conecto: " . mysqli_error());

		
	

	$mysqli->query("SET NAMES utf8"); //Para que lea los acentos de la DB

	

	return $mysqli;

}



$mysqli = mysqli_conexion();

?>