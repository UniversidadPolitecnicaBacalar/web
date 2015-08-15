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
      <div class="nav-wrapper container"><img class="brand-logo hide-on-med-and-down" id="logo" src="images/logo3.jpg" alt="fora">
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php" class="waves-effect waves-light">Forasteros</a></li>
          <li><a href="menu.php" class="waves-effect waves-light">Nuestro menú</a></li>
          <li><a href="leyenda.php" class="waves-effect waves-light">La Leyenda</a></li>
          <li><a href="reservacion.php" class="waves-effect waves-light ">Reserva</a></li>
        </ul>
        <!--Aqui esta el menu lateral del movil-->
        <ul id="nav-mobile" class="side-nav">
          <li><a href="index.php" class="waves-effect waves-orange">Forasteros</a></li>
          <li><a href="menu.php" class="waves-effect waves-orange">Nuestro menú</a></li>
          <li><a href="leyenda.php" class="waves-effect waves-orange">La Leyenda</a></li>
          <li><a href="reservacion.php" class="waves-effect waves-orange">Reserva</a></li>
        </ul>
        <!-- Esta linea indica que se activa cuando esta en el movil y no cuando esta en web, aqui tambien se le asigna el icono-->
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
  </header>
  <main>
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <div class="row center">
          <div class="animated fadeIn retraso-1">
            <h1 class="header center brown-text">Forasteros</h1>
            <h5>El mejor lugar para cenar</h5>
            
          </div>
        </div>
        <!-- Aqui empieza el slider de las imagenes-->
        <div class="row center animated fadeIn retraso-1">
          <div class="col s12 l12">
            <div class="slider"> 
              <ul class="slides">
                <li>
                  <img src="images/carne.jpg" height="400" width="1024">
                  <div class="caption center-align"> <!--Esto sirve para la transicion de texto, de que lado quieres que salga notese el center, right y left-->
                    <h3>Cortes</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li>
                  <img src="images/tacos.jpg" height="400" width="1024">
                  <div class="caption right-align"> <!--Esto sirve para la transicion de texto, de que lado quieres que salga notese el center, right y left-->
                    <h3>Tacos</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li>
                  <img src="images/parrillada.jpg" height="400" width="1024">
                  <div class="caption right-align"> <!--Esto sirve para la transicion de texto, de que lado quieres que salga notese el center, right y left-->
                    <h3>Parrillada</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div> <!--Aqui termina-->
      </div>
    </div>

    <div class="container">
      <div class="section">

        <!--   Seccion de los iconos   -->
        <div class="row"> <!--Esto es una fila-->
          <div class="col s12 m4"> <!--Esto es para colocarlos, exactamente no se para que sirve el s12 pero el m4 si lo mueves el texto se acomoda a horizontal-->
            <div class="icon-block">
              <h2 class="center text"><a href="reservacion.php"><i class="material-icons brown000">today</i></a></h2>
              <h5 class="center"><span class="black-text">Reserva tu mesa</span></h5>
              <p class="center text">¡Aparta tu mesa preferida el día hoy, mañana o el día que prefieras! Ven a cenar con nosotros.</p>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="icon-block" >
              <h2  class="center text"><a href="#!"><i class="material-icons brown000">contact_phone</i></a></h2>
              <h5 class="center"><span class="black-text ">Servició a domicilio</span></h5>
              <p class="center text">Ordena ahora mismo tu cena favorita al número telefónico (983) 833 1500</p>
            </div>
          </div>
          <div class="col s12 m4 animated bounce retraso-1">
            <div class="icon-block">
              <h2 class="center text"><a href="mapa.php"><i class="material-icons brown000">explore</i></a></h2><!--El brown000 es para que los iconos salgan de color cafe, esta en el css estilo-->
              <h5 class="center"><span class="black-text">¡Ven y conocenos!</span></h5><!--Cuando metes el texto en un span le pones una clase y asi le cambias el color al texto-->
              <p class="center text">Haz clic en el icono para ver el mapa</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--Aqui empieza el footer-->
  <footer class="page-footer brown"> <!--Aqui es para darle color-->
    <div class="footer-copyright">
      <div class="container text">
      Hecho por <a class="orange-text text-lighten-3" href="#!">ShowBiz Team&copy;</a> <!--El class orange text sirve para darle color a una parte especifica, creo que tambien se puede usar span-->
      </div>
    </div>
  </footer>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    $(function () {
      // inicializar el slide
      $(".slider").slider({
      });
    })
    // Aqui se incializa el menu lateral en android
    $(".button-collapse").sideNav();
  </script>
</body>
</html>