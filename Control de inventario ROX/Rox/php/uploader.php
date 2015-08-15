<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo' || $_SESSION['acceso'] == 'Operacion') {
    # code...
  	include("conexion_login.php");

 ?>
<!DOCTYPE html>
 <html>
 	<head>
 		<!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="../css/materialize.css">
      <link type="text/css" rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/webicons/webicons.css">
      

      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

 	</head>
 	<body>
 		<header>
 			<nav class = "top-nav">
 				<div class="nav-wrapper blue darken-2">
 					<a href="#" class = "brand-logo center"><i class = "mdi-communication-business"></i></a>

              		<ul class="right"><!-- Menu Cuenta de usuario -->
                		<li><a class="dropdown-button tooltipped" data-tooltip="Cuenta" data-position="bottom" data-activates="dropdown1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
	                	<ul id='dropdown1' class='dropdown-content large'>
	                  	<!--<li><a onclick="">Cambiar Imagen</a></li>-->
	                  		<li><a onclick="location='modificar_usuario.php'">Modificar Cuenta</a></li>
	                  		<li><a onclick = "location='logout.php'">Cerrar Sesión</a></li>
	                	</ul>
              		</ul>
 				</div>
 			</nav>
 		</header>
 		<main>
		<!-- Script PHP-->
        <?php
        	$nombreUsuario = $_SESSION['username'];

		  	$consultaId = mysql_query("SELECT Id_empleado FROM usuarios WHERE username = '$nombreUsuario'",$con) or die ("No se pudo encontrar usuario");
			$arrayId = mysql_fetch_assoc($consultaId);
			$Id_empleado = $arrayId['Id_empleado'];

			//=========================//
			$uploadedfileload	=	"true";
			$uploadedfile_size	=	$_FILES['uploadedfile']['size'];
			$file_name = $_FILES['uploadedfile']['name'];
			$add="../images/users/$nombreUsuario.jpg";
        ?>

 		<div class="container" id="contenedor">
          	
            	<div class="row">
			        <div class="col s12 m12">
			          	<div class="card">
				            <div class="card-image">
				              <img src="<?php echo $add; ?>" id="card42">
				            </div>
				            <div class="card-content">
				              		<?php

				              			if ($uploadedfile_size>2097152){
											$smg = "$file_name es demasiado grande, favor de reducir el tamaño a 2 MB y vuelva a intentarlo";
											$uploadedfileload="false";
											echo $smg;
										}

										if($uploadedfileload=="true"){
											if(move_uploaded_file ($_FILES['uploadedfile']['tmp_name'], $add)){
												mysql_query("UPDATE usuarios set rutaImagen ='$add' WHERE Id_empleado = '$Id_empleado'",$con) or die ("No se pudo actualizar la ruta de la imagen");
												echo " <h5 class='center'>$file_name</h5><p class='center'>Ha sido subido satisfactoriamente</p>";
											}
											else{
												echo "<p class='center'>Error al subir la imagen</p>";
											}
										}
										/*else{

											$msg=" <p class='center'>No se ha podido subir $file_name puede que el tamaño es mayor a 200 KB.</p>";

											echo $msg;
										}*/
				              		?>
				            </div>
				            <div class="card-action center">
				            	<?php
				            		if($_SESSION['acceso'] == "Administrativo"){
				            			echo "<a href='administrativo.php'>Regresar</a>";
				            		}else{
				            			echo "<a href='operacion.php'>Regresar</a>";
				            		}
				            	?>
				            </div>
			          	</div>
			        </div>
			    </div>
     
        </div>
    </main>
 		<!--Footer-->
 		<footer class="page-footer blue darken-2">
			<div class="container">
			<div class="row">
			  <div class="col l6 s12">
			    <h5 class="white-text">Notas</h5>
			    <p class="grey-text text-lighten-4">Antes de dar de alta un producto, verificar si esta dado de alta su provedor, de caso contrario dar primero de alta el provedor y despues el producto.</p>
			    <p class="grey-text text-lighten-4">Usuarios administrativos tienen acceso total a todas las paginas.</p>


			  </div>
			  <div class="col l3 s12">
			    <h5 class="white-text">Funciones</h5>
			    <ul>
			      <li><a class="white-text" href="corte.php">Corte de caja</a></li>
			      <li><a class="white-text" href="altas.php">Altas</a></li>
			      <li><a class="white-text" href="ingreso.php">Ingreso</a></li>
			      <li><a class="white-text" href="edicion.php">Edicion</a></li>
			    </ul>
			  </div>
			  <div class="col l3 s12">
			    <h5 class="white-text">Catalogos</h5>
			    <ul>
			      <li><a class="white-text" href="catalogo.php">Catalogo</a></li>
			      <li><a class="white-text" href="catalogo_corte.php">Cortes</a></li>
			    </ul>
			  </div>
			</div>
			</div>
      
		    <div class="footer-copyright">
		        <div class="container">
		        © 2015 Daft Admin <a class="grey-text text-lighten-4 right" href="http://materializecss.com">2015</a>
		        </div>
		    </div>
		</footer>
      	<!-- end footer-->
 		<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="../js/materialize.min.js"></script>
      	<script src="../js/sweetalert.min.js"></script>
      	<!--parallax-->
	    <script type="text/javascript">
	        $(document).ready(function(){
	          	$('.parallax').parallax();
	           	// Show sideNav
	          	$('.button-collapse').sideNav();
	          	$('.modal-trigger').leanModal();
	        });
	    </script>
 	</body>
 </html>
<?php 
}
else {
//de caso contrario redireciona al login
echo "<script>history.back();</script>";
}

} else {
//de caso contrario redireciona al login
echo "<script>history.back();</script>";
}
?>