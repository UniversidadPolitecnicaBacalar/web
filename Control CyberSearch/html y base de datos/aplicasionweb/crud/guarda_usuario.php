<?php 
	
	require('conexion.php');
	
	$usuario=$_POST['usuario'];
	$password1=$_POST['password'];
	

	$contra= md5($password1);
	
	$query="INSERT INTO usuarios (usuario, contrasenia) VALUES ('$usuario','$contra')";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0){ ?>
				<h1>Usuario Guardado</h1>
				<?php }else{ ?>
				<h1>Error al Guardar Usuario</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<a href="http://localhost/aplicasionweb/index.html">Regresar</a>
			
		</center>
	</body>
	</html>	