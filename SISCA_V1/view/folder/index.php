<?php

session_start();



if ($_SESSION['id_usuario'] == ""){

	header ("Location: ../../login.php");

	}

	

	$idUser = $_SESSION['id_usuario'];

	$idMateria= $_REQUEST['idMateria'];

?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Materia</title>
    
    <!-- Hojas de Estilo -->
    
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/bootstrap-modal.css" rel="stylesheet">
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
	<link href="css/jquery.linkselect.css" rel="stylesheet" type="text/css" />
	
	 <!-- librerias jquery -->
	 <script src="js/jquery.js"> </script> 
	 <script src="js/jquery-ui.js"> </script>
	 <script src="js/bootstrap.js"></script>
	 <script src="js/bootstrap-modalmanager.js"></script>
     <script src="js/bootstrap-modal.js"> </script>
	 <script src="js/bootstrap-button.js"> </script>
	 <script src="js/jquery.validationEngine.js"></script>
	 <script src="js/jquery.validationEngine-es.js"></script>
	 <script src="js/jquery.linkselect.js"></script>
      
	
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SISCA</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="../../index.php">Materias</a></li>
            </ul>
             <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajustes<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Cambiar contraseña</a></li>
		            <li><a href="#">Ver reportes</a></li>
		            <li class="divider"></li>
		            <li><a href="../../modulos/conexion/cerrarSesion.php">Cerrar sesion</a></li>
		          </ul>
		        </li>
		      </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div><!-- /container -->
  </head>

  <body>
<BR><BR>

    <div class="container">
		<div class="row-fluid">
			<div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              	<li class="nav-header">UNIDADES</li>
					<li><a href="nuevaUnidad.php?id=<?php echo $idMateria; ?>">Nueva unidad</a></li>
		          	<li><a href="#">Editar unidades</a></li>
		        <li class="nav-header">ACTIVIDADES</li>
		        	<li><a href="#">Calificar actividad</a></li>
					<li><a href="#">Nueva actividad</a></li>
		          	<li><a href="#">Editar actividades</a></li>

	          	<li class="nav-header">REPORTES</li>
					<li><a href="#">Reporte de unidad</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->



		<div class="span9"><!--Contenido-->
			
			
                <div class="offset1 span12" id="tabla"></div>






		</div><!--/Contenido-->
                                
    			
	
  </body>

	
</html>
