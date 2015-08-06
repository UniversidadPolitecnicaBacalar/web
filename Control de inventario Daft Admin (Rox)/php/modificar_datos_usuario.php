<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if (($_SESSION['acceso'] == 'Administrativo') || ($_SESSION['acceso'] == 'Operacion')) {


	if (isset($_POST['correoOriginal']) && !empty($_POST['correoOriginal'])	&&
		isset($_POST['nombre']) 		&& !empty($_POST['nombre']) 		&&
		isset($_POST['numero']) 		&& !empty($_POST['numero']) 		&&
		isset($_POST['correo']) 		&& !empty($_POST['correo']) 		&&
		isset($_POST['rfc']) 			&& !empty($_POST['rfc']) 			&&
		isset($_POST['estado'])			&& !empty($_POST['estado']) 		&&
		isset($_POST['direccion']) 		&& !empty($_POST['direccion']) 		&&
		isset($_POST['colonia']) 		&& !empty($_POST['colonia']) 		&&
		isset($_POST['noExterno'])		&& !empty($_POST['noExterno']) 		&&
		isset($_POST['ccp'])			&& !empty($_POST['ccp']))
	{


		include("conexion_login.php");


		//creacion de variables
		$correoOriginal 	= $_POST['correoOriginal'];
		$nombre 			= $_POST['nombre'];
		$rfc 				= $_POST['rfc'];
		$numero 			= $_POST['numero'];
		$correo				= $_POST['correo'];
		$estado 			= $_POST['estado'];
		$direccion 			= $_POST['direccion'];
		$colonia 			= $_POST['colonia'];
		$noExterno			= $_POST['noExterno'];
		$ccp 				= $_POST['ccp'];	

		$consultaId = mysql_query("SELECT Id_empleado FROM empleados WHERE correo = '$correoOriginal'",$con) or die ("No se pudo encontrar empleado");
		$arrayId = mysql_fetch_assoc($consultaId);
		$Id_empleado = $arrayId['Id_empleado'];


		if(isset($_POST['passwordOriginal']) 	&& empty($_POST['passwordOriginal']) &&
			isset($_POST['passwordNueva']) 		&& empty($_POST['passwordNueva']))
		{



			mysql_query("UPDATE empleados set nombre 		= '$nombre',
												rfc 		= '$rfc',
												numero		= '$numero',
												correo		= '$correo',
												estado		= '$estado',
												direccion 	= '$direccion',
												colonia		= '$colonia',
												noExt 		= '$noExterno',
												ccp 		= '$ccp' 
												WHERE Id_empleado = '$Id_empleado'",$con) or die ("No se pudo modificar los valores del usuario");	
			
			echo "Datos modificados correctamente";

		}
		elseif(isset($_POST['passwordOriginal']) 	&& !empty($_POST['passwordOriginal']) &&
			isset($_POST['passwordNueva']) 			&& !empty($_POST['passwordNueva'])){

			$antiguaPass = $_POST['passwordOriginal'];
			$nuevaPass = $_POST['passwordNueva'];

			$aP = md5($antiguaPass);
			$nP = md5($nuevaPass);
			$consultaPass = mysql_query("SELECT password FROM usuarios WHERE Id_empleado='$Id_empleado'",$con) or die ("Problemas en encontrar la contraseña antigua");
			$arrayPass = mysql_fetch_assoc($consultaPass);

			if ($aP == $arrayPass['password']) {


				mysql_query("UPDATE usuarios set password ='$nP' WHERE Id_empleado = '$Id_empleado'",$con) or die ("No se pudo actualizar contraseña");
				mysql_query("UPDATE empleados set nombre 		= '$nombre',
												rfc 		= '$rfc',
												numero		= '$numero',
												correo		= '$correo',
												estado		= '$estado',
												direccion 	= '$direccion',
												colonia		= '$colonia',
												noExt 		= '$noExterno',
												ccp 		= '$ccp' 
												WHERE Id_empleado = '$Id_empleado'",$con) or die ("No se pudo modificar los valores del usuario");	
			
				echo "Datos modificados correctamente";


				
			}
			else{
				echo "Contraseña actual incorrecta";
			}



		}
		else{
			echo "Tiene un campo vacio";
		}


		

	}
	else{

		echo "Falta algun dato por llenar";

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