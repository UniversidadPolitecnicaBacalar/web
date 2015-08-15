<?php
  session_start();
  if ($_SESSION['username']=="") {
    header("location: ../login.php");
    # code...
  }else{
    $usuario=$_SESSION['username'];
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../css/icon.css" type="text/css" rel="stylesheet">
	<meta charset="UTF-8">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
	<link rel="icon" href="../images/favicon.ico" sizes="32x32">
	<link href="../css/estilo.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<title>Editar</title>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
	<header>
		<div class="navbar-fixed">
	    <ul id="dropdown1" class="dropdown-content">
	      <li><a class="brown-text" href="cerrar.php">Cerrar sesión</a></li>
	    </ul>
	      <nav class="brown darken-3" role="navigation">
	        <!--Logo de la parte superior-->
	        <div class="nav-wrapper container"><img class="brand-logo hide-on-med-and-down" id="logo" src="../images/logo3.jpg" alt="fora">
	        	<ul class="right hide-on-med-and-down">
	        		<li><a href="../index1.php" class="waves-effect waves-light">Inicio</a></li>
	            	<!-- Dropdown Trigger -->
	            	<li><a class="dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown1"><?php echo $usuario; ?><i class="material-icons right">arrow_drop_down</i></a></li>
	          	</ul>
	        	<!--Aqui esta el menu lateral del movil-->
	        	<ul id="nav-mobile" class="side-nav">
	            	<li><a href="index1.php" class="waves-effect waves-orange">Inicio</a></li>
	        	</ul>
	        	<!-- Esta linea indica que se activa cuando esta en el movil y no cuando esta en web, aqui tambien se le asigna el icono-->
	        	<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	        </div>
	      </nav>
	    </div>
	</header>
	<main>
		<!--Titulo de la pagina-->
	    <div id="index-banner" class="parallax-container1">
	    	<div class="section no-pad-bot">
		        <div class="container">
		        	<h1 class="header center white-text text-lighten-2 animated fadeIn retraso-1">Administrador</h1>
		        </div>
	    	</div>
	      <div class="parallax"><img src="../images/reservacion.jpg" alt="menu"></div>
		</div><!--Aqui termina el titulo-->
		<div class="row animated fadeIn retraso-1">
			<div class="col s8 offset-s2">
				<br/><br/>
		<?php  
		/* Para iniciar las sesiones. */ 
		// Incluimos la conexión. 
		include_once("conexion.php"); 
		// Pasamos el id por $_GET desde la url. 
		$id = @$_GET["id"]; 
		// Seleccionamos la id y pasamos la variable id. 
		$ssql = "select * from alta_login where idalta_login=" . $id; 
		// Liberamos los datos. 
		$rs_libros = mysql_query($ssql); 
		// Pasamos los datos de la query a un array con un bucle while. 
		while(@$fila = mysql_fetch_assoc($rs_libros)) { 
		// Pasmos el id seleccionado a una sesión y las demás filas = campos. 
		$_SESSION["idalta_login"]=$id; 
		$_SESSION["usuario"]=$fila["usuario"]; 
		$_SESSION["password"]=$fila["password"]; 
		} 
		// En el formulario pasamos los datos en cada celda. 
		?>
		</div>

	<form action="campo.php" method="post">  
	<input type="hidden" name="idalta_login" value="<?php echo  $_SESSION['idalta_login'];?>">
	<div class="row">
        <div class="input-field col s6 offset-s3">
        	<i class="material-icons prefix">perm_identity</i>
        	<input id="user" type="text" name="usuario" value="<?php echo $_SESSION['usuario'];?>">
	        <label for="user">Usuario</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 offset-s3">
        	<i class="material-icons prefix">error</i>
        	<input id="pass" type="password" name="password" value="<?php echo $_SESSION['password'];?>">
	        <label for="pass">Contraseña</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 offset-s3">
        	<i class="material-icons prefix">error</i>
        	<input id="pass" type="password" name="password1" value="<?php echo $_SESSION['password'];?>">
	        <label for="pass">Confirmar contraseña</label>
        </div>
    </div>
    <div class="row center"> 
		<button class="btn waves-effect waves-light" type="submit" value="Editar" name="action">Actualizar
    	<i class="material-icons">send</i>
  		</button>
	</div>
	<div class="row center"> 
		<a class="waves-effect waves-light btn" href="actualizar.php" target="_self"><i class="material-icons left">keyboard_backspace</i>Regresar</a>
	</div>
	</form>
	</div>
	</main>
	<!--Aqui empieza el footer-->
	<footer class="page-footer brown"> <!--Aqui es para darle color-->
    	<div class="footer-copyright">
    		<div class="container">
    		Hecho por <a class="orange-text text-lighten-3" href="#!">ShowBiz Team&copy;</a> <!--El class orange text sirve para darle color a una parte especifica, creo que tambien se puede usar span-->
    		</div>
    	</div>
	</footer>

	<script type="text/javascript" src="../js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="../js/materialize.js"></script>
	<script src="../js/init.js"></script>
</body>
</html>