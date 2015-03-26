<?php 
	
	require('conexion.php');
	
	#variables para un mejor manejo
	$ID= $_POST['id'];
	$apellidoPaterno = $_POST['apellidoPaterno'];
	$apellidoMaterno = $_POST['apellidoMaterno'];
	$nombre = $_POST['nombre'];			
	$fechaNacimiento = $_POST['fechaNacimiento'];
	$lugarNacimiento = $_POST['lugarNacimiento'];
	$domicilio = $_POST['domicilio']; 		
	$colonia = $_POST['colonia']; 
	$ciudad = $_POST['ciudad']; 		
	$numeroExterior = $_POST['numeroExterior'];
	$telefonoMovil = $_POST['telefonoMovil'];
	$telefonoFijo = $_POST['telefonoFijo'];
	#conexion al servidor
	#conexion al servidor
	$con = new mysqli($host, $user, $password) or die ("Problemas al conectar al servidor");
	#conexion a la base de datos
	mysqli_select_db($con,$database) or die ("Problemas al conectar a la base de datos");

	#variable donde trae todo de la base de datos                                    #si hay problemas la funcion nos indica cual es
	//con mysqli_query, priemro recibe la conexion 	#actualiza toda la informacion
	mysqli_query($con,"UPDATE alumnos SET Apellido_paterno = '$apellidoPaterno',
											Apellido_materno = '$apellidoMaterno',
											Nombre = '$nombre',
											Fecha_de_nacimiento = '$fechaNacimiento',
											Lugar_de_nacimiento = '$lugarNacimiento',
											Domicilio = '$domicilio',
											Colonia = '$colonia',
											Ciudad = '$ciudad',
											Numero_exterior = '$numeroExterior',
											Telefono_movil = '$telefonoMovil',
											Telefono_Fijo = '$telefonoFijo'
											WHERE ID='$ID'") or die ("Problemas en modificar".mysql_error());
		




header('Location: consulta.php');	
?>