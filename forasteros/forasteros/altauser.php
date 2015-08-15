	<?php
 		$host_db = "localhost";
		$user_db = "root";
 		$pass_db = "";
 		$db_name = "restaurante";
 		$tbl_name = "alta_login";

 		session_start();

		// Connect to server and select databse.
		mysql_connect("$host_db", "$user_db", "$pass_db")or die("Cannot Connect to Data Base.");

		mysql_select_db("$db_name")or die("Cannot Select Data Base");

		// sent from form  
		$username = $_REQUEST['usuario'];
		$password = $_REQUEST['password'];

		$sql= "SELECT * FROM $tbl_name WHERE usuario = '$username' and password = '$password'";

		$result=mysql_query($sql);

		// counting table row
		$count = mysql_num_rows($result);
	// If result matched $username and $password

	if($count == 1){

		$_SESSION['loggedin'] = true;
 		$_SESSION['username'] = $username;
 		$_SESSION['start'] = time();
 		$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

		echo "<br> Bienvenido! " . $_SESSION['username'];
		header('Location: index1.php');

					}
	else {
 		echo "<script lenguage='javascript'>
            alert('Su nombre de usuario o contraseña es incorrecto');
            location.replace('login.php');
            </script>";
		}
	?>