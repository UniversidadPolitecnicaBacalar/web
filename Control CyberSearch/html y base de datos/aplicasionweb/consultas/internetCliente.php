<?php
	class conexion{
		function recuperarDatos(){
			$host = "localhost";
			$user = "root";
			$pw = "ch123456789";
			$db = "bdcibersearch";

			$con = mysql_connect($host, $user, $pw) or die("No se pudo conectar a la base de datos ");
			mysql_select_db($db, $con) or die ("No se encontro la base de datos. ");
			$query = "SELECT * FROM registrocliente";
			$resultado = mysql_query($query);

			while ($fila = mysql_fetch_array($resultado)) {
				echo " <tr>";
				echo "<td> $fila[Nombre]  </td> <td> $fila[Direccion] </td> <td> $fila[Telefono] </td> <td> $fila[FechaContrato] </td><br> ";
				echo " </tr> ";
			}

		}
	}
?>