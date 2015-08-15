<?php
	 
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$user=$_POST["usuario"];
	$pass=$_POST["password"];

	if ($nombre=="" or $apellido=="" or $user=="" or $pass=="" ){

	 	echo "<script lenguage='javascript'>
            alert('Datos incompletos');
            location.replace('registro.php');
            </script>";

	 }

	else{

	 
		 $conexion = mysql_connect($host_db, $user_db, $pass_db);
		 
		 mysql_select_db('restaurante', $conexion) or die("No se puede seleccionar la base de datos.");;
		 
		 $buscarUsuario = "SELECT * FROM alta_login WHERE usuario = '$_REQUEST[usuario]' ";
		 
		 $result = mysql_query($buscarUsuario);

		 $count = mysql_num_rows($result);
		 
		 if ($count == 1){
		 	echo "<script lenguage='javascript'>
            alert('El nombre de usuario ya existe, por favor elija otro');
            location.replace('registro.php');
            </script>";
		exit;
		 }
		else{
		 
		 $query = "INSERT INTO alta_login (nombre, apellido, usuario, password) VALUES ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[usuario]', '$_REQUEST[password]' )";
		 
		if (!mysql_query($query, $conexion))
		 {
		die('Error: ' . mysql_error());
		 	echo "<script lenguage='javascript'>
            alert('Error al crear un usuario');
            location.replace('registro.php');
            </script>";
		 }
		 
		else{
		 	echo "<script lenguage='javascript'>
            alert('Registro exitoso, por favor inicie sesion.');
            location.replace('login.php');
            </script>";
		 }
		 
		 }
		 
		mysql_close($conexion);
	}
	 
	?>
