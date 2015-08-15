
<?php
session_start();
include("../conexion/conexionMysql.php");
Crear_Conexion();
$username=$_REQUEST["username"];
$usuarioIniciado=$_SESSION['username'];
$pass=$_REQUEST["password"];
if($pass=="eliminarUsuario"){
	if($username==$usuarioIniciado){
		echo"No se puede";
	}
	else{
	
		$buscarUsuario=mysql_query("SELECT * FROM empleado WHERE usuario='$username'");
		$coinciden = mysql_num_rows($buscarUsuario);

    	if($coinciden>0){
    		while ($row = mysql_fetch_assoc($buscarUsuario)) {
   				$id_empleado=$row['id_empleado'];
 			}
    		$dependiente=mysql_query("SELECT * FROM paciente WHERE id_empleado='$id_empleado'");
    		$coincidenDependiente =mysql_num_rows($dependiente);
    		if($coincidenDependiente>0){
    			echo"Depende";
    		}
    		else{
			$eliminar=mysql_query("DELETE FROM empleado WHERE usuario='$username'");
        	echo"Usuario ha sido eliminado correctamente";
        	}
        
    }

    else{
        echo"El usuario no existe";
    }
}
}
else{
	echo"Fallo";
}

?>
</section>
