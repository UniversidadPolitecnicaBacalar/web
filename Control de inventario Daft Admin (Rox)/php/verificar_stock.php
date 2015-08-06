<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Operacion' || $_SESSION['acceso'] == 'Administrativo') {
//se ejecutara si se cumple
include("conexion.php");




$verificar = $_POST['verificar'];




//$resultado= mysql_query("SELECT descripcion FROM productos where stock <= 10",$con) or die ("Problemas en consultar stock");
//$aR = mysql_fetch_array($resultado);
$resultado= mysql_query("SELECT descripcion, stock FROM `productos` WHERE stock <= 10 ORDER BY descripcion ASC",$con) or die ("Problemas en consultar stock");
$resultado2= mysql_query("SELECT descripcion, stock FROM `productos` WHERE stock <= 10 ORDER BY descripcion ASC",$con) or die ("Problemas en consultar stock");
$cadena = "";

/*$contar = mysql_query("SELECT COUNT(*) FROM productos where stock <= 10",$con) or die ("Problemas en consultar stock");
$cuenta = mysql_fetch_assoc($contar);
$contar2 = $cuenta['COUNT(*)'];
$comparacion = 1;*/


if($i = mysql_fetch_assoc($resultado2)){
	echo ' <table class="striped centered">
		    <thead>
	          <tr>
	            <th>Producto</th>
	            <th>Cantidad Restante</th>
	          </tr>
		    </thead>
		    <tbody>';
	while ($arrayResultado = mysql_fetch_assoc($resultado)) {
		echo "<tr>";
		echo "<td>".$arrayResultado["descripcion"]. "</td>";
		echo "<td>".$arrayResultado["stock"]. "</td>";
		echo "</tr>";

			/*$cadena .= $arrayResultado['descripcion'];
			if ($comparacion < $contar2 ){
				$cadena .= ', ';
				$comparacion++;
			}
		
		$x++;*/
	}
	echo "</tbody>
	     </table>";
	//echo $cadena;
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