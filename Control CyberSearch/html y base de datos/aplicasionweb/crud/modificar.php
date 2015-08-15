<?php
	
	require('conexion.php');
	
	$id=$_GET['id'];
	
	$query="SELECT usuario, contrasenia FROM usuarios WHERE id='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();
	
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Modificar Usuario</h1></center>
		
		<form name="modificar_usuario" method="POST" action="mod_usuario.php">
			
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Usuario</b></td>
					<td width="30"><input type="text" name="usuario" size="25" value="<?php echo $row['usuario']; ?>" /></td>
				</tr>	
				<tr>
					<td><b>Password</b></td>
					<td><input type="password" name="password" size="25" value="<?php echo $row['contrasenia']; ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
