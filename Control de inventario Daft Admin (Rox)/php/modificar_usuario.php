<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if (($_SESSION['acceso'] == 'Administrativo') || ($_SESSION['acceso'] == 'Operacion')) {
//se ejecutara si se cumple
  ?>


<!DOCTYPE html>
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">

      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    </head>

    <body>
      <header>
        <nav class = "top-nav">

          <div class = "nav-wrapper  blue darken-2">
              

            <a href="#" class = "brand-logo center"><i class = "mdi-communication-vpn-key"></i></a>
            

            <ul id="nav-mobile" class="left">
            
              <li><a href = "<?php echo $_SESSION['acceso'];?>.php" ><i class = "mdi-navigation-arrow-back"></i></a></li>
              
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
                <h2 class="header center"><?php echo $_SESSION['username']; ?></h2>
              </span>
            </div>
          </div>
        </div>
        <?php
        include("conexion_login.php");

        $usuario = $_SESSION['username'];
        $consulta = mysql_query("SELECT * FROM usuarios u INNER JOIN empleados e ON (u.Id_empleado=e.Id_empleado) INNER JOIN areas a ON (a.Id_area=u.Id_area) WHERE u.username = '$usuario'",$con) or die ("<script type='text/javascript'>alert('Problemas en llenar tabla de provedores');history.back();</script>");
        $user = mysql_fetch_assoc($consulta);
        ?>

        <div class="container">
          <div class="col s12">
            <div class="card blue-grey lighten-5">
              <div class="card-content black-text">
                

                <form class = "col s12" id="modificar_usuario" enctype="multipart/form-data" autocomplete="off">
                  
                <span class="card-title black-text">Contraseña</span>
                <div class="row">
                  <div class="input-field col s5">
                    <i class="mdi-communication-vpn-key prefix"></i>
                    <input id="pass" name="passwordOriginal" type="password" class="validate">
                    <label for="pass">Contraseña</label>
                  </div> 
                  <div class="input-field col s5">
                    <i class="mdi-communication-vpn-key prefix"></i>
                    <input id="password" name="passwordNueva" type="password" class="validate">
                    <label for="password">Nueva contraseña</label>
                  </div>
                  <div class="input-field col s2">
                    <!-- Scripts para cambiar el icono de mostrar contraseña INICIO-->
                    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
                        <script>
                        $(document).on('ready', function() {
                          $('#button_showHide').on('mousedown', function(e) {
                            e.preventDefault();

                            var current = $(this).attr('action');

                            if (current == 'hide') {
                              $(this).removeClass('mdi-action-visibility').addClass('mdi-action-visibility-off').attr('action','show');
                            }
                          })
                        })
                      </script>
                      <script>
                        $(document).on('ready', function() {
                          $('#button_showHide').on('mouseup', function(e) {
                            e.preventDefault();

                            var current = $(this).attr('action');

                            if (current == 'show') {
                              $(this).removeClass('mdi-action-visibility-off').addClass('mdi-action-visibility').attr('action','hide');
                            }
                          })
                        })
                      </script>
                      <!-- Scripts para cambiar el icono de mostrar contraseña FIN-->
                      <a class="btn-floating tooltipped" data-tooltip="Mostrar/Ocultar" data-position="bottom"><i class="mdi-action-visibility small" id="button_showHide" action="hide"></i></a>
                  </div>
                </div>

                <span class="card-title black-text">Modificar datos</span>


                          <div class="row">
                              <input name="correoOriginal" hidden value = "<?php echo $user['correo']; ?>" type="text">

                            
                            <div class="input-field col s6">
                              <i class="mdi-social-person prefix"></i>
                              <input id="icon_prefix" name="nombre" value = "<?php echo $user['nombre']; ?>"  pattern="^[a-zA-Z][a-zA-Z\s]*$" type="text" class="validate" required>
                              <label for="icon_prefix">Nombre</label>
                            </div> 
                            <div class="input-field col s6">
                              <i class="mdi-communication-call prefix"></i>
                              <input id="icon_prefix" name="numero" type="text" value = "<?php echo $user['numero']; ?>" maxlenght="10" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero</label>
                            </div>

                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-av-subtitles prefix"></i>
                              <input name = "rfc" maxlength="13" id="icon_prefix" value = "<?php echo $user['rfc']; ?>" type="text" class="validate" required>
                              <label for="icon_prefix">RFC</label>
                            </div>

                            <div class="input-field col s6">
                              <select class = "browser-default" name = "estado" required>
                                <option value = "<?php echo $user['estado']; ?>" selected><?php echo $user['estado']; ?></option>
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
                            <div class="input-field col s12">
                              <i class="mdi-communication-email prefix"></i>
                              <input name = "correo" id="icon_prefix" value = "<?php echo $user['correo']; ?>" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" type="email" class="validate" required>
                              <label for="icon_prefix" >Correo</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-action-store prefix"></i>
                              <input name = "direccion" id="icon_prefix" value = "<?php echo $user['direccion']; ?>" pattern="^[a-zA-Z\d][a-zA-Z\d\.\#-\s]*$" type="text" class="validate" required>
                              <label for="icon_prefix">Direccion</label>
                            </div>

                            <div class="input-field col s6">
                              <i class="mdi-maps-directions prefix"></i>
                              <input name = "colonia" value = "<?php echo $user['colonia']; ?>" pattern="^[a-zA-Z\d][a-zA-Z\d\.\#-\s]*$" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Colonia</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-action-home prefix"></i>
                              <input name = "noExterno" value = "<?php echo $user['noExt']; ?>" maxlength = "5" min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero Externo</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-action-markunread-mailbox prefix"></i>
                              <input name = "ccp" maxlength = "5" value = "<?php echo $user['ccp']; ?>" pattern="^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$ " min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Codigo Postal</label>
                            </div>
                            
                          </div>




                  <div class="row">
                    <div class="input-field col 6 right">
                      <button class="btn blue waves-light" id = "boton_usuario">Modificar
                        <i class="mdi-social-person-add right"></i></button>
                        
                    </div>
                  </div>
                  
                </form>


              </div>
            </div>
          </div>
        </div>

            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                <li><a class="btn-floating tooltipped blue" data-tooltip="Corte de caja" data-position="left" onclick = "location='corte.php'"><i class="large mdi-action-assignment-turned-in"></i></a></li>
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating tooltipped yellow darken-1" data-tooltip="Altas" data-position="left" onclick = "location='altas.php'"><i class="large mdi-action-add-shopping-cart"></i></a></li>
                <li><a class="btn-floating tooltipped purple" data-tooltip="Edición" data-position="left" onclick = "location='edicion.php'"><i class="large mdi-editor-mode-edit"></i></a></li>
                <li><a class="btn-floating tooltipped grey" data-tooltip="Catalogo de Cortes" data-position="left" onclick = "location='catalogo_cortes.php'"><i class="large mdi-editor-insert-chart"></i></a></li>
                <li><a class="btn-floating tooltipped brown" data-tooltip="Catalogo General" data-position="left" onclick = "location='catalogos.php'"><i class="large mdi-action-description" ></i></a></li>
                <li><a class="btn-floating tooltipped red" data-tooltip="Cerrar Sesión" data-position="left" onclick = "location='logout.php'"><i class="mdi-navigation-cancel" ></i></a></li>

              </ul>
            </div>    




           
         <!-- main -->
      </main>
    <!-- footer-->
    <footer class="page-footer blue">

          <div class="footer-copyright">
            <div class="container">
            © 2015 Materialize
            <a class="grey-text text-lighten-4 right" href="#!">2015</a>
            </div>
          </div>
        </footer>
      <!-- end footer-->


      <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script src="../js/sweetalert.min.js"></script>

      <script type="text/javascript">
      function justNumbers(e)
      {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
      } 
      

      </script>

        <!-- Script para Mostrar Contraseña -->
        <script>
          var pass = document.getElementById("pass");
          var password = document.getElementById("password");
          var button = document.getElementById("button_showHide");

          button.addEventListener("mousedown", function() {
              pass.setAttribute("type", "text");
              password.setAttribute("type", "text");

          });

          button.addEventListener("mouseup", function() {
            pass.setAttribute("type", "password");
            password.setAttribute("type", "password");
          });
        </script>

      <!-- ================== -->

      <script>   
        $(function(){
         $("#boton_usuario").click(function(){
         var url = "modificar_datos_usuario.php"; // El script a dónde se realizará la petición.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#modificar_usuario").serialize(), // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {
                      if(data == "Datos modificados correctamente"){
                        swal({   title: "Modificar usuario",   text: data,   type: "success", timer: 2000,   showConfirmButton: false});
                        setTimeout(function(){
                          location.reload();
                        }, 2000);

                      }
                      
                      else if(data == "Falta algun dato por llenar" ){
                        swal({   title: "Modificar usuario",   text: data,   type: "info",   confirmButtonText: "Ok!" });

                      }
                      else{
                        swal({   title: "Modificar usuario",   text: data,   type: "error",   confirmButtonText: "Ok!" });

                      }

                   }

                 });

            return false; // Evitar ejecutar el submit del formulario.
         });
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