
<?php

/* start the session */
	session_start();

?>

	<?php

 		$host_db = "localhost";
		$user_db = "root";
 		$pass_db = "";
 		$db_name = "bd_paciente";
 		$tbl_name = "empleado";

		// Connect to server and select databse.
		mysql_connect("$host_db", "$user_db", "$pass_db")or die("Cannot Connect to Data Base.");

		mysql_select_db("$db_name")or die("Cannot Select Data Base");

		// sent from form
		$username = $_POST['usuario'];
		$password = md5($_POST['contrasena']);

		$sql= "SELECT * FROM $tbl_name WHERE usuario = '$username' and password='$password'";

		$result=mysql_query($sql);

		// counting table row
		$count = mysql_num_rows($result);
	// Si resultados $username y $password

	if($count == 1){

		$_SESSION['loggedin'] = true;
 		$_SESSION['username'] = $username;


        // se hace el ciclo para leer los nombres de los campos de la tabla seleccionada (usuario)
         if($datos= mysql_fetch_array($result)){
            $id = $datos['id_empleado']; 
        }

 			$_SESSION['id_usuario']= $id;

					}
	else {
		echo"MAl";

		}
	?>

