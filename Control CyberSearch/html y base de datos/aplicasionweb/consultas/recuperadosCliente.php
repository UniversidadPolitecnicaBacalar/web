<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>datos recuperados de la base de datos</title>
	<link rel="stylesheet" href="../crud/usuario.css">
</head>
<body>
	<section id="titulo">
    <img src="../imagenes/search cyber.jpg" id="imagen">
    <img src="../imagenes/search cyber.jpg" id="imagen1">
    <h1>SE@RCH CYBER CAFE</h1>
    <marquee>BIENVENIDO A SE@RCH CYBER CAFE</marquee>
        
        

     </section>
	<nav>
    <ul>
    <a href="http://localhost/aplicasionweb/consulta.html">regresar</a>
    <center><h1>Pago de los clientes</h1></center>
	<table border=1 width="80%">
		<thead>
				<tr>
					<td><b>Nombre</b></td>
					<td><b>Direccion</b></td>
					<td><b>Telefono</b></td>
					<td><b>Fecha de contrato</b></td>
					
				</tr>
		<div>
				
				<div>
					<?php
					    include("conexionCliente.php");
					    $Con = new conexion();
					    $Con->recuperarDatos();
					?>
				</div>
			
		</div>
	</table>
	</ul>
    </nav>
    <footer>
        <div id="define">
            <p>Derechos reservados SE@RCH CYBER CAFE</p>
        </div>
    </footer>

	
</body>
</html>