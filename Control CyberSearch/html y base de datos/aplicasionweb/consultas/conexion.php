<?php
	class conexion{
		function recuperarDatos(){
			$host = "localhost";
			$user = "root";
			$pw = "ch123456789";
			$db = "bdcibersearch";

			$con = mysql_connect($host, $user, $pw) or die("No se pudo conectar a la base de datos ");
			mysql_select_db($db, $con) or die ("No se encontro la base de datos. ");
			$query = "SELECT * FROM ingresos_gastos";
			$resultado = mysql_query($query);

			while ($fila = mysql_fetch_array($resultado)) {
				echo " <tr>";
				echo "<td> $fila[Fecha]  </td> <td> $fila[HoraInicio] </td> <td> $fila[HoraFin] </td> <td> $fila[CantidadIngresos] </td> <td> $fila[GastosDiarios] </td> <br> ";
				echo " </tr> ";
			}

		}
	}
?>