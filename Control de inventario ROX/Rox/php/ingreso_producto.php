<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if (($_SESSION['acceso'] == 'Administrativo') || ($_SESSION['acceso'] == 'Operacion')) {

  include("conexion.php");

//se ejecutara si se cumple
  $id = $_POST['id'];
  $cuantos = $_POST['cuantos'];
 
  $resultado= mysql_query("SELECT * FROM productos WHERE Id_producto = '$id'",$con) or die ("Problemas en consultar stock");
	$array= mysql_fetch_assoc($resultado);
  $Id_producto=$array["Id_producto"];
	$enStock=$array["stock"];
  $x=intval($enStock);
  $y=intval($cuantos);
  $nuevoStock = $x + $y;
  mysql_query("UPDATE productos SET stock = '$nuevoStock' WHERE Id_producto = '$id'",$con) or die ("Problemas en modificar valores del stock");


  $nameUsername = $_SESSION['username'];
  $fechaIngreso = date("Y-m-d H:i:s");


  mysql_query("INSERT INTO ingresoproducto( productoAnterior,
                                            productoIngresado,
                                            productoNuevo,
                                            fechaIngreso,
                                            Id_producto,
                                            nameUsername) VALUES('$enStock',
                                                                  '$cuantos',
                                                                  '$nuevoStock',
                                                                  '$fechaIngreso',
                                                                  '$Id_producto',
                                                                  '$nameUsername')",$con) or die ("Problemas en guardar ingreso");

  if($cuantos < 0){
    echo("Stock era de $x y reduciste $y, un total de $nuevoStock en invetario");
  }

  else if ($cuantos > 0){
    echo("Stock era de $x e ingresaste $y, un total de $nuevoStock en invetario");

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