<?php


$host = "localhost";

$user = "root";

$password = "root";

$database = "inventario";

$con = mysql_connect($host,$user,$password) or die ("<script type='text/javascript'>alert('Problemas al conectar al servidor');</script>");

mysql_select_db($database,$con) or die ("<script type='text/javascript'>alert('Problemas al conectar a la based de datos');</script>");



?>