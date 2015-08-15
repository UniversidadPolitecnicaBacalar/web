<html>
	<head>
		<link rel="stylesheet" href="estilo.css">
		<title>Usuarios</title>
	</head>
	<body>
	<section id="titulo">
	
	<h1>SE@RCH CYBER CAFE</h1>
	<marquee>BIENVENIDO A REGISTRO</marquee>

    </section>

    <section id ="formulario">
		<img src="imagenes/search cyber.jpg">
		<form name="nuevo_usuario" method="POST" action="guarda_usuario.php">
			<table width="50%">
				<tr>
					<td width="20"><b>Usuario</b></td>
					<td width="30"><input type="text" name="usuario" size="25" required="required" id="nombre" /></td>
				</tr>
				
				<tr>
					<td><b>Password</b></td>
					<td><input type="password" name="password" size="25" required="required" id="nombre" /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="eviar" value="Registrar" /></center></td>
				</tr>
			</table>
		</form>
	</section>
	</body>
</html>						