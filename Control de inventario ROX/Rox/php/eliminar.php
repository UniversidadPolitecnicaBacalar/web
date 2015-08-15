<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {

  include("conexion.php");
  //agarra las variables que se mandaron

  $who = $_POST['who'];
  $id = $_POST['id'];
  //condiciones que borran dependiendo de lo que le indico la pagina anterior
  if($who == 'Producto'){
 
		  mysql_query("DELETE FROM productos WHERE id_producto = '$id'",$con) or die ("Problemas en eliminar producto");


		  echo("Producto eliminado del inventario");


	}

  
  else if($who == 'Cliente'){
 
		  mysql_query("DELETE FROM clientes WHERE Id_cliente = '$id'",$con) or die ("Problemas en eliminar cliente");


		  echo("Cliente eliminado");


	}

  
  else if($who == 'Provedor'){
 
		  mysql_query("DELETE FROM provedores WHERE Id_provedor = '$id'",$con) or die ("Problemas en eliminar provedor");


		  echo("Provedor eliminado del inventario");


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