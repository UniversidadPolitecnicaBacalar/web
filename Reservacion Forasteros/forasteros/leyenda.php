<!DOCTYPE html>
  <html>
  <head>
    <link href="css/icon.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link rel="icon" href="images/favicon.ico" sizes="32x32">
    <link href="css/estilo.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <title>Forasteros</title>
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
          <li><a href="reservacion.php" class="waves-effect waves-light ">Reservaciones</a></li>
        </ul>
        <!--Aqui esta el menu lateral del movil-->
        <ul id="nav-mobile" class="side-nav">
          <li><a href="index.php" class="waves-effect waves-orange">Forasteros</a></li>
          <li><a href="menu.php" class="waves-effect waves-orange">Nuestro menú</a></li>
          <li><a href="#" class="waves-effect waves-orange">La Leyenda</a></li>
          <li><a href="reservacion.php" class="waves-effect waves-orange">Reservacion</a></li>
        </ul>
        <!-- Esta linea indica que se activa cuando esta en el movil y no cuando esta en web, aqui tambien se le asigna el icono-->
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
  </header>
  <main>
    
  </main>
  <!--Aqui empieza el footer-->
  <footer class="page-footer brown"> <!--Aqui es para darle color-->
    <div class="footer-copyright">
      <div class="container center text">
      Hecho por <a class="orange-text text-lighten-3" href="#!">ShowBiz Team&copy;</a> <!--El class orange text sirve para darle color a una parte especifica, creo que tambien se puede usar span-->
      </div>
    </div>
  </footer>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    // Aqui se incializa el menu lateral en android
    $(".button-collapse").sideNav();
  </script>
</body>
</html>