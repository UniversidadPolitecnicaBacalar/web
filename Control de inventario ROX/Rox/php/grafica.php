<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if (($_SESSION['acceso'] == 'Administrativo') || ($_SESSION['acceso'] == 'Operacion')) {

include("conexion.php");




$id=$_GET['id'];

$archivo = mysql_query("SELECT datosHtml FROM cortes WHERE Id_corte='$id' ") or die ("Problemas en consulta".mysql_error());
$reg = mysql_fetch_array($archivo);




header("Content-type: text/html");
echo $reg['datosHtml'];
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