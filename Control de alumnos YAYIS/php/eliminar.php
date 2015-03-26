<?php 
	
	require("conexion.php");
		
	$con = mysql_connect($host,$user,$password) or die ("Problemas al conectar al servidor");
	#conexion a la base de datos
	mysql_select_db($database,$con) or die ("Problemas al conectar a la base de datos");

	#varaible id que ha sido mandada anteriormente
	$id = $_POST['id'];
	
	
	#query que da la instruccion a la base de datos de que hacer
	mysql_query("DELETE FROM alumnos WHERE ID = '$id'",$con) or die ("Problemas en eliminar".mysql_error());
	#se borra el elemento
	#se hace una nueva consulta con los nuevos valores
	$registro = mysql_query("SELECT * FROM alumnos ORDER BY ID ASC") or die ("Problemas en consulta".mysql_error());
	#se imprime dicha consulta
	echo '<div class="container"  id = "agrega_alumno">
    	<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="50">ID</th>
            	<th width="80">Apellido Paterno</th>
                <th width="80">Apellido Materno</th>
                <th width="80">Nombres</th>
                <th width="80">Fecha de nacimiento</th>
                <th width="80">Lugar de nacimiento</th>
                <th width="80">Domicilio</th>
                <th width="80">Ciudad</th>
                <th width="80">Colonia</th>
                <th width="80">Numero exterior</th>
                <th width="80">Telefono celular</th>
                <th width="80">Telefono fijo</th>
                <th width="50">Opciones</th>
            </tr>';
    while($reg = mysql_fetch_array($registro)){

	echo '<tr>
			<td>'.$reg['ID'].'</td>
			<td>'.$reg['Apellido_paterno'].'</td>
			<td>'.$reg['Apellido_materno'].'</td>
			<td>'.$reg['Nombre'].'</td>
			<td>'.$reg['Fecha_de_nacimiento'].'</td>
			<td>'.$reg['Lugar_de_nacimiento'].'</td>
			<td>'.$reg['Domicilio'].'</td>
			<td>'.$reg['Ciudad'].'</td>
			<td>'.$reg['Colonia'].'</td>
			<td>'.$reg['Numero_exterior'].'</td>
			<td>'.$reg['Telefono_movil'].'</td>
			<td>'.$reg['Telefono_fijo'].'</td>

			<td><a href="modificar.php?id='.$reg['ID'].';" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarAlumno('.$reg['ID'].');" class="glyphicon glyphicon-remove-circle"></a></td>
		</tr>';	
	}
echo '</table>
<br>

				<button id = "nuevo_alumno" class = "btn btn-primary" href = "../formulario.html">Nuevo alumno</button>
				<button class = "btn btn-danger" href="logout.php">Cerrar sesion</button>
</div> 
<hr>
	<footer>
	<div class="container text-center">
		<address>
		  <strong>Universidad Politecnica de Bacalar</strong><br>
		  Carretera Chetumal - Felipe Carrillo Puerto kilómetro 31<br>
		  C.P. 77930, Bacalar, Q.Roo.<br>
		  <p>Tel: (983) 83 4 23 40 y 83 4 23 68</p>
		</address>

		
	</div>
	<footer>';
?>