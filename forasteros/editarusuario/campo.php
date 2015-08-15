<?php
include_once("conexion.php"); 
// Pasamos los datos del formulario. 
$id= $_REQUEST['idalta_login']; 
$nombre = $_REQUEST['usuario']; 
$password = $_REQUEST['password'];
$password1 = $_REQUEST['password1'];

if($password != $password1){ 
	 	echo "<script lenguage='javascript'>
            alert('La contraseñas no coinciden');
            location.replace('editar.php');
            </script>";
		}else{ 
			// Pasamos los datos para actualizarlos en la tabla. 
			$ssql = "UPDATE `alta_login` SET `idalta_login`='$id',`usuario`='$nombre',`password`='$password' WHERE `idalta_login`='$id'"; 
			// Liberamos los datos con la condición if.

				if (mysql_query($ssql)) {
					echo "<script lenguage='javascript'>
						alert('Datos actualizados');
					    location.replace('actualizar.php');
					    </script>";
				} else {
					echo "<script lenguage='javascript'>
						alert('Error al actualizar datos');
					    location.replace('actualizar.php');
					    </script>";
				}
			}
// Mostramos los datos. 
// Cerramos la conexion con el servidor. 
mysql_close($conexion); 
?>