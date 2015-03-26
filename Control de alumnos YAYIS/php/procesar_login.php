<?php
		#incluye los datos de conexion.php
		include("conexion.php");
		//crea variables con los datos posteados en el formulario
		$username = addslashes($_POST['username']);
		$pass = addslashes($_POST['password']);
		$password = md5($pass);

					#crea una conexion al host //checar "localhost"
					$con = mysql_connect("localhost","root","") or die ("Problema al conectar");
					#conecta a la base de datos #requiere conexion a host
					mysql_select_db($database,$con) or die ("Problema al conectar al DB");

					#consulta e inseta en __________ los valores __________
					$consulta = mysql_query("SELECT * FROM  usuarios WHERE username = '$username' AND password = '$password'"); 
					$consulta2 = mysql_fetch_array($consulta);
					//condicion donde la consulta devuelve un valor, si esta es mayor a 1, se genera lo siguiente
					if ($consulta2>1) {
						//se crea una sesion
						session_start();
							//sesion toma el valor de las variables________
							$_SESSION['username'] = $username;
							$_SESSION['password'] = $password;
							//redirecciona
							header("Location: consulta.php");
						}
						//si no se cumple la funcion
						else
						{
							//redireccion
							header("Location: ../login.html");
						}
					
				
?>