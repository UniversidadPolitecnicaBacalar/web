<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {
    # code...
  
  ?>


<!DOCTYPE html>
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
      <link rel="stylesheet" href="../css/style.css">

      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    </head>

    <body>
      <header>
        <nav class = "top-nav">

          <div class = "nav-wrapper  blue darken-2">
              

            <a href="#" class = "brand-logo center"><i class = "mdi-action-add-shopping-cart"></i></a>

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
                  <!--<li><a onclick="">Cambiar Imagen</a></li>-->
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

        <?php 



        ?>


        <div class="section white">
          <div class="row container">
            <div class = "card-panel ">
              <span class = "black-text">
                <h2 class="header center">Altas</h2>
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
                  Producto
                </div>
                <div class="collapsible-body">
                  <p>


                    <div class = "container">
                      <!--form producto-->
                      <div class="row">
                        <form class="col s12" id = "formulario_producto" autocomplete="off">
                          <input type="hidden" name="alta" value="producto">


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-action-add-shopping-cart prefix"></i>
                              <input id="icon_prefix" min = "0" name="stock" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Stock</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-maps-local-restaurant prefix"></i>
                              <input id="icon_prefix" name="nombre" type="text" class="validate" required>
                              <label for="icon_prefix">Nombre</label>
                            </div>                            
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <select name = "elaboracion" required>
                                <option value="" disabled selected>Elaboracion</option>
                                <option value="Interno">Interno</option>
                                <option value="Externo">Externo</option>
                              </select>
                            </div>
                            <div class="input-field col s6">
                              <select name = "tipo" required>
                                <option value="" disabled selected>Tipo</option>
                                <option value="Alimento">Alimento</option>
                                <option value="Bebida">Bebida</option>
                                <option value="Golosina">Golosina</option>
                              </select>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-image-style prefix"></i>
                              <input name = "marca" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Marca</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-editor-vertical-align-center prefix"></i>
                              <input name = "cantidad" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Medida</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "costo" min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Costo</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "precio" min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Precio al público</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s12">
                              <select name = "provedor" class ="browser-default" required>

                                <option value="" disabled selected>Provedor</option>



                                <?php


                                //trae los provedores


                                include("conexion.php");

                                $consulta = mysql_query("SELECT * FROM provedores ") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla de clientes');window.location='administrativo.php';</script>");
                              
                                while($prov = mysql_fetch_array($consulta)){
                                  echo '<option value ="'.$prov['Id_provedor'].'">'.$prov['nombre'].'</option>';
                     
                                  }


                                ?>
                              </select>
                            </div>
                          </div>


                          <div class = "container center col s12">
                            <button class="waves-effect waves-light btn blue" id = "boton_enviar"><i class="mdi-maps-local-restaurant left"></i>Dar de alta producto</button>
                          
                            <button class="btn waves-effect waves-light red" type="reset" onclick = "Materialize.toast('Borrando', 750, 'rounded')" name="action">Borrar
                              <i class="mdi-content-undo right"></i>
                            </button>
                          </div>

                          

                        </form>
                      </div>
                      <!--form producto-->

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


                    <div class = "container">
                      <!--form cliente-->
                      <div class="row">
                        <form class="col s12" id="formulario_cliente" autocomplete="off">
                          <input type="hidden" name="alta" value="cliente">

                          <div class="row">
                            
                            <div class="input-field col s6">
                              <i class="mdi-social-person prefix"></i>
                              <input id="icon_prefix" name="nombre" type="text" class="validate" required>
                              <label for="icon_prefix">Nombre</label>
                            </div> 
                            <div class="input-field col s6">
                              <i class="mdi-communication-call prefix"></i>
                              <input id="icon_prefix" name="numero" type="tel" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero</label>
                            </div>

                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-av-subtitles prefix"></i>
                              <input name = "rfc" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">RFC</label>
                            </div>

                            <div class="input-field col s6">
                              <select class = "browser-default" name = "estado" required>
                                <option value="" disabled selected>Estado</option>
                                  <option value = "Aguascalientes">Aguascalientes</option>
                                  <option value = "Baja Californa">Baja Californa</option>
                                  <option value = "Baja Californa Sur">Baja Californa Sur</option>
                                  <option value = "Campeche">Campeche</option>
                                  <option value = "Chiapas">Chiapas</option>
                                  <option value = "Chihuahua">Chihuahua</option>
                                  <option value = "Coahuila">Coahuila</option>
                                  <option value = "Colima<">Colima</option>
                                  <option value = "Distrito Federeal">Distrito Federeal</option>
                                  <option value = "Durango">Durango</option>
                                  <option value = "Estado de México">Estado de México</option>
                                  <option value = "Guanajuato">Guanajuato</option>
                                  <option value = "Guerrero">Guerrero</option>
                                  <option value = "Hidalgo">Hidalgo</option>
                                  <option value = "Jalisco">Jalisco</option>
                                  <option value = "Michoacán">Michoacán</option>
                                  <option value = "Morelos">Morelos</option>
                                  <option value = "Nayarit">Nayarit</option>
                                  <option value = "Nuevo León">Nuevo León</option>
                                  <option value = "Oaxaca">Oaxaca</option>
                                  <option value = "Puebla">Puebla</option>
                                  <option value = "Querétaro">Querétaro</option>
                                  <option value = "Quintana Roo">Quintana Roo</option>
                                  <option value = "San Luis Potosí">San Luis Potosí</option>
                                  <option value = "Sinaloa">Sinaloa</option>
                                  <option value = "Sonora">Sonora</option>
                                  <option value = "Tabasco">Tabasco</option>
                                  <option value = "Tamaulipas">Tamaulipas</option>
                                  <option value = "Tlaxcala">Tlaxcala</option>
                                  <option value = "Veracruz">Veracruz</option>
                                  <option value = "Yucatán">Yucatán</option>
                                  <option value = "Zacatecas">Zacatecas</option>

                              </select>
                            </div>

                            
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <img src="" alt="">
                              <i class="mdi-action-store prefix"></i>
                              <input name = "direccion" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Direccion</label>
                            </div>

                            <div class="input-field col s6">
                              <i class="mdi-maps-directions prefix"></i>                              
                              <input name = "colonia" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Colonia</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-action-home prefix"></i>
                              <input name = "noExterno" min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">No. Ext.</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-action-markunread-mailbox prefix"></i>
                              <input name = "ccp" min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">CCP</label>
                            </div>
                            
                          </div>
                          <br>


                          <div class = "container center col s12">
                            <button class="waves-effect waves-light btn blue" id ="boton_cliente"><i class="mdi-social-person-add left"></i>Dar de alta cliente</button>
                            

                            <button class="btn waves-effect waves-light red" type="reset" onclick = "Materialize.toast('Borrando', 750, 'rounded')" name="action">Borrar
                                <i class="mdi-content-undo right"></i>
                              </button>



                          </div>


                        </form>
                      </div>
                      <!--form cliente-->

                  </p>
                </div>
              </li>
              <li>
                <div class="collapsible-header">
                  <i class="mdi-maps-local-shipping"></i>
                  Provedor
                </div>
                <div class="collapsible-body">
                  <p>


                    <div class = "container">
                      <!--form provedor-->
                      <div class="row">
                        <form class="col s12" id="formulario_provedor" autocomplete="off">
                          <input type="hidden" name="alta" value="provedor">

                          <div class="row">
                            
                            <div class="input-field col s12">
                              <i class="mdi-maps-local-shipping prefix"></i>
                              <input id="icon_prefix" name="nombre" type="text" class="validate" required>
                              <label for="icon_prefix">Nombre</label>
                            </div> 
                           

                          </div>


                          <div class="row">
                            
                            <div class="input-field col s6">
                              <i class="mdi-communication-email prefix"></i>
                              <input id="icon_prefix" name="correo" type="text" class="validate" required>
                              <label for="icon_prefix">Correo</label>
                            </div> 
                            <div class="input-field col s6">
                              <i class="mdi-communication-call prefix"></i>
                              <input id="icon_prefix" name="numero" type="tel" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero</label>
                            </div>

                          </div>


                          <div class="row">

                            <div class="input-field col s6">
                              <i class="mdi-av-subtitles prefix"></i>
                              <input name = "rfc" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">RFC</label>
                            </div>
               
                            <div class="input-field col s6">
                              <select class = "browser-default" name = "estado" required>
                                <option value="" disabled selected>Estado</option>
                                  <option value = "Aguascalientes">Aguascalientes</option>
                                  <option value = "Baja Californa">Baja Californa</option>
                                  <option value = "Baja Californa Sur">Baja Californa Sur</option>
                                  <option value = "Campeche">Campeche</option>
                                  <option value = "Chiapas">Chiapas</option>
                                  <option value = "Chihuahua">Chihuahua</option>
                                  <option value = "Coahuila">Coahuila</option>
                                  <option value = "Colima<">Colima</option>
                                  <option value = "Distrito Federeal">Distrito Federeal</option>
                                  <option value = "Durango">Durango</option>
                                  <option value = "Estado de México">Estado de México</option>
                                  <option value = "Guanajuato">Guanajuato</option>
                                  <option value = "Guerrero">Guerrero</option>
                                  <option value = "Hidalgo">Hidalgo</option>
                                  <option value = "Jalisco">Jalisco</option>
                                  <option value = "Michoacán">Michoacán</option>
                                  <option value = "Morelos">Morelos</option>
                                  <option value = "Nayarit">Nayarit</option>
                                  <option value = "Nuevo León">Nuevo León</option>
                                  <option value = "Oaxaca">Oaxaca</option>
                                  <option value = "Puebla">Puebla</option>
                                  <option value = "Querétaro">Querétaro</option>
                                  <option value = "Quintana Roo">Quintana Roo</option>
                                  <option value = "San Luis Potosí">San Luis Potosí</option>
                                  <option value = "Sinaloa">Sinaloa</option>
                                  <option value = "Sonora">Sonora</option>
                                  <option value = "Tabasco">Tabasco</option>
                                  <option value = "Tamaulipas">Tamaulipas</option>
                                  <option value = "Tlaxcala">Tlaxcala</option>
                                  <option value = "Veracruz">Veracruz</option>
                                  <option value = "Yucatán">Yucatán</option>
                                  <option value = "Zacatecas">Zacatecas</option>

                              </select>
                            </div>

                            
                          </div>


                          <div class="row">


                            <div class="input-field col s6">
                              <i class="mdi-maps-place prefix"></i>
                              <input name = "ciudad" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Ciudad</label>
                            </div>

                            

                            <div class="input-field col s6">
                              <i class="mdi-action-store prefix"></i>
                              <input name = "direccion" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Direccion</label>
                            </div>
                          </div>


                          <div class="row">

                            <div class="input-field col s6">
                              <i class="mdi-maps-directions prefix"></i>
                              <input name = "colonia" min = "0" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Colonia</label>
                            </div>



                            <div class="input-field col s6">
                              <i class="mdi-action-home prefix"></i>
                              <input name = "noExterno" min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">No. Ext.</label>
                            </div>
                            
                            
                          </div>



                          <div class="row">

                            <div class="input-field col s6">
                              <i class="mdi-action-markunread-mailbox prefix"></i>
                              <input name = "ccp" min = "0" id="icon_prefix" type="text" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">CCP</label>
                            </div>



                            <div class="input-field col s6">
                              <i class="mdi-action-today prefix"></i>
                              <input name = "fechaEntrega" id="icon_prefix" type="date" onkeypress="return justNumbers(event);" required>
                              <!--<label for="icon_prefix">Fecha entrega</label>-->
                            </div>
                            
                            
                          </div>


                          <br>


                          <div class = "container center col s12">
                            <button class="waves-effect waves-light btn blue" id = "boton_provedor"><i class="mdi-social-person-add left"></i>Dar de alta provedor</button>
                          

                           
                            <button class="btn waves-effect waves-light red" type="reset" onclick = "Materialize.toast('Borrando', 750, 'rounded')" name="action">Borrar
                                <i class="mdi-content-undo right"></i>
                              </button>
 



                          </div>


                        </form>
                      </div>
                      <!--form Provevdor-->

                  </p>
                </div>
              </li>
              
              
            </ul>
          </div>
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

             <!-- menu de tareas rapidas, se repite en todas las demas paginas -->
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                <li><a class="btn-floating tooltipped grey" data-tooltip="Top Vendidos" data-position="left" onclick = "location='vendidos.php'"><i class="large mdi-action-trending-up"></i></a></li>
                <li><a class="btn-floating tooltipped blue" data-tooltip="Corte de caja" data-position="left" onclick = "location='corte.php'"><i class="large mdi-action-assignment-turned-in"></i></a></li>
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating tooltipped purple" data-tooltip="Edición" data-position="left" onclick = "location='edicion.php'"><i class="large mdi-editor-mode-edit"></i></a></li>
                <li><a class="btn-floating tooltipped grey" data-tooltip="Catalogo de Cortes" data-position="left" onclick = "location='catalogo_cortes.php'"><i class="large mdi-editor-insert-chart"></i></a></li>
                <li><a class="btn-floating tooltipped brown" data-tooltip="Catalogo General" data-position="left" onclick = "location='catalogos.php'"><i class="large mdi-action-description" ></i></a></li>

              </ul>
            </div>  



      <div class="push"></div>
           
         <!-- main -->
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
      <script src="../js/sweetalert.min.js"></script>

      <script type="text/javascript">
        function abrirCambiarImagen(){
          $('#ModalImagen').openModal();
        }
      </script>
      
      <script>   
        $(function(){
         $("#boton_enviar").click(function(){
         var url = "dar_de_alta.php"; // El script a dónde se realizará la petición.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formulario_producto").serialize(), // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {

                      if(data == "Producto guardado correctamente"){
                        swal({   title: "Dar de alta producto",   text: data,   type: "success", timer: 2000,   showConfirmButton: false});
                        document.getElementById("formulario_producto").reset();// Mostrar la respuestas del script PHP.

                      }
                      else if(data == "Falta algun dato por llenar o tienes algun dato en cero"){
                        swal({   title: "Dar de alta producto",   text: data,   type: "info",   confirmButtonText: "Ok!" });
                      }
                      else{
                        swal({   title: "Dar de alta producto",   text: data,   type: "error",   confirmButtonText: "Ok!" });

                      }
                   }

                 });

            return false; // Evitar ejecutar el submit del formulario.
         });
        });
        </script>
        <script>   
        $(function(){
         $("#boton_cliente").click(function(){
         var url = "dar_de_alta.php"; // El script a dónde se realizará la petición.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formulario_cliente").serialize(), // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {
                        
                      if(data == "Cliente guardado"){
                        swal({   title: "Dar de alta cliente",   text: data,   type: "success", timer: 2000,   showConfirmButton: false});
                        document.getElementById("formulario_cliente").reset();// Mostrar la respuestas del script PHP.

                      }
                      else if(data == "Falta algun dato por llenar en cliente"){
                        swal({   title: "Dar de alta cliente",   text: data,   type: "info",   confirmButtonText: "Ok!" });
                      }
                      else{
                        swal({   title: "Dar de alta cliente",   text: data,   type: "error",   confirmButtonText: "Ok!" });

                      }

                   }

                 });

            return false; // Evitar ejecutar el submit del formulario.
         });
        });
        </script>
        <script>   
        $(function(){
         $("#boton_provedor").click(function(){
         var url = "dar_de_alta.php"; // El script a dónde se realizará la petición.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formulario_provedor").serialize(), // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {
                      if(data == "Provedor guardado"){
                        swal({   title: "Dar de alta provedor",   text: data,   type: "success", timer: 2000,   showConfirmButton: false});
                        document.getElementById("formulario_provedor").reset();// Mostrar la respuestas del script PHP.

                      }
                      else if(data == "Falta algun dato por llenar en provedor"){
                        swal({   title: "Dar de alta provedor",   text: data,   type: "info",   confirmButtonText: "Ok!" });
                      }
                      else{
                        swal({   title: "Dar de alta provedor",   text: data,   type: "error",   confirmButtonText: "Ok!" });

                      }

                   }

                 });

            return false; // Evitar ejecutar el submit del formulario.
         });
        });
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

         $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 5 // Creates a dropdown of 15 years to control year
        }); 
        



      </script>
      <script type="text/javascript">
      function justNumbers(e)
      {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
      } 

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