<?php


if(isset($_POST['username'])	&& !empty($_POST['username'])	&&
	isset($_POST['password'])	&& !empty($_POST['password'])	&&
	isset($_POST['acceso'])		&& !empty($_POST['acceso']))
{
		#incluye los datos de conexion.php
		include("conexion_login.php");

		//crea variables con los datos posteados en el formulario
		$username = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);
		$acceso = mysql_real_escape_string($_POST['acceso']);
		$password = md5($pass);


					#consulta e inseta en __________ los valores __________
					$consulta = mysql_query("SELECT * FROM  usuarios WHERE username = '$username'") or die ("Problemas en base de datos en buscar usuario"); 
					$consulta2 = mysql_fetch_array($consulta);
					//condicion donde la consulta devuelve un valor, si esta es mayor a 1, se genera lo siguiente
					if ($consulta2>1) {

						$consulta = mysql_query("SELECT * FROM  usuarios WHERE username = '$username' AND password = '$password'") or die ("Problemas en base de datos en buscar contraseña"); 
						$consulta2 = mysql_fetch_array($consulta);
						if ($consulta2>1) {


							$consulta = mysql_query("SELECT * FROM  usuarios WHERE username = '$username' AND password = '$password' AND Id_area = '$acceso'") or die ("Problemas en base de datos en buscar area"); 
							$consulta2 = mysql_fetch_array($consulta);
							if ($consulta2>1) {

								$consulta = mysql_query("SELECT * FROM  usuarios WHERE username = '$username' AND password = '$password' AND Id_area = '$acceso' AND estatus = 1") or die ("Problemas en base de datos en buscar estatus"); 
								$consulta2 = mysql_fetch_array($consulta);
								if ($consulta2>1) {

									//se crea una sesion
									session_start();
									//sesion toma el valor de las variables________
									$_SESSION['username'] = $consulta2['username'];
									//$_SESSION['password'] = $consulta2['password'];

									if ($consulta2['Id_area'] == 1) {

										$area = "Administrativo";


									}

									elseif ($consulta2['Id_area'] == 2) {
										$area = "Operacion";
									}




									$_SESSION['acceso'] = $area;
									//redirecciona



									echo $area;


								}

								else 
								{
									echo "Usuario no activo";
								}



							}
							else 
								{
									echo "Area incorrecta";
								}
							}
							//si no se cumple la funcion
						else
							{
								//redireccion
								echo "Contraseña incorrecta";
							}
						}
						
					else
						{
							echo "No existe usuario";
						}


					}
					else{
						echo "Falta datos por llenar";
					}
				
?>