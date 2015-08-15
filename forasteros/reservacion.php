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
    <title>Reservacion</title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
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
    <div id="index-banner" class="parallax-container1">
      <div class="section no-pad-bot">
        <div class="container">
          <h1 class="header center white-text text-lighten-2 animated fadeIn retraso-1">¡Reserva ya!</h1>
        </div>
      </div>
      <div class="parallax"><img src="images/reservacion.jpg" alt="reserva"></div>
    </div>
    <div class="row center">
      <div class="animated bounceIn retraso-1">
        <h6 class="header col s10 offset-s1 light">Para eventos grandes (Mayores a 15 personas) reservar con 2 días de antelación</h6>
      </div>
    </div>
    <!--Aqui empieza toda la seccion del formulario -->
    <div class="section animated fadeIn retraso-1">
      <div class="container">
        <div class="input-field">
          <div class="row">
            <form method="post" action="guardarReservacion.php" class="col s12">
              <div class="row"> <!--Este row lleva nombre de la persona, y el numero de personas-->
                <div class="input-field col s6">
                  <i class="material-icons prefix">face</i>
                  <input id="first_name" type="text" pattern="[A-Za-z\s]+" maxlength="33" class="validate" name="nombre">
                  <label for="first_name" data-error="Erroneo" data-success="Un placer">Nombre completo</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">people</i>
                  <input id="numero_de_personas" type="number" pattern="[0-9]{2}" min="1" max="40" class="validate" name="no_personas">
                  <label for="numero_de_personas">No. de personas</label>
                </div>
              </div>
              <div class="row"> <!--Aqii empieza la fila de telefono e email-->
                <div class="input-field col s6">
                  <i class="material-icons prefix">phone</i><!--Aqui esta el icono-->
                  <input id="icon_telephone" type="tel" pattern="[0-9]{10}" class="validate" name="telefono">
                  <label for="icon_telephone">Telefóno celular</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">email</i><!--Aqui esta el icono-->
                  <input id="email" type="email" class="validate" name="email">
                  <label for="email" data-error="Erroneo" data-success="Que original">Email</label><!--Eso de data son para que salga un mensaje cuando el usuario pusiera su correo bien o mal-->
                </div>
              </div>
              <!--Aqui empieza la seccion de las fechas-->
              <div class="row"> <!--Los select y el date picker estan dentro de un mismo div class row para que se mantengan en la misma fila -->
                <div class="input-field col s7 m6 l4 ">
                  <i class="material-icons prefix">today</i><!--Icono-->
                  <input id="date" type="date" class="datepicker" name="fecha"><!--Aqui declaras el selector de fechas, pero aun no se como usarlo en español-->
                  <label for="date">Fecha de reservación</label>
                </div>
                <div class="input-field col s5 m6 l3 ">
                  <select name="hora">
                    <option value="0">Hora</option><!--Este vendria siendo una opcion desabilitada que sirve como titulo-->
                    <option value="7">07</option><!--Opciones del select-->
                    <option value="8">08</option><!--Opciones del select-->
                    <option value="9">09</option><!--Opciones del select-->
                    <option value="10">10</option><!--Opciones del select-->
                    <option value="11">11</option><!--Opciones del select-->
                  </select>
                </div>
                <div class="input-field col s5 m6 l3 ">
                  <select name="minuto">
                    <option value="0">Minutos</option><!--Este vendria siendo una opcion desabilitada que sirve como titulo-->
                    <option value="01">00</option><!--Opciones del select-->
                    <option value="15">15</option><!--Opciones del select-->
                    <option value="30">30</option><!--Opciones del select-->
                    <option value="45">45</option><!--Opciones del select-->
                  </select>
                </div>
                <div class="input-field col s5 m6 l2 ">
                  <label>PM</label>
                </div>
              </div> <!--Aqui termina la seccion-->
              <!--Aqui empieza el campo de comentarios-->
              <div class="row">
                <div class="input-field col s12 m8 l8 offset-m2 offset-l2">
                  <i class="material-icons prefix">description</i><!--Icono-->
                  <textarea id="textarea1" class="materialize-textarea" maxlength="200" length="200" name="comen" ></textarea><!--Este es el espacio en blanco y tendra un maximo de 200 caracteres-->
                  <label for="textarea1">Comentarios/notas (opcional)</label><!--Titulo-->
                </div>
              </div>
              <div class="row">
                <div class="col s6 offset-s3 l6 offset-l5 ">
                  <button class="btn waves-effect waves-light" type="submit" name="enviar">Enviar
                    <i class="material-icons">send</i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><!--Aqui termina la seccion del formulario-->
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
  <script>
    // Aqui se incializa el menu lateral en android
    $(".button-collapse").sideNav();
    //Aqui se ejetuta el scrip que da la funcion del select 
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
</body>
</html>