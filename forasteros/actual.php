	<?php

 	$host_db = "localhost";
 	$db_name = "restaurante";
	$user_db = "root";
	$pass_db = "";

 		session_start();

		// Connect to server and select databse.
		mysql_connect("$host_db", "$user_db", "$pass_db")or die("Cannot Connect to Data Base.");

		mysql_select_db("$db_name")or die("Cannot Select Data Base");

		// sent from form  
		$username = $_REQUEST['id'];

		$sql= "UPDATE datos_reservacion SET status='1' WHERE iddatos_reservacion = $username";

		$result=mysql_query($sql);

		// counting table row
		header('Location: index1.php');
	?>