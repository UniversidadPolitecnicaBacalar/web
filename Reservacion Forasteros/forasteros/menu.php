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
    <title>Menu</title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
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
  <main> <!-- Contenido principal del body-->
    <!--Titulo de la pagina-->
    <div id="index-banner" class="parallax-container1">
      <div class="section no-pad-bot">
        <div class="container">
          <h1 class="header center white-text text-lighten-2 animated fadeIn retraso-1">Bon Appetit</h1>
        </div>
      </div>
      <div class="parallax"><img src="images/reservacion.jpg" alt="menu"></div>
    </div><!--Aqui termina el titulo-->
    <div class="row animated fadeIn retraso-1"><!--Seccion de las botanas y carnes-->
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_dining</i>Botanas y Platillos para niño</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="descri">Descripcion</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Chistorra texana</td>
                    <td>No tiene</td>
                    <td>$105</td>
                  </tr>
                  <tr>
                    <td>Alitas kentucky</td>
                    <td>Picosas, 10 piezas</td>
                    <td>$89</td>
                  </tr>
                  <tr>
                    <td>Platillo texano</td>
                    <td class="justificado">Arrachera, guacamole, salchichas chipocludas y chorizo asado</td>
                    <td>$179</td>
                  </tr>
                  <tr>
                    <td>Arrachera Botanera</td>
                    <td>No tiene</td>
                    <td>$163</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
        </ul>
      </div>
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_dining</i>Carnes, aves, etc.</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="descri">Descripcion</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Nachos c/ Arrachera</td>
                    <td>No tiene</td>
                    <td>$120</td>
                  </tr>
                  <tr>
                    <td>Nachos c/ Arrachera con chicharron</td>
                    <td>No tiene</td>
                    <td>$128</td>
                  </tr>
                  <tr>
                    <td>Nachos c/ Carne asada de Res</td>
                    <td>No tiene</td>
                    <td>$105</td>
                  </tr>
                  <tr>
                    <td>Nachos c/ Pastor</td>
                    <td>No tiene</td>
                    <td>$105</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </li>
        </ul>
      </div>
    </div><!--Termina la seccion de las botanas y carnes-->

    <div class="row animated fadeIn retraso-1"><!--Seccion de las pastas cremas y ensaladas-->
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_dining</i>Pastas/Cremas/Ensaladas</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="descri">Descripcion</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Ensalada Verde</td>
                    <td>Vegetales y Aderezo</td>
                    <td>$62</td>
                  </tr>
                  <tr>
                    <td>Ensalada de Chef</td>
                    <td>Vegetales c/ jamón, queso y salami</td>
                    <td>$76</td>
                  </tr>
                  <tr>
                    <td>Espagueti Alfredo</td>
                    <td>No tiene</td>
                    <td>$73</td>
                  </tr>
                  <tr>
                    <td>Crema de Champiñon</td>
                    <td>No tiene</td>
                    <td>$47</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
        </ul>
      </div>
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_dining</i>Especialidades</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="descri">Descripcion</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Orden Flautas Norteñas</td>
                    <td>3 piezas de res o pollo</td>
                    <td>$81</td>
                  </tr>
                  <tr>
                    <td>Plato Mexicano</td>
                    <td class="justificado">2 flautas, frijoles refritos, guacamole, chorizo, quesadilla de maiz</td>
                    <td>$103</td>
                  </tr>
                  <tr>
                    <td>Parrillada</td>
                    <td class="justificado">2 personas. Filete de res, carne al pastor, chuleta, arrachera, chorizo, guacamole, cebolla asada y queso fundido acompañado de rica ensalada y frijoles charros</td>
                    <td>$357</td>
                  </tr>
                  <tr>
                    <td>Costillas a la BBQ</td>
                    <td>350 gr</td>
                    <td>$131</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </li>
        </ul>
      </div>
    </div><!--Termina la seccion de las botanas-->

    <div class="row animated fadeIn retraso-1"><!--Seccion de las pizzas y papas-->
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_pizza</i>Pizzerolas/Queso Fundido</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="descri">Descripcion</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Pizzerola de Arrachaera</td>
                    <td>Pizza con arrachera</td>
                    <td>$74</td>
                  </tr>
                  <tr>
                    <td>Queso fundido alpino</td>
                    <td>No tiene</td>
                    <td>$49</td>
                  </tr>
                  <tr>
                    <td>Queso fundido c/ chorizo</td>
                    <td>No tiene</td>
                    <td>$53</td>
                  </tr>
                  <tr>
                    <td>Pizzerola de Carne asada</td>
                    <td>Pizza con carne asada</td>
                    <td>$62</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
        </ul>
      </div>
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_dining</i>Papas Asadas</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Arrachera</td>
                    <td>Todas llevan queso manchego y crema</td>
                    <td>$81</td>
                  </tr>
                  <tr>
                    <td>Especial</td>
                    <td>Todas llevan queso manchego y crema</td>
                    <td>$71</td>
                  </tr>
                  <tr>
                    <td>Pastor</td>
                    <td>Todas llevan queso manchego y crema</td>
                    <td>$59</td>
                  </tr>
                  <tr>
                    <td>Res</td>
                    <td>Todas llevan queso manchego y crema</td>
                    <td>$59</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </li>
        </ul>
      </div>
    </div><!--Termina la seccion de las pizzas y papas-->

    <div class="row animated fadeIn retraso-1"><!--Seccion de los postres y el bar-->
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">cake</i>Postres</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Queso napolitano</td>
                    <td>$32</td>
                  </tr>
                  <tr>
                    <td>Pastel de chocolate</td>
                    <td>$32</td>
                  </tr>
                  <tr>
                    <td>Duraznos con crema</td>
                    <td>$32</td>
                  </tr>
                  <tr>
                    <td>Helados</td>
                    <td>$25</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
        </ul>
      </div>
      <div class="col s12 m6 l6">
        <ul class="collapsible popout">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_bar</i>Nuestro bar</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Alfonso XIII </td>
                    <td>$50</td>
                  </tr>
                  <tr>
                    <td>Bloody Mary</td>
                    <td>$50</td>
                  </tr>
                  <tr>
                    <td>Bull</td>
                    <td>$55</td>
                  </tr>
                  <tr>
                    <td>Naranjada</td>
                    <td>$27</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </li>
        </ul>
      </div>
    </div><!--Termina la seccion de los postres y el bar-->

    <div class="row">
      <div class="col l6 offset-l3">
        <ul class="collapsible popout" data-collapsible="accordion">
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_dining</i>Botanas y platillos para niños</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="descri">Descripcion</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Chistorra texana</td>
                    <td>No tiene</td>
                    <td>$105</td>
                  </tr>
                  <tr>
                    <td>Alitas kentucky</td>
                    <td>Picosas, 10 piezas</td>
                    <td>$89</td>
                  </tr>
                  <tr>
                    <td>Platillo texano</td>
                    <td class="justificado">Arrachera, guacamole, salchichas chipocludas y chorizo asado</td>
                    <td>$179</td>
                  </tr>
                  <tr>
                    <td>Arrachera Botanera</td>
                    <td>No tiene</td>
                    <td>$163</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_dining</i>Pastas, crepas y ensaladas</div>
            <div class="collapsible-body">
              <table class="hoverable">
                      <thead>
                        <tr>
                            <th data-field="nombre">Nombre</th>
                            <th data-field="descri">Descripcion</th>
                            <th data-field="precio">Precio</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td>Ensalada Verde</td>
                          <td>Vegetales y Aderezo</td>
                          <td>$62</td>
                        </tr>
                        <tr>
                          <td>Ensalada de Chef</td>
                          <td>Vegetales c/ jamón, queso y salami</td>
                          <td>$76</td>
                        </tr>
                        <tr>
                          <td>Espagueti Alfredo</td>
                          <td>No tiene</td>
                          <td>$73</td>
                        </tr>
                        <tr>
                          <td>Crema de Champiñon</td>
                          <td>No tiene</td>
                          <td>$47</td>
                        </tr>
                      </tbody>
                    </table>
            </div>
          </li>
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">local_pizza</i>Pizzerolas y Queso Fundido</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="descri">Descripcion</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Pizzerola de Arrachaera</td>
                    <td>Pizza con arrachera</td>
                    <td>$74</td>
                  </tr>
                  <tr>
                    <td>Queso fundido alpino</td>
                    <td>No tiene</td>
                    <td>$49</td>
                  </tr>
                  <tr>
                    <td>Queso fundido c/ chorizo</td>
                    <td>No tiene</td>
                    <td>$53</td>
                  </tr>
                  <tr>
                    <td>Pizzerola de Carne asada</td>
                    <td>Pizza con carne asada</td>
                    <td>$62</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </li>
          <li>
            <div class="collapsible-header white-text"><i class="material-icons white000">cake</i>Postres</div>
            <div class="collapsible-body">
              <table class="hoverable">
                <thead>
                  <tr>
                      <th data-field="nombre">Nombre</th>
                      <th data-field="precio">Precio</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Queso napolitano</td>
                    <td>$32</td>
                  </tr>
                  <tr>
                    <td>Pastel de chocolate</td>
                    <td>$32</td>
                  </tr>
                  <tr>
                    <td>Duraznos con crema</td>
                    <td>$32</td>
                  </tr>
                  <tr>
                    <td>Helados</td>
                    <td>$25</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </li>
        </ul>
      </div>
    </div>

  </main><!--Aqui termina el main-->
  
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
    //Aqui se incializa el menu lateral en android
    $(".button-collapse").sideNav();
  </script>
</body>
</html>