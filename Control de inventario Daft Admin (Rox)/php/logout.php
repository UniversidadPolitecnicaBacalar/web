<?php
	//afuerzas se tiene que iniciar la session nuevamente
	session_start();
	//destruye la sesion creada
  	session_destroy();

  	//redirecciona a la pagina
	header('Location: ../index.html'); 
?>
