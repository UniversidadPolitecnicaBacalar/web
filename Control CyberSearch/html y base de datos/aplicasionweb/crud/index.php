<?php
	require('conexion.php');
	
	$query="SELECT id, usuario, email FROM usuarios";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<link rel="stylesheet" href="usuario.css">
		<title>Usuarios</title>
	</head>
	<body>
		<section id="titulo">
        <img src="imagenes/search cyber.jpg" id="imagen">
        <img src="imagenes/search cyber.jpg" id="imagen1">
        <h1>SE@RCH CYBER CAFE</h1>
        <marquee>BIENVENIDO A SE@RCH CYBER CAFE</marquee>
        
        

     </section>
	<nav>
    <ul>
    	<!-- creo un link  -->
		
    	<a href="http://localhost/aplicasionweb/gastos.html">regresar</a>
    	<center><h1>Usuarios</h1></center>
    		
		
		
		<!-- creo una tabla  -->
		<table border=1 width="80%">
			<thead>
				<tr>
					<td><b>Usuario</b></td>
					<td></td>
					<td></td>
				</tr>
				
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['usuario'];?>
							</td>
							<td>
								<a href="modificar.php?id=<?php echo $row['id'];?>">Modificar</a>
							</td>
							<td>
								<a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>       
    </ul>
    </nav>
		
	
		</body>
	</html>	
	
