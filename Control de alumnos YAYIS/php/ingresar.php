<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">

		<title>Registro de alumnos.</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<style type="text/css">
#YAYIS {

margin-top: 20px;
margin-left: 400px;
width: 200px;

}
</style>
		
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
				      <li class="active"><a href="#">Alta alumnos</a></li>
				      <li><a href="consulta.php">Consulta base de datos</a></li>
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
			
			<div class="container">
				<figure>
					<img class = "img-responsive" src="../img/upb.png" height = "900" width = "285" alt="Universidad Politecnica de Bacalar">
					<br>
				</figure>
				<ol class="breadcrumb">
					  
					  <li><a href="../index.html">Inicio</a></li>
					  <li><a href="../formulario.html">Formulario</a></li>
					  <li class="active">Ingresar datos</li>
					</ol>
				
				<hr>
				
				<div class="jumbotron">

					<figure>
						<img id = "YAYIS" class = "img-responsive" src = "../img/YAYIS GRANDE HACKED.png" alt = "Universidad Politécnica de Bacalar" align = "center" width = "50%">
						<br>
					</figure>

			</div>
			</div>
		<div class="container">
			<button class = "btn btn-primary" type="submit" value="enviar" onclick = "location='../index.html'">Regresar al menú anterior.</button>
								<blockquote class = "pull-right">
					  <p>
		<?php
		#incluye los datos de conexion.php
		include("conexion.php");
				# checa si no falta nada en las variables
				if (isset($_POST['apellidoPaterno']) 	&& !empty($_POST['apellidoPaterno']) &&
					isset($_POST['apellidoMaterno']) 	&& !empty($_POST['apellidoMaterno']) &&
					isset($_POST['nombre'])			 	&& !empty($_POST['nombre']) 		 &&
					isset($_POST['fechaNacimiento']) 	&& !empty($_POST['fechaNacimiento']) &&
					isset($_POST['lugarNacimiento'])	&& !empty($_POST['lugarNacimiento']) &&
					isset($_POST['domicilio']) 			&& !empty($_POST['domicilio'])		 &&
					isset($_POST['colonia']) 			&& !empty($_POST['colonia'])		 &&
					isset($_POST['ciudad']) 			&& !empty($_POST['ciudad'])			&&
					isset($_POST['numeroExterior']) 	&& !empty($_POST['numeroExterior'])	 &&
					isset($_POST['telefonoFijo']) 		&& !empty($_POST['telefonoFijo'])	 &&
					isset($_POST['telefonoMovil']) 		&& !empty($_POST['telefonoMovil']))
				{
					#crea una conexion al host 
					$con = mysql_connect($host,$user,$password) or die ("Problema al conectar");
					#conecta a la base de datos #requiere conexion a host
					mysql_select_db($database,$con) or die ("Problema al conectar al DB");

					#consulta e inseta en __________ los valores __________
					mysql_query("INSERT INTO alumnos (APELLIDO_PATERNO, 
														APELLIDO_MATERNO, 
														NOMBRE, 
														FECHA_DE_NACIMIENTO, 
														LUGAR_DE_NACIMIENTO, 
														DOMICILIO, 
														COLONIA, 
														CIUDAD,
														NUMERO_EXTERIOR, 
														TELEFONO_MOVIL,
														TELEFONO_FIJO) 
								VALUES ('$_POST[apellidoPaterno]', 
										'$_POST[apellidoMaterno]', 
										'$_POST[nombre]', 
										'$_POST[fechaNacimiento]',
										'$_POST[lugarNacimiento]', 
										'$_POST[domicilio]', 
										'$_POST[colonia]',
										'$_POST[ciudad]', 
										'$_POST[numeroExterior]', #finalizar con la variable de la conexion
										'$_POST[telefonoMovil]',
										'$_POST[telefonoFijo]')", $con);
					echo "Datos guardados correctamente<br>";
				}
			else
			{
				echo "Problema al insertar datos<br>";
			}
			
		?>

			</p>
			<small>Ingreso de datos <cite title="Source Title">YAYIS</cite></small>
			</blockquote>
		</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		    <script src="../js/jQuery.js"></script>
			<script src="../js/bootstrap.js"></script>
			<script src="../js/jquery.js"></script>

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