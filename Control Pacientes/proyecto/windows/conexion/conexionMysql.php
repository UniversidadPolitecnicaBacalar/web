<?php

		function Crear_Conexion() {
			
			mysql_connect("localhost","root","")or die ('Ha fallado la conexión con el servidor: '.mysql_error());
			mysql_select_db('bd_paciente')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
			
			
		}
		//Cerrar la conexion a la Base de Datos
			
		?>

