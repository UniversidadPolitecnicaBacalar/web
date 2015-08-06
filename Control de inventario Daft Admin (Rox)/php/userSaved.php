<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

	if ($_SESSION['acceso'] == 'Administrativo') {
		include("conexion_login.php");
    # code...
  

//se ejecutara si se cumple

if (isset($_POST['username']) 						&& !empty($_POST['username']) 		&&
						isset($_POST['password']) 		&& !empty($_POST['password']) 		&&
						isset($_POST['acceso']) 		&& !empty($_POST['acceso'])			&&
						isset($_POST['nombre']) 		&& !empty($_POST['nombre']) 		&&
						isset($_POST['numero']) 		&& !empty($_POST['numero']) 		&&
						isset($_POST['correo']) 		&& !empty($_POST['correo']) 		&&
						isset($_POST['rfc']) 			&& !empty($_POST['rfc']) 			&&
						isset($_POST['estado'])			&& !empty($_POST['estado']) 		&&
						isset($_POST['direccion']) 		&& !empty($_POST['direccion']) 		&&
						isset($_POST['colonia']) 		&& !empty($_POST['colonia']) 		&&
						isset($_POST['noExterno'])		&& !empty($_POST['noExterno']) 		&&
						isset($_POST['ccp'])			&& !empty($_POST['ccp'])){


		//creacion de variables
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$acceso		= $_POST['acceso'];
		$nombre 	= $_POST['nombre'];
		$rfc 		= $_POST['rfc'];
		$numero 	= $_POST['numero'];
		$correo		= $_POST['correo'];
		$estado 	= $_POST['estado'];
		$direccion 	= $_POST['direccion'];
		$colonia 	= $_POST['colonia'];
		$noExterno	= $_POST['noExterno'];
		$ccp 		= $_POST['ccp'];
		$fechaAlta 	= date("Ymd H:m:s");

		//md5, seguridad
		$pass = md5($password);


		//se inserta el empleado
		mysql_query("INSERT INTO empleados (nombre,
														rfc, 
														numero, 
														correo,
														estado,
														direccion,
														colonia,
														noExt,
														ccp) VALUES (	'$nombre',
																			'$rfc',
																			'$numero',
																			'$correo',
																			'$estado',
																			'$direccion',
																			'$colonia',
																			'$noExterno',
																			'$ccp')", $con) or die ("Correo electronico ya ocupado");
		//agarra el id del empleado ingresado	
		$empleadoInfo = mysql_query("SELECT Id_empleado FROM empleados WHERE nombre 	= '$nombre' 	AND
																			rfc 		= '$rfc'		AND
																			numero		= '$numero'		AND
																			correo 		= '$correo'		AND
																			estado		= '$estado'		AND
																			direccion 	= '$direccion' 	AND
																			colonia 	= '$colonia' 	AND
																			noExt 		= '$noExterno' 	AND
																			ccp 		= '$ccp' ", $con) or die ("Problemas al buscar empleado");
		$arrayEmpleado = mysql_fetch_assoc($empleadoInfo);
		$idUser = $arrayEmpleado['Id_empleado'];

		//foto del usuario

		$uploadedfileload	=	"true";
		$uploadedfile_size	=	$_FILES[uploadedfile][size];
		$file_name = $_FILES[uploadedfile][name];

		if ($uploadedfile_size>200000){
			$uploadedfileload="false";
		}

		if  (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/gif" OR $_FILES[uploadedfile][type] =="image/png")){
			$msg=$msg." No se ha podido subir $file_name puede que el formato <br> es incorrecto o el tamaño es mayor a 200 KB. <br><br> El archivo tiene que ser una imagen en formato JPG, PNG o GIF <br>	y debe ser menor a 200 KB. Otros formatos de imagenes <br> o archivos no son permitidos.<BR>";
			$uploadedfileload="false";
		}

		$add="../images/users/$file_name";

		if($uploadedfileload=="true"){
			if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
				echo " $file_name ha sido subido satisfactoriamente";
		}else{
			echo " Error al subir $file_name";
		}

		}else{
			echo $msg;
		}

    	//inserta el usuario ya con las variables consultadas

		mysql_query("INSERT INTO usuarios(username,
											password,
											Id_area,
											Id_empleado,
											fechaAlta,
											estatus) VALUES('$username',
															'$pass',
															'$acceso',
															'$idUser',
															'$fechaAlta',
															1)", $con) or die ("Ya existe este usuario o correo electronico");


		

    	

				echo "Nuevo usuario guardado correctamente";
		} 
		 

	

	else{
		echo "Falta algun dato por llenar del nuevo usuario";
	}

 
	}
	else {
	//de caso contrario redireciona al login
	echo "<script>history.back();</script>";
	}

	} else {
	//de caso contrario redireciona al login
	echo "<script>history.back();</script>";
	}
?>