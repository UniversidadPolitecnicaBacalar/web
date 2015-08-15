<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {

	include("conexion.php");

	    //<input type="hidden" name="alta" value="producto">


	//verifica que se dara de alta

	$alta = $_POST['alta'];
	//producto

	if($alta == 'producto'){

		if (isset($_POST['stock']) 						&& !empty($_POST['stock']) 			&&
						isset($_POST['nombre']) 		&& !empty($_POST['nombre']) 		&&
						isset($_POST['marca']) 			&& !empty($_POST['marca']) 			&&
						isset($_POST['tipo'])			&& !empty($_POST['tipo']) 			&&
						isset($_POST['precio']) 		&& !empty($_POST['precio']) 		&&
						isset($_POST['costo']) 			&& !empty($_POST['costo']) 			&&
						isset($_POST['elaboracion'])	&& !empty($_POST['elaboracion']) 	&&
						isset($_POST['cantidad'])		&& !empty($_POST['cantidad']))

					{
						//variables del producto
						$stock 			= intval($_POST['stock']);
						$descripcion 	= $_POST['nombre'];
						$marca 			= $_POST['marca'];
						$tipo 			= $_POST['tipo'];
						$precio 		= $_POST['precio'];
						$costo 			= $_POST['costo'];
						$elaboracion	= $_POST['elaboracion'];
						$cantidad 		= $_POST['cantidad'];
						$provedor 		= $_POST['provedor'];

						if($costo > $precio){

							echo "El costo de elaboracion es mayor al precio al publico por ende no se puede dar de alta";
						}

						elseif($costo == $precio){

							echo "El costo de elaboracion es igual al precio al publico por ende no se puede dar de alta";
						}

						else{



							mysql_query("INSERT INTO productos (stock,
														descripcion, 
														marca, 
														tipo,
														precio,
														costo,
														elaboracion,
														cantidad,
														Id_provedor) VALUES ('$stock',
																			'$descripcion',
																			'$marca',
																			'$tipo',
																			'$precio',
																			'$costo',
																			'$elaboracion',
																			'$cantidad',
																			'$provedor')", $con) or die ("Problemas al guardar datos del producto");


							$respuesta = "Producto guardado correctamente";
												echo $respuesta;
							

							



						}

					}

					else{
						$respuesta = "Falta algun dato por llenar o tienes algun dato en cero";
												echo $respuesta;
					}


					





	}

	//cliente

	elseif ($alta == 'cliente') {


		if (isset($_POST['nombre']) 				&& !empty($_POST['nombre']) 		&&
						isset($_POST['numero']) 	&& !empty($_POST['numero']) 		&&
						isset($_POST['rfc']) 		&& !empty($_POST['rfc']) 			&&
						isset($_POST['estado'])		&& !empty($_POST['estado']) 		&&
						isset($_POST['direccion']) 	&& !empty($_POST['direccion']) 		&&
						isset($_POST['colonia']) 	&& !empty($_POST['colonia']) 		&&
						isset($_POST['noExterno'])	&& !empty($_POST['noExterno']) 		&&
						isset($_POST['ccp'])		&& !empty($_POST['ccp']))

					{
						//datos de cliente
						$nombre 	= $_POST['nombre'];
						$rfc 		= $_POST['rfc'];
						$numero 	= $_POST['numero'];
						$estado 	= $_POST['estado'];
						$direccion 	= $_POST['direccion'];
						$colonia 	= $_POST['colonia'];
						$noExterno	= $_POST['noExterno'];
						$ccp 		= $_POST['ccp'];

					mysql_query("INSERT INTO clientes (nombre,
														rfc, 
														numero, 
														estado,
														direccion,
														colonia,
														noExt,
														ccp) VALUES (	'$nombre',
																			'$rfc',
																			'$numero',
																			'$estado',
																			'$direccion',
																			'$colonia',
																			'$noExterno',
																			'$ccp')", $con) or die ("Problemas al guardar datos del cliente");


					echo "Cliente guardado";
					}

					else{
						echo "Falta algun dato por llenar en cliente";
					}

		
	}

	//provedor
	elseif ($alta == 'provedor') {


		if (isset($_POST['nombre']) 					&& !empty($_POST['nombre']) 		&&
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
						//variables del provedor
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

					mysql_query("INSERT INTO provedores (nombre,
														numero, 
														rfc,
														correo, 
														estado,
														ciudad,
														direccion,
														colonia,
														noExt,
														ccp,
														fechaEntrega) VALUES (	'$nombre',
																			'$numero',
																			'$rfc',
																			'$correo',
																			'$estado',
																			'$ciudad',
																			'$direccion',
																			'$colonia',
																			'$noExterno',
																			'$ccp',
																			'$fechaEntrega')", $con) or die ("Problemas al guardar datos del provedor");


					echo "Provedor guardado";
					}

					else{
						echo "Falta algun dato por llenar en provedor";
					}

		
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