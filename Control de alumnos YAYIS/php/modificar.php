<?php
	
	require('conexion.php');
	
	$id=$_GET['id'];
	

	#conexion al servidor
	$con = new mysqli($host, $user, $password) or die ("Problemas al conectar al servidor");
	#conexion a la base de datos
	mysqli_select_db($con,$database) or die ("Problemas al conectar a la base de datos");

	#variable donde trae todo de la base de datos                                    #si hay problemas la funcion nos indica cual es
	//con mysqli_query, priemro recibe la conexion
	$registro = mysqli_query($con,"SELECT * FROM alumnos WHERE ID='$id'") or die ("Problemas en consulta".mysql_error());
		

		$row = $registro->fetch_array();

	#<?php echo $id; (falta el cierre del php) #imprimira el valor en donde se indica
?>	

			
<!DOCTYPE html>
<html lang = "es">
	<head>
		<meta charset = "UTF-8">

		<title>	Editar de alumnos.</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/bootstrap.css">
				<script language = "javascript" src = "../js/validarFormulario.js">
					</script>
		
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
			

		<div class="container">
			<figure>
				<img class = "img-responsive" src="../img/upb.png" height = "900" width = "285" alt="Universidad Politecnica de Bacalar">
				<br>
				<ol class="breadcrumb">
					  <li> <a href="../index.html">Inicio</a></li>
					  <li> <a href="consulta.php">Consulta base de datos</a></li>
					  <li class="active">Editar alumno</li>
					</ol>
				<hr>
			</figure>

		<form action = "modificar_alumno.php" method = "POST" name = "formulario" id = "formulario">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="row">
				<div class="form-group has-feedback pull-left" style = "width: 49%;">
					<label for = "apellidoPaterno" class = "control-label">Apellido paterno:</label>
						<input class = "form-control" value="<?php echo $row['Apellido_paterno']; ?>" id = "apellidoPaterno" type="text" name="apellidoPaterno" placeholder="Ejemplo: Prudencio" required="" autofocus="" />
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
				<div class = "form-group has-feedback pull-right" style = "width: 49%;">
					<label for = "apellidoMaterno" class = "control-label">Apellido materno:</label>
						<input class = "form-control" value="<?php echo $row['Apellido_materno']; ?>" id="apellidoMaterno" type="text" name="apellidoMaterno" placeholder="Ejemplo: Pérez" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
			</div>
			<div class="row">
				<div class = "form-group has-feedback center-block" style = "width = 100%;">
					<label for = "nombre" class = "control-label">Nombre(s):</label>
						<input class = "form-control" value="<?php echo $row['Nombre']; ?>" id="nombre" type="text" name="nombre" placeholder="Ejemplo: Mauricio" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
			</div>
			<div class="row">	
				<div class = "form-group has-feedback pull-left" style = "width: 49%;">
					<label for = "fechaNacimiento" class = "control-label">Fecha de nacimiento:</label>
						<input class = "form-control" value="<?php echo $row['Fecha_de_nacimiento']; ?>" id="fechaNacmiento" type="date" name="fechaNacimiento" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback pull-right" style = "width: 49%;">
					<label for = "lugarNacimiento" class = "control-label">Lugar de nacimiento:</label>
						<br>  
							 <select name = "lugarNacimiento" id = "lugarNacimiento" class = "form-control pull-right">
								    <optgroup label="Mexico">
								    	<option value="<?php echo $row['Lugar_de_nacimiento']; ?>"> <?php echo $row['Lugar_de_nacimiento']; ?> </option>
									      <option value = "Aguascalientes">Aguascalientes</option>
									      <option value = "Baja Californa">Baja Californa</option>
									      <option value = "Baja Californa Sur">Baja Californa Sur</option>
									      <option value = "Campeche">Campeche</option>
									      <option value = "Chiapas">Chiapas</option>
									      <option value = "Chihuahua">Chihuahua</option>
									      <option value = "Coahuila">Coahuila</option>
									      <option value = "Colima<">Colima</option>
									      <option value = "Distrito Federeal">Distrito Federeal</option>
									      <option value = "Durango">Durango</option>
									      <option value = "Estado de México">Estado de México</option>
									      <option value = "Guanajuato">Guanajuato</option>
									      <option value = "Guerrero">Guerrero</option>
									      <option value = "Hidalgo">Hidalgo</option>
									      <option value = "Jalisco">Jalisco</option>
									      <option value = "Michoacán">Michoacán</option>
									      <option value = "Morelos">Morelos</option>
									      <option value = "Nayarit">Nayarit</option>
									      <option value = "Nuevo León">Nuevo León</option>
									      <option value = "Oaxaca">Oaxaca</option>
									      <option value = "Puebla">Puebla</option>
									      <option value = "Querétaro">Querétaro</option>
									      <option value = "Quintana Roo">Quintana Roo</option>
									      <option value = "San Luis Potosí">San Luis Potosí</option>
									      <option value = "Sinaloa">Sinaloa</option>
									      <option value = "Sonora">Sonora</option>
									      <option value = "Tabasco">Tabasco</option>
									      <option value = "Tamaulipas">Tamaulipas</option>
									      <option value = "Tlaxcala">Tlaxcala</option>
									      <option value = "Veracruz">Veracruz</option>
									      <option value = "Yucatán">Yucatán</option>
									      <option value = "Zacatecas">Zacatecas</option>

								    </optgroup>
								 </select>

						
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
			</div>	
			<div class="row">
				<div class = "form-group has-feedback pull-left" style = "width: 49%;">
					<label for = "domicilio" class = "control-label">Domicilio:</label>
						<input class = "form-control" value="<?php echo $row['Domicilio']; ?>" id="domicilio" type="text" name="domicilio" placeholder="Solo avenida o calle principal" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
				<div class = "form-group has-feedback pull-right" style = "width: 49%;">
					<label for = "ciudad" class = "control-label">Ciudad:</label>
						<input class = "form-control" value="<?php echo $row['Ciudad']; ?>" id="ciudad" type="text" name="ciudad" placeholder="Ejemplo: Chetumal" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
			</div>
			<div class="row">
				<div class = "form-group has-feedback pull-left" style = "width: 32%;">
					<label for = "colonia" class = "control-label">Colonia:</label>
						<input class = "form-control" value="<?php echo $row['Colonia']; ?>" id="colonia" type="text" name="colonia" placeholder="Ejemplo: 31 de febrero" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
				<div class = "form-group has-feedback pull-right" style = "width: 32%;">
					<label for = "numeroExterior" class = "control-label">Numero exterior:</label>
						<input class = "form-control" value="<?php echo $row['Numero_exterior']; ?>" id="numeroExterior" type="text" name="numeroExterior" placeholder="Ejemplo: #18764" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
			</div>	
			<div class="row">
				<div class = "form-group has-feedback pull-left" style = "width: 32%;">
					<label for = "telefonoMovil" class = "control-label">Telefono movil:</label>
						<input class = "form-control" value="<?php echo $row['Telefono_movil']; ?>" id="telefonoMovil" type="text" name="telefonoMovil" placeholder="Ejemplo: (044) 983 12 123 456" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>
				</div>
				<div class = "form-group has-feedback pull-right" style = "width: 32%;">
					<label for = "telefonoFijo" class = "control-label">Telefono fijo:</label>
						<input class = "form-control" value="<?php echo $row['Telefono_fijo']; ?>" id="telefonoFijo" type="text" name="telefonoFijo" placeholder="Ejemplo: (983) 12 1 45 78" required=""/>
							<span class = "glyphicon glyphicon-star form-control-feedback"></span>

				</div>
			</div>
			<div class="row">		
				<div class="alert alert-danger alert-dismissible" role="alert">
			 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 			<span aria-hidden="true">&times;</span>
			 		</button>
					 	<strong>¡Hey, alto!</strong> Rectifica que todos los datos modificados esten correctos.
				</div>
			</div>
			<div class="row">
				<!-- 
				//button popover
				<button type = "submit" rel = "popover" class = "btn btn-primary" data-container = "body" data-toggle = "popover" data-placement = "top" title = "¿Estan todos los datos correctos?" data-content = "Rectifica bien los valores ingresados en el formulario">Guardar</button> 
			-->
				<button type = "button" id = "enviar" name="enviar_btn" class = "btn btn-primary mitooltip" title = "¿Estan todos los datos correctos?">Modificar</button>
				<button type = "button" id = "limpiar" name="limpiar_btn" class = "btn btn-danger mitooltip" title = "¿Estas seguro de borrar todo?" >Restablecer todo</button>
			</div>
		</form>

		</div>
				<script src="../js/jquery.js"></script>

				<script src="../js/bootstrap.js"></script>

				<script>$('.mitooltip').tooltip();</script>
				<script>  $('.selectpicker').selectpicker({
				      style: 'btn-info',
				      size: 49 //checar
				  });
				</script>
				<script>
				$('[rel="popover"]').popover({
					trigger: 'hover', //click, hover, focus, manual
					html: true,
					delay: 50, //tiempo para que desaparezca
					});
					</script>
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