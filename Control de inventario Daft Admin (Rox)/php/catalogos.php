<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo' || $_SESSION['acceso'] == 'Operacion') {
    # code...

//se ejecutara si se cumple
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
              
            <a href="#" class = "brand-logo center"><i class = "mdi-action-description"></i></a>
            
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
            
              <li><a href = "<?php echo $_SESSION['acceso'];?>.php"><i class = "mdi-navigation-arrow-back"></i></a></li>
              
            </ul>
          </div>
        
 
        </nav>

      </header>    
  <!-- main -->
      <main>



        <div class="section white">
          <div class="row container">
            <div class = "card-panel ">
              <span class = "black-text">
                <h2 class="header center">Catalogo General</h2>
              </span>
            </div>
          </div>
        </div>

        <div class="section white">
          <div class="row container">
            <ul class="collapsible popout" data-collapsible="accordion">
              <li>
                <div class="collapsible-header">
                  <i class="mdi-maps-local-restaurant"></i>
                  Productos
                </div>
                <div class="collapsible-body">
                  <p>

                    <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="productosTablaBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>

                      <table id="productosTabla" class = "responsive-table bordered hoverable centered ">
                        <thead>
                          <tr>
                            <?php
                            include("conexion.php");
                            //productos
                              $consulta = mysql_query("SELECT * FROM `productos` ORDER BY descripcion ASC") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla de productos');history.back();</script>");
                              

                            ?>
                              
                              <th>
                                <i class="mdi-content-archive"></i>
                                Inventario
                              </th>

                              <th data-field="Nombre">
                                <i class="mdi-communication-forum">
                                Nombre
                              </th>

                              <th data-field="Marca">
                                <i class="mdi-image-style"></i>
                                Marca
                              </th>

                              <th data-field="Elaboracion">
                                <i class="mdi-editor-wrap-text"></i>
                                Elaboracion
                              </th>

                              <th data-field="Costo">
                                <i class="mdi-editor-attach-money"></i>
                                Costo
                              </th>

                              <th data-field="Precio">
                                <i class="mdi-editor-attach-money"></i>
                                Precio
                              </th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          while($pro = mysql_fetch_array($consulta)){
                          echo '<tr>
                              <td>'.$pro['stock'].'</td>
                              <td>'.$pro['descripcion'].'</td>
                              <td>'.$pro['marca'].'</td>
                              <td>'.$pro['elaboracion'].'</td>
                              <td>'.$pro['costo'].'</td>
                              <td>'.$pro['precio'].'</td>
                            </tr>';
             
                          }
                          ?>
                        </tbody>
                      </table>


                  </p>
                </div>
              </li>
              <li>
                <div class="collapsible-header">
                  <i class="mdi-social-person-add"></i>
                  Cliente
                </div>
                <div class="collapsible-body">
                  <p>

                    <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="clientesTablaBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>

                    <table id="clientesTabla" class = "responsive-table bordered hoverable centered ">
                        <thead>
                          <tr>
                            <?php
                            //clientes
                              $consulta = mysql_query("SELECT * FROM clientes ORDER BY nombre ASC") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla de clientes');history.back();</script>");
                              

                            ?>
                              
                              <th data-field="Nombre">
                                <i class="mdi-social-person"></i>
                                Nombre
                              </th>

                              <th data-field="RFC">
                                <i class="mdi-av-subtitles"></i>
                                RFC
                              </th>

                              <th data-field="Numero">
                                <i class="mdi-communication-call"></i>
                                Numero
                              </th>

                              <th data-field="Estado">
                                <i class="mdi-maps-map"></i>                               
                                Estado
                              </th>

                              <th data-field="Direccion">
                                <i class="mdi-action-store"></i>
                                Direccion
                              </th>

                              <th data-field="No. Ext.">
                                <i class="mdi-action-home"></i>
                                No. Ext.
                              </th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          while($pro = mysql_fetch_array($consulta)){
                          echo '<tr>
                              <td>'.$pro['nombre'].'</td>
                              <td>'.$pro['rfc'].'</td>
                              <td>'.$pro['numero'].'</td>
                              <td>'.$pro['estado'].'</td>
                              <td>'.$pro['direccion'].'</td>
                              <td>'.$pro['noExt'].'</td>
                            </tr>';
             
                          }
                          ?>
                        </tbody>
                      </table>

                  </p>
                </div>
              </li>
              <li>
                <div class="collapsible-header">
                  <i class="mdi-maps-local-shipping"></i>
                  Provedores
                </div>
                <div class="collapsible-body">
                  <p>


                    <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="provedoresTablaBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>

                    <table id = "provedoresTabla" class = "responsive-table bordered hoverable centered ">
                        <thead>
                          <tr>
                            <?php
                              $consulta = mysql_query("SELECT * FROM provedores ORDER BY nombre ASC") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla de provedores');history.back();</script>");
                              

                            ?>
                              
                              <th data-field="Nombre">
                                <i class="mdi-maps-local-shipping"></i>
                                Nombre
                              </th>

                              <th data-field="RFC">
                                <i class="mdi-av-subtitles"></i>
                                RFC
                              </th>

                              <th data-field="Numero">
                                <i class="mdi-communication-call"></i>
                                Numero
                              </th>

                              <th data-field="Estado">
                                <i class="mdi-maps-map"></i>     
                                Estado
                              </th>

                              <th data-field="Direccion">
                                <i class="mdi-action-store"></i>
                                Direccion
                              </th>

                              <th data-field="No. Ext.">
                                <i class="mdi-action-home"></i>
                                No. Ext.
                              </th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          while($pro = mysql_fetch_array($consulta)){
                          echo '<tr>
                              <td>'.$pro['nombre'].'</td>
                              <td>'.$pro['rfc'].'</td>
                              <td>'.$pro['numero'].'</td>
                              <td>'.$pro['estado'].'</td>
                              <td>'.$pro['direccion'].'</td>
                              <td>'.$pro['noExt'].'</td>
                            </tr>';
             
                          }
                          ?>
                        </tbody>
                      </table>

                  </p>
                </div>
              </li>
                <?php if($_SESSION['acceso'] == "Administrativo"){?>

              <li>
                <div class="collapsible-header">
                  <i class="mdi-action-shopping-basket"></i>
                  Movimientos de producto(Ingreso)
                </div>
                <div class="collapsible-body">
                  <p>
                    <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="movimientosTablaBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>
                    <table id = "movimientosTabla" class = "responsive-table bordered hoverable centered ">
                        <thead>
                          <tr>
                            <?php
                            //ingreso de productos
                              $consulta = mysql_query("SELECT * FROM ingresoproducto ORDER BY Id_ingresoProducto DESC") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla de provedores');history.back();</script>");
                              

                            ?>
                              
                              <th data-field="Nombre">
                                <i class="mdi-action-today"></i>
                                Fecha
                              </th>

                              <th data-field="RFC">
                                <i class="mdi-communication-forum"></i>
                                Producto
                              </th>

                              <th data-field="Numero">
                                <i class="mdi-maps-local-shipping"></i>
                                Provedor
                              </th>

                              <th data-field="Estado">
                                <i class="mdi-action-history"></i>
                                Prod. Ant
                              </th>

                              <th data-field="Direccion">
                                <i class="mdi-action-add-shopping-cart"></i>
                                Prod. Ingr.
                              </th>

                              <th data-field="No. Ext.">
                                <i class="mdi-av-new-releases"></i>
                                Prod. Nuev
                              </th>
                              <th data-field="No. Ext.">
                                <i class="mdi-social-person"></i>
                                Usuario
                              </th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          //quien fue
                          while($pro = mysql_fetch_array($consulta)){

                            $producto = mysql_query("SELECT descripcion FROM productos WHERE Id_producto = '".$pro['Id_producto']."'");
                            $nombreProducto= mysql_fetch_assoc($producto);

                            $provedor = mysql_query("SELECT nombre FROM provedores WHERE Id_provedor = '".$pro['Id_provedor']."'");
                            $nombreProvedor= mysql_fetch_assoc($provedor);

                          echo '<tr>
                              <td>'.$pro['fechaIngreso'].'</td>
                              <td>'.$nombreProducto['descripcion'].'</td>
                              <td>'.$nombreProvedor['nombre'].'</td>
                              <td>'.$pro['productoAnterior'].'</td>
                              <td>'.$pro['productoIngresado'].'</td>
                              <td>'.$pro['productoNuevo'].'</td>
                              <td>'.$pro['nameUsername'].'</td>
                            </tr>';
             
                          }
                          ?>
                        </tbody>
                      </table>

                  </p>
                </div>
              </li>
              <li>
                <div class="collapsible-header">
                  <i class="mdi-social-people"></i>
                  Usuarios
                </div>
                <div class="collapsible-body">
                  <p>
                    <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="usuariosTablaBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>
                    <table id = "usuariosTabla" class = "responsive-table bordered hoverable centered">
                        <thead>
                          <tr>
                            <?php
                            //usuarios


                            #incluye los datos de conexion.php
                            include("conexion_login.php");

                            $consulta = mysql_query("SELECT * FROM usuarios u INNER JOIN empleados e ON (u.Id_empleado=e.Id_empleado) INNER JOIN areas a ON (a.Id_area=u.Id_area) ORDER BY u.username ASC",$con) or die ("<script type='text/javascript'>alert('Problemas en llenar tabla de provedores');history.back();</script>");
                              

                            ?>
                              
                              <th data-field="Nombre">
                                <i class="mdi-social-person"></i>
                                Usuario
                              </th>

                              <th>
                                <i class="mdi-communication-business"></i>
                                Area
                              </th>

                              <th>
                                <i class="mdi-social-person"></i>
                                Nombre
                              </th>

                              <th>
                                <i class="mdi-communication-call"></i>
                                Numero
                              </th>

                              <th data-field="Estado">
                                <i class="mdi-maps-map"></i>                               
                                Estado
                              </th>

                              <th>
                                <i class="mdi-action-store"></i>
                                Direccion
                              </th>

                              <th data-field="No. Ext.">
                                <i class="mdi-action-home"></i>
                                No. Ext.
                              </th>

                              <th data-field="CCP">
                                <i class="mdi-action-markunread-mailbox"></i>
                                CCP 
                              </th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          while($pro = mysql_fetch_array($consulta)){



                          echo '<tr>
                              <td>'.$pro['username'].'</td>
                              <td>'.$pro['nombre_area'].'</td>
                              <td>'.$pro['nombre'].'</td>
                              <td>'.$pro['numero'].'</td>
                              <td>'.$pro['estado'].'</td>
                              <td>'.$pro['direccion'].'</td>
                              <td>'.$pro['noExt'].'</td>
                              <td>'.$pro['ccp'].'</td>
                            </tr>';
             
                          }
                          ?>
                        </tbody>
                      </table>

                  </p>
                </div>
              </li>
              <?php } ?>
            </ul>
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
            
            <?php if($_SESSION['acceso'] == "Administrativo"){?>



            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                   <!-- menu de tareas rapidas, se repite en todas las demas paginas -->
                <li><a class="btn-floating tooltipped grey" data-tooltip="Top Vendidos" data-position="left" onclick = "location='vendidos.php'"><i class="large mdi-action-trending-up"></i></a></li>
                <li><a class="btn-floating tooltipped blue" data-tooltip="Corte de caja" data-position="left" onclick = "location='corte.php'"><i class="large mdi-action-assignment-turned-in"></i></a></li>
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating tooltipped yellow darken-1" data-tooltip="Altas" data-position="left" onclick = "location='altas.php'"><i class="large mdi-action-add-shopping-cart"></i></a></li>
                <li><a class="btn-floating tooltipped purple" data-tooltip="Edición" data-position="left" onclick = "location='edicion.php'"><i class="large mdi-editor-mode-edit"></i></a></li>
                <li><a class="btn-floating tooltipped grey" data-tooltip="Catalogo de Cortes" data-position="left" onclick = "location='catalogo_cortes.php'"><i class="large mdi-editor-insert-chart"></i></a></li>

              </ul>
            </div>
            <?php }else{?>
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                   <!-- menu de tareas rapidas, se repite en todas las demas paginas -->
                <li><a class="btn-floating tooltipped blue" data-tooltip="Corte de caja" data-position="left" onclick = "location='corte.php'"><i class="large mdi-action-assignment-turned-in"></i></a></li>
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>

              </ul>
            </div>
            <?php }?>
 
         <!-- main -->
         <div class="push"></div>
      </main>
    <!-- footer-->
    <footer class="page-footer blue">

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

      <script type="text/javascript">
        $(document).ready(function(){
          $('.collapsible').collapsible({
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
          });
        });
        $(document).ready(function() {
          $('select').material_select();
        });

      </script>
      <script> 
      $(document).ready(function() 
          { 
              $("#usuariosTabla").tablesorter(); 
          } 
      ); 
      $(document).ready(function() 
          { 
              $("#movimientosTabla").tablesorter(); 
          } 
      ); 
      $(document).ready(function() 
          { 
              $("#provedoresTabla").tablesorter(); 
          } 
      ); 
      $(document).ready(function() 
          { 
              $("#productosTabla").tablesorter(); 
          } 
      ); 
      $(document).ready(function() 
          { 
              $("#clientesTabla").tablesorter(); 
          } 
      ); 


    

      </script>
      <script>
      $(document).ready(function(){
        // Write on keyup event of keyword input element
        $("#productosTablaBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#productosTabla tbody>tr").hide();
            $("#productosTabla td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          else
          {
            // When there is no input or clean again, show everything back
            $("#productosTabla tbody>tr").show();
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
      <script>
      $(document).ready(function(){
        // Write on keyup event of keyword input element
        $("#clientesTablaBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#clientesTabla tbody>tr").hide();
            $("#clientesTabla td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          else
          {
            // When there is no input or clean again, show everything back
            $("#clientesTabla tbody>tr").show();
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
      <script>
      $(document).ready(function(){
        // Write on keyup event of keyword input element
        $("#provedoresTablaBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#provedoresTabla tbody>tr").hide();
            $("#provedoresTabla td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          else
          {
            // When there is no input or clean again, show everything back
            $("#provedoresTabla tbody>tr").show();
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
      <script>
      $(document).ready(function(){
        // Write on keyup event of keyword input element
        $("#movimientosTablaBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#movimientosTabla tbody>tr").hide();
            $("#movimientosTabla td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          else
          {
            // When there is no input or clean again, show everything back
            $("#movimientosTabla tbody>tr").show();
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
      <script>
      $(document).ready(function(){
        // Write on keyup event of keyword input element
        $("#usuariosTablaBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#usuariosTabla tbody>tr").hide();
            $("#usuariosTabla td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          else
          {
            // When there is no input or clean again, show everything back
            $("#usuariosTabla tbody>tr").show();
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