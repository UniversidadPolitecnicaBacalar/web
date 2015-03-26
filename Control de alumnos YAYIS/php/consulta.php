<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
if (isset($_SESSION['username']) && isset($_SESSION['password'])){
//se ejecutara si se cumple
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta de toda la base de datos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.css">
		
</head>
<body>
		<div class="container">
				<div class="navbar navbar-default">
				  <div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				    <a class="navbar-brand" href="#">Control de alumnos</a>
				  </div>
				  <div class="navbar-collapse collapse navbar-responsive-collapse">
				    <ul class="nav navbar-nav">
				      <li><a href="../index.html">Inicio</a></li>
				      <li><a href="../formulario.html">Alta alumnos</a></li>
				      <li class="active"><a href="#">Consulta base de datos</a></li>
				      <li><a href="listapdf.php">FPDF</a></li>
				      <li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Extras<b class="caret"></b></a>
				        <ul class="dropdown-menu">
				          <li><a href="https://mail.google.com/">Gmail</a></li>
				          <li class="divider"></li>
				          <li class="dropdown-header">Universidad Politecnica de Bacalar</li>
				          <li><a href="https://www.upb.edu.mx/">UPB</a></li>
				          <li><a href="http://www.upb.edu.mx/sise/inscripciones/">SISE</a></li>
				          <li><a href="https://mail.google.com/">Correo Institucional</a></li>
				        </ul>
				      </li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
				      <li><a href="#">Contacto</a></li>
				      
				    </ul>
				  </div>
				</div>
			</div>
			

<div class="row">
	<div class="container">
		<figure>
			<img class = "img-responsive" src="../img/upb.png" height = "900" width = "285" alt="Universidad Politecnica de Bacalar">
			<br>
			<ol class="breadcrumb">
				<li> <a href="../index.html">Inicio</a></li>
				<li class="active">Consulta de toda la base de datos</li>
			</ol>
			<hr>
		</figure>
	</div>
</div>

<div class="container">	
	<form class="form-horizontal" role="form" method = "POST" action = "buscar.php">
	    <div class="form-group form-group-md">
	      <label class="col-md-2 control-label" for="md">Busqueda: </label>
	      	<div class="col-md-9">
		        <input class = "form-control" type="text" placeholder = "Buscar por cualquier dato" name = "busqueda_alumno" autofocus="">
		      	
			</div>
	    </div>
	</form>
	<br>
</div>	
<div class="container"  id = "agrega_alumno">
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
            </tr>


<?php


include("conexion.php");

#conexion al servidor
$con = mysql_connect($host,$user,$password) or die ("Problemas al conectar al servidor");
#conexion a la base de datos
mysql_select_db($database,$con) or die ("Problemas al conectar a la base de datos");


#variable donde trae todo de la base de datos                                    #si hay problemas la funcion nos indica cual es
$registro = mysql_query("SELECT * FROM alumnos ORDER BY ID ASC") or die ("Problemas en consulta".mysql_error());

#while donde muestra todo de la base de datos
#ayuda a traer en forma de lista lo que esta en una tabla, se traen los datos de la varible registro que es la consulta
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
?>

</table>
<br>

      
				<button id = "nuevo_alumno" class = "btn btn-primary" type="submit" value="enviar" onclick = "location='../formulario.html'">Nuevo alumno</button>
				<button class = "btn btn-danger" type="submit" value="logout" onclick = "location='logout.php'">Cerrar sesion</button>

      

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		    <script src="../js/jQuery.js"></script>
			<script src="../js/bootstrap.js"></script>
			<script src="../js/myjava.js"></script>


</body>
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
	<footer>
</html>

<?php 

} else {
//de caso contrario redireciona al login
header('Location:../login.html');
}
?>