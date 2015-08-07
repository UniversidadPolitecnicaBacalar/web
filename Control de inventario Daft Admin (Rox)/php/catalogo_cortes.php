<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {
    # code...
//se ejecutara si se cumple

  $acceso = "Administrativo"; 
  ?>


<!DOCTYPE html>
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="../css/style.css">
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    </head>

    <body>
      <header>
        <nav class = "top-nav">

          <div class = "nav-wrapper  blue darken-2">
    
            
            <a href="#" class = "brand-logo center"><i class = "mdi-editor-insert-chart"></i></a>
            
            <ul class="right"><!-- Menu Cuenta de usuario -->
                <?php
                  include("conexion_login.php");
                  $nombreUsuario = $_SESSION['username'];

                  //$ruta = "../images/users/".$_SESSION['username'].".png";
                  $consultaId = mysql_query("SELECT rutaImagen FROM usuarios WHERE username = '$nombreUsuario'",$con) or die ("No se pudo encontrar usuario");
                  $arrayId = mysql_fetch_assoc($consultaId);
                  $ruta = $arrayId['rutaImagen'];
                ?>
                <li><a class="dropdown-button tooltipped" data-tooltip="Cuenta" data-position="bottom" data-activates="dropdown1"><img src="<?php echo $ruta; ?>" alt="" class="circle left" width = "55px" height = "55px" id="imagenCuenta">&nbsp;&nbsp;<?php echo $_SESSION['username']?><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                <ul id='dropdown1' class='dropdown-content large'>
                  <li><a onclick="abrirCambiarImagen()">Cambiar Imagen</a></li>
                  <li><a onclick="location='modificar_usuario.php'">Modificar Cuenta</a></li>
                  <li><a onclick = "location='logout.php'">Cerrar Sesión</a></li>
                </ul>
            </ul>
            
            <ul id="nav-mobile" class="left">
            
              <li><a href = "administrativo.php" ><i class = "mdi-navigation-arrow-back"></i></a></li>
              
            </ul>


          </div>
 
        </nav>

      </header>    
  <!-- main -->
      <main>



        <div class="section white">
          <div class="row container col s12 m12 l12">
            <div class = "card-panel ">
              <span class = "black-text">
                <h2 class="header center">Catalogo</h2>
              </span>
            </div>

  
          </div>
        </div>



        <div class="container col s12 m12 l12">

          <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="cortesTablaBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>
          <table id = "tablaCortes" class = "hoverable responsive-table bordered  centered ">
            <thead>
              <tr>
               
                  
                  <th data-field="ID">
                    <i class="mdi-action-assignment-turned-in"></i>
                    ID
                  </th>

                  <th data-field="Fecha">
                    <i class="mdi-action-today"></i>
                    Fecha - Hora
                  </th>

                  <th data-field="Usuario">
                    <i class="mdi-social-person"></i>
                    Usuario
                  </th>


                  <th data-field="Ver">
                    <img id="pdf" src="../images/picture_as_pdf.svg" alt="">
                    PDF
                  </th>
                  <th data-field="Ver">
                    <i class="mdi-action-description"></i>                    
                    TXT
                  </th>
                  <th data-field="Ver">
                    <i class="mdi-av-equalizer"></i> 
                    Grafica
                  </th>

              </tr>
            </thead>

            <tbody>

              <?php
                  include("conexion.php");
                  $consulta = mysql_query("SELECT * FROM cortes ORDER BY Id_corte desc") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla');history.back();</script>");
                  while($pro = mysql_fetch_array($consulta)){
                    echo "<tr>
                    <td>".$pro['Id_corte']."</td>
                    <td>".$pro['fechaCorte']."</td>
                    <td>".$pro['nameUsername']."</td>


                    <td><a class = 'mdi-av-my-library-books btn-floating blue' href =".$pro['ruta']."></a></td>
                    <td><a class = 'mdi-action-visibility btn-floating' href =ver.php?id=".$pro['Id_corte']."></a></td>
                    <td><a class = 'mdi-action-visibility btn-floating' href =grafica.php?id=".$pro['Id_corte']."></a></td>

                    </tr>";

                  }


                ?>

            </tbody>
          </table>
        </div>

            <!-- Modal cambiar imagen-->
            <form enctype="multipart/form-data" action="uploader.php" method="POST">
              <div id="ModalImagen" class="modal">
                <br><br>
                <h4 class="center">Seleccionar imagen</h4>
                <div class="modal-content">
                  <div class="file-field input-field">
                    <input class="file-path validate" type="text"/>
                    <div class="btn">
                      <span><i class="mdi-action-perm-media"></i></span>
                      <input type="file" name = "uploadedfile" accept="image/png,image/jpeg" />
                    </div>
                  </div>
                </div>                
                <div class="modal-footer">
                  <div class="row">
                    <div class="input-field col 6 right">
                      <button class="btn blue waves-light" >Subir <i class="mdi-file-cloud-done right"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                <li><a class="btn-floating tooltipped grey" data-tooltip="Top Vendidos" data-position="left" onclick = "location='vendidos.php'"><i class="large mdi-action-trending-up"></i></a></li>
                <li><a class="btn-floating tooltipped blue" data-tooltip="Corte de caja" data-position="left" onclick = "location='corte.php'"><i class="large mdi-action-assignment-turned-in"></i></a></li>
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating tooltipped yellow darken-1" data-tooltip="Altas" data-position="left" onclick = "location='altas.php'"><i class="large mdi-action-add-shopping-cart"></i></a></li>
                <li><a class="btn-floating tooltipped purple" data-tooltip="Edición" data-position="left" onclick = "location='edicion.php'"><i class="large mdi-editor-mode-edit"></i></a></li>
                <li><a class="btn-floating tooltipped brown" data-tooltip="Catalogo General" data-position="left" onclick = "location='catalogos.php'"><i class="large mdi-action-description" ></i></a></li>

              </ul>
            </div>

      <div class="push"></div>
      </main>
    <!-- footer-->
    <footer class="page-footer blue darken-2">

          <div class="footer-copyright pie">
            <div class="container">
            Copyright © 2015 | Joel Nahim & Luis Enrique
            <a class="grey-text text-lighten-4 right" href="https://www.facebook.com/Poliuva">&nbsp;&nbsp;Like</a>
            <a class="grey-text text-lighten-4 right" href="https://www.facebook.com/Poliuva" target="_blank"><img src="../images/facebook.svg" alt="facebook" id="fb"></a>
            </div>
          </div>
        </footer>
      <!-- end footer-->



      <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/jquery.tablesorter.js"></script>

      <script type="text/javascript">
        function abrirCambiarImagen(){
          $('#ModalImagen').openModal();
        }
      </script>

      <!--parallax-->
      <script type="text/javascript">
        $(document).ready(function(){
          $('.parallax').parallax();
        });
        $(document).ready(function() 
          { 
              $("#tablaCortes").tablesorter(); 
          } 
      ); 
      </script>
       <script>
      $(document).ready(function(){
        // Write on keyup event of keyword input element
        $("#cortesTablaBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#tablaCortes tbody>tr").hide();
            $("#tablaCortes td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          else
          {
            // When there is no input or clean again, show everything back
            $("#tablaCortes tbody>tr").show();
          }
        });
      });
      // jQuery expression for case-insensitive filter
      $.extend($.expr[":"], 
      {
          "contains-ci": function(elem, i, match, array) 
        {
          return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
      });
      </script>
      <!--modal-->

    </body>









</html>


<?php 
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