<!DOCTYPE html>
<html lang="es">
<head>
    <link href="css/icon.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link rel="icon" href="images/favicon.ico" sizes="32x32">
    <link href="css/estilo.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <title>Mapa</title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
  </head>
<body>
	<header>
		<div class="navbar-fixed">
			<nav class="brown darken-3" role="navigation">
				<!--Logo de la parte superior-->
				<div class="nav-wrapper container"><img class="brand-logo" id="logo" src="images/logo3.jpg" alt="fora">
					<ul class="right hide-on-med-and-down">
						<li><a href="index.php" class="waves-effect waves-light">Forasteros</a></li>
						<li><a href="menu.php" class="waves-effect waves-light">Nuestro menu</a></li>
						<li><a href="#" class="waves-effect waves-light">La Leyenda</a></li>
						<li><a href="reservacion.php" class="waves-effect waves-light ">Reserva</a></li>
					</ul>
					<!--Aqui esta el menu lateral del movil-->
					<ul id="nav-mobile" class="side-nav">
						<li><a href="index.php" class="waves-effect waves-orange">Forasteros</a></li>
						<li><a href="menu.php" class="waves-effect waves-orange">Nuestro menú</a></li>
						<li><a href="#" class="waves-effect waves-orange">La Leyenda</a></li>
						<li><a href="reservacion.php" class="waves-effect waves-orange">Reserva</a></li>
					</ul>
					<!-- Esta linea indica que se activa cuando esta en el movil y no cuando esta en web, aqui tambien se le asigna el icono-->
					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
				</div>
			</nav>
		</div>
	</header>
	<main>
		<!--Titulo de la pagina-->
		<div id="index-banner" class="parallax-container1">
			<div class="section no-pad-bot">
				<div class="container">
					<h1 class="header center black-text text-lighten-2 animated fadeIn retraso-1">¡Aqui estamos!</h1>
				</div>
			</div>
			<div class="parallax"><img src="images/mapa.png" alt="mapa"></div>
		</div>
		<!--Aqui termina el titulo-->
		<!--Seccion del titulo-->
		<div class="row center">
          <div class="animated fadeIn retraso-1">
            <h1 class="header center brown-text">Ven y disfruta</h1>
          </div>
        </div><!--Termina seccion del titulo-->
        <div class="row animated fadeIn retraso-1">
        	<div class="col s12 l6 offset-l3">
		        <div class="google-maps">
		        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.375591240064!2d-88.29905540000009!3d18.511921800000028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5ba36be9eb4717%3A0xc2113293f18c25d0!2sForasteros+Restaurant!5e0!3m2!1ses-419!2smx!4v1437093984832"
		        	 width="600" height="450" frameborder="0" style="border:0"></iframe>
		        </div>
	        </div>
        </div>
	</main>
	<!--Aqui empieza el footer-->
	<footer class="page-footer brown"> <!--Aqui es para darle color-->
		<div class="footer-copyright">
			<div class="container">
			Hecho por <a class="orange-text text-lighten-3" href="#!">ShowBiz Team&copy;</a> <!--El class orange text sirve para darle color a una parte especifica, creo que tambien se puede usar span-->
			</div>
		</div>
	</footer>
	
	<!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script src="js/init.js"></script>
</body>
</html>