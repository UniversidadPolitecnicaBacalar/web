<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {
    # code...
  

		include("conexion_login.php");

		//crea variables con los datos posteados en el formulario
		$pass = mysql_real_escape_string($_POST['password']);
		$password = md5($pass);


		//mysqli_set_charset($con,"utf8");
		//consulta del salt

		$pS=mysql_query("SELECT saltAltaUsuario FROM salt ",$con) or die ("Problemas, favor de consultar al administrador");
		$aPS = mysql_fetch_assoc($pS);
		//salt
		$passwordSalt = $aPS['saltAltaUsuario'];
		//trae el usuario que tiene contenido el salt

		$who = mysql_query("SELECT username FROM usuarios u INNER JOIN salt s ON(u.Id_usuario = s.Id_usuario)",$con) OR die ("Problemas en buscar contraseña, favor de consultar al administrador");
		
		$arrayWho = mysql_fetch_assoc($who);

		$whoUser = $arrayWho['username'];	

		//si las contraseñas son correctas		
		

		if($password == $passwordSalt){

			//si el usuario tiene el salt


			if($_SESSION['username'] == $whoUser){
				//crea una sesion con el nombre el usuario
				//sesion toma el valor de las variables________
				$_SESSION['salt'] = $whoUser;

				//redirecciona a la pagina 
				echo "Si";
			}
			//condiciones negativas... queno tiene aceso

			else{


				echo"No tienes acceso";


			}
		}
		else{
			echo"Contraseña incorrecta";
		}

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