<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {
    # code...
  


	include('conexion.php');
	$id 			= $_POST['id'];
	$edicion		= $_POST['edicion'];


	if($edicion == 'Producto'){


		if (isset($_POST['stock']) 						&& !empty($_POST['stock']) 			&&
						isset($_POST['nombre']) 		&& !empty($_POST['nombre']) 		&&
						isset($_POST['marca']) 			&& !empty($_POST['marca']) 			&&
						isset($_POST['tipo'])			&& !empty($_POST['tipo']) 			&&
						isset($_POST['precio']) 		&& !empty($_POST['precio']) 		&&
						isset($_POST['costo']) 			&& !empty($_POST['costo']) 			&&
						isset($_POST['elaboracion'])	&& !empty($_POST['elaboracion']) 	&&
						isset($_POST['cantidad'])		&& !empty($_POST['cantidad'])		&&
						isset($_POST['provedor'])		&& !empty($_POST['provedor']))

					{
		
		
		#variables para un mejor manejo
		

		$stock 			= $_POST['stock'];
		$descripcion 	= $_POST['nombre'];
		$marca 			= $_POST['marca'];
		$tipo 			= $_POST['tipo'];
		$precio 		= $_POST['precio'];
		$costo 			= $_POST['costo'];
		$elaboracion	= $_POST['elaboracion'];
		$cantidad 		= $_POST['cantidad'];
		$provedor 		= $_POST['provedor'];



		if($costo > $precio){

			echo "El costo de elaboracion es mayor al precio al publico por ende no se puede modificar el producto";
		}

		elseif($costo == $precio){

			echo "El costo de elaboracion es igual al precio al publico por ende no se puede modificar el producto";
		}

		else{

		mysql_query("UPDATE productos SET 	stock 		= '$stock',
											descripcion = '$descripcion',
											marca		= '$marca',
											tipo 		= '$tipo',
											precio 		= '$precio',
											costo 		= '$costo',
											elaboracion = '$elaboracion',
											cantidad 	= '$cantidad',
											Id_provedor = '$provedor'
											WHERE id_producto ='$id'", $con) or die ("Problemas en modificar producto");



			echo "Datos del producto modificados correctamente";
			}
		}

		else{
			echo "Falta algun dato del producto por llenar o tienes algun valor en 0";
		}




	}

	else if($edicion == 'Cliente'){



		if (isset($_POST['nombre']) 			&& !empty($_POST['nombre']) 		&&
					isset($_POST['rfc']) 		&& !empty($_POST['rfc']) 			&&
					isset($_POST['numero']) 	&& !empty($_POST['numero']) 		&&
					isset($_POST['estado'])		&& !empty($_POST['estado']) 		&&
					isset($_POST['direccion']) 	&& !empty($_POST['direccion']) 		&&
					isset($_POST['colonia']) 	&& !empty($_POST['colonia']) 		&&
					isset($_POST['noExterno'])	&& !empty($_POST['noExterno']) 		&&
					isset($_POST['ccp'])		&& !empty($_POST['ccp']))

				{
					$nombre 	= $_POST['nombre'];
					$rfc 		= $_POST['rfc'];
					$numero 	= $_POST['numero'];
					$estado 	= $_POST['estado'];
					$direccion 	= $_POST['direccion'];
					$colonia 	= $_POST['colonia'];
					$noExterno	= $_POST['noExterno'];
					$ccp 		= $_POST['ccp'];

		mysql_query("UPDATE clientes SET 	nombre 		= '$nombre',
											rfc 		= '$rfc',
											numero 		= '$numero',
											estado 		= '$estado',
											direccion 	= '$direccion',
											colonia 	= '$colonia',
											noExt 		= '$noExterno',
											ccp 		= '$ccp'
											WHERE Id_cliente='$id'", $con) or die ("Problemas en modificar cliente");



			echo "Datos del cliente modificados correctamente";
			}

		else
			{
			echo "Falta algun dato del cliente por llenar";
		}



	}
		else if($edicion == 'Provedor'){



		if (isset($_POST['nombre']) 				&& !empty($_POST['nombre']) 		&&
					isset($_POST['rfc']) 			&& !empty($_POST['rfc']) 			&&
					isset($_POST['numero']) 		&& !empty($_POST['numero']) 		&&
					isset($_POST['correo']) 		&& !empty($_POST['correo']) 		&&
					isset($_POST['estado'])			&& !empty($_POST['estado']) 		&&
					isset($_POST['ciudad']) 		&& !empty($_POST['ciudad']) 		&&
					isset($_POST['direccion']) 		&& !empty($_POST['direccion']) 		&&
					isset($_POST['colonia']) 		&& !empty($_POST['colonia']) 		&&
					isset($_POST['noExterno'])		&& !empty($_POST['noExterno']) 		&&
					isset($_POST['ccp'])			&& !empty($_POST['ccp'])			&&
					isset($_POST['fechaEntrega'])	&& !empty($_POST['fechaEntrega']))

				{
					$nombre 		= $_POST['nombre'];
					$rfc 			= $_POST['rfc'];
					$numero 		= $_POST['numero'];
					$correo 		= $_POST['correo'];
					$estado 		= $_POST['estado'];
					$ciudad 		= $_POST['ciudad'];
					$direccion 		= $_POST['direccion'];
					$colonia 		= $_POST['colonia'];
					$noExterno		= $_POST['noExterno'];
					$ccp 			= $_POST['ccp'];
					$fechaEntrega 	= $_POST['fechaEntrega'];

		mysql_query("UPDATE provedores SET 	nombre 		= '$nombre',
											rfc 		= '$rfc',
											numero 		= '$numero',
											correo 		= '$correo',
											estado 		= '$estado',
											ciudad 		= '$ciudad',
											direccion 	= '$direccion',
											colonia 	= '$colonia',
											noExt 		= '$noExterno',
											ccp 		= '$ccp',
											fechaEntrega = '$fechaEntrega'
											WHERE Id_provedor ='$id'", $con) or die ("Problemas en modificar provedor");



			echo "Datos del provedor modificados correctamente";
			}

		else
			{
			echo "Falta algun dato del provedor por llenar";
		}



	}
	//falta proovedor


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