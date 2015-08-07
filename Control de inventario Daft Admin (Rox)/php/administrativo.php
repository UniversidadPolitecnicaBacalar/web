<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {
    include("conexion_login.php");
    # code...
  

//se ejecutara si se cumple
  ?>


<!DOCTYPE html>
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="../css/materialize.css">
      <link type="text/css" rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/webicons/webicons.css">
      

      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    </head>
    <body>
      <header>
        <nav class = "top-nav">

          <div class="nav-wrapper blue darken-2"><!--Contenedor Inicio-->
              <a href="#" class = "brand-logo center"><i class = "mdi-communication-business"></i></a>

              <ul class="right"><!-- Menu Cuenta de usuario -->
                <li><a class="dropdown-button tooltipped" data-tooltip="Cuenta" data-position="bottom" data-activates="dropdown1">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']?>&nbsp;  &nbsp;&nbsp;&nbsp;<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                <ul id='dropdown1' class='dropdown-content large'>
                  <!--<li><a onclick="">Cambiar Imagen</a></li>-->
                  <li><a onclick="abrirCambiarImagen()">Cambiar Imagen</a></li>
                  <li><a onclick="location='modificar_usuario.php'">Modificar Cuenta</a></li>
                  <li><a onclick = "location='logout.php'">Cerrar Sesión</a></li>
                </ul>
              </ul>
              <!--================= Barra Movil Inicio ==================-->
              <div class="show-on-small">
                <ul id="slide-out" class="side-nav">
                <!-- submenu altas -->
                  <li><a onclick = "location='vendidos.php'"><i class="mdi-action-trending-up left"></i>Top Vendidos</a></li>
                  <li><a onclick = "acceso()"><i class="mdi-communication-vpn-key left"></i>Nuevo Usuario</a></li>
                  <li><a onclick = "location='altas.php'">Altas<i class="mdi-action-add-shopping-cart left"></i></a></li>
                  <li><a onclick = "location='catalogos.php'">Catalogo<i class="mdi-action-description left"></i></a></li>
                  <li><a onclick = "location='catalogo_cortes.php'">Cortes Anteriores<i class="mdi-editor-insert-chart left"></i></a></li>
                  <li><a onclick = "location='corte.php'">Corte de Caja<i class="mdi-action-assignment-turned-in left"></i></a></li>
                  <li><a onclick = "location='edicion.php'">Edición/Eliminar<i class="mdi-editor-mode-edit left"></i></a></li>
                  <li><a onclick = "location='ingreso.php'">Ingresos<i class="mdi-content-add-circle left"></i></a></li>
                </ul>
              </div>
            <!--================= Barra Movil Fin ==================-->

            <!--================= Barra PRINCIPAL Inicio ==================-->
            <ul class="right">
              <div>
                <!--<li><a class="tooltipped hide-on-small-only" data-tooltip="Contacto" data-position="bottom" onclick = "abrirAcerca()"><i class="mdi-social-people"></i></a></li>-->
                <li><a class="tooltipped show-on-small-and-up" data-tooltip="Notificaciones" data-position="bottom" onclick = "abrirNotificacion()"><i class="mdi-action-info-outline" id="button_show"></i></a></li>
              </div>
            </ul>
            <div class="show-on-small">
              <a href="#" data-activates="slide-out" class="button-collapse tooltipped" data-tooltip="Menú" data-position="right"><i class="mdi-navigation-menu"></i></a>
            </div>
          </div><!--Contenedor Fin-->
        </nav>

      </header>    
  <!-- main -->
      <main>

        <!--<div class="parallax-container">
          <div class="parallax">
            <img src="images/bacalar.jpg">
          </div>
        </div>-->
        <?php 



        ?>


        <div class="section white">
          <div class="row container">
            <div class = "card-panel " >
              <span class = "black-text">
                <!-- muestra el usuario y su sesion -->
  

                <?php
                //ruta de la imagen del usuario
                $nombreUsuario = $_SESSION['username'];

                //$ruta = "../images/users/".$_SESSION['username'].".png";
                $consultaId = mysql_query("SELECT rutaImagen FROM usuarios WHERE username = '$nombreUsuario'",$con);
                $arrayId = mysql_fetch_assoc($consultaId);
                $ruta = $arrayId['rutaImagen'];
                ?>


                <img src="<?php echo $ruta; ?>" alt="" class="circle left" width = "110px" height = "110px" id="imagenCuenta">
                <!-- bienvenido del usuario --> 
                <h2 class="header center">Bienvenido <?php echo $_SESSION['username']; ?></h2>
                <!--<h4 class="header center">Estas en area de <?php //echo $_SESSION['acceso'] ?></h4>-->
              </span>
            </div>
          </div>
        </div>
            

            <div class = "row center">
              <!-- boton de cargando si se puchea abrira el menu -->
              <a class="waves-effect waves-light btn-large" id = "mostrar" href = "#!" onclick = "mostrar()">
                <i class="mdi-action-accessibility right"></i>Cargando
              </a>
            </div>
            <!-- contenedor que esta oculto -->
            <div class="container center hide-on-small-only" id = "acciones" style = "display:none;">
                <div class="container">
                  
                  <a class="waves-effect waves-light btn white btn-large" onclick = "location='vendidos.php'"><span class = "black-text"><i class="mdi-action-trending-up right"></i>Top vendidos</span></a>



                </div>
                <br>

                <div class="container">

                  <a class="waves-effect waves-light btn green btn-large" onclick = "location='ingreso.php'"><i class="mdi-content-add-circle right"></i>Ingreso</a>
                  <a class="waves-effect waves-light btn orange btn-large" onclick = "location='altas.php'"><i class="mdi-action-add-shopping-cart right"></i>Altas</a>
  
                
                </div>
                <br>
                <div class="container">

                  <a class="waves-effect waves-light btn blue btn-large" onclick = "location='corte.php'"><i class="mdi-action-assignment-turned-in right"></i>Corte de caja</a>
                  <a class="waves-effect waves-light btn black btn-large" onclick = "acceso()"><i class="mdi-social-person-add right"></i>Nuevo usuario</a>
                  
                  
                </div>
                <div class = "container"> 
                  <br>
                  
                  <a class="waves-effect waves-light btn purple btn-large" onclick = "location='edicion.php'" ><i class="mdi-editor-mode-edit right"></i>Editar/Eliminar</a>
                  
                  <a class="waves-effect waves-light btn grey btn-large" onclick = "location='catalogo_cortes.php'" ><i class="mdi-editor-insert-chart right"></i>Cortes ant.</a>
                  
  
                </div>
                <div class = "container"> 
                  <br>
                  
                  <button class="waves-effect waves-light btn brown btn-large" onclick = "location='catalogos.php'" ><i class="mdi-action-description right"></i>Catalogos</button>
                  
                  <a class="waves-effect waves-light btn red btn-large" onclick = "location='logout.php'" ><i class="mdi-navigation-cancel right"></i>Cerrar sesion</a>
                  
  
                </div>
            </div>
            <!-- circulo de cargando -->
            <div class = "row center" id = "circulo_cargando">
              
              <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>

            </div>
            



            <!-- modal-->


            <!-- menu de tareas rapidas, se repite en todas las demas paginas 
            <div class="fixed-action-btn hide-on-med-and-down" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                <li><a class="btn-floating tooltipped blue" data-tooltip="Corte de caja" data-position="left" onclick = "location='corte.php'"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating tooltipped yellow darken-1" data-tooltip="Altas" data-position="left" onclick = "location='altas.php'"><i class="large mdi-action-add-shopping-cart"></i></a></li>
                <li><a class="btn-floating tooltipped purple" data-tooltip="Edición" data-position="left" onclick = "location='edicion.php'"><i class="large mdi-editor-mode-edit"></i></a></li>
                <li><a class="btn-floating tooltipped grey" data-tooltip="Catalogo de Cortes" data-position="left" onclick = "location='catalogo_cortes.php'"><i class="large mdi-editor-insert-chart"></i></a></li>
                <li><a class="btn-floating tooltipped brown" data-tooltip="Catalogo General" data-position="left" onclick = "location='catalogos.php'"><i class="large mdi-action-description" ></i></a></li>
                <li><a class="btn-floating tooltipped red" data-tooltip="Cerrar Sesión" data-position="left" onclick = "location='logout.php'"><i class="mdi-navigation-cancel" ></i></a></li>

              </ul>
            </div>
           boton que servira para acceso de tareas rapidas
          </div>
        </div>-->

            <div id="ModalAcerca" class="modal">
              <div class="modal-content">
                <h4 class="center">Contacto</h4>
                <p></p>
                <br><br>
                <a class="webicon facebook large"></a>
                <a class="webicon twitter large" href="#"></a>
                <a class="webicon googleplus large" href="#"></a>
                <a class="webicon youtube large" href="#"></a>
                <a class="webicon mail large" href="#"></a>
              </div>
              <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
            <!-- Modal DE NOTIFICACIONES -->

            <div id="ModalNotificacion" class="modal">
              <div class="modal-content">
                <h5 id="notificacion" class="center">Notificaciones</h5>
                <h6 id = "tituloFalta" class="center"><br><br>No tienes ninguna notificacion</h5>
                <div class="container">
                  <div class="">
                    <div class="col l6 s6" id = "faltaEn">
                    
                    </div>
                  </div>
                </div>
              </div>

            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
              </div>
            </div>



        <!--Modal para acceder en la pagina de nuevo_usuario.php la cual esa restringida-->
            <div id="login" class="modal">
              <div class="modal-content">
                <h3 class = "center-align">Contraseña</h3>
                <form class = "col s12" id="acceso_usuario_nuevo" autocomplete="off">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-communication-vpn-key prefix"></i>
                      <input id="user" name = "password" type="password" class="validate" autofocus required>
                      <label for="user">Contraseña</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 center">
                      <button class="btn blue waves-light" >Entrar
                        <i class="mdi-content-send right"></i>
                      </button>
                        <button class="btn waves-effect waves-light red" type="reset" onclick = "Materialize.toast('Borrando', 750)" name="action">Borrar
                        <i class="mdi-content-undo right"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

        <!-- Modal Aviso-->
          <div id="aviso" class="modal">
            <div class="modal-content center">
                <i class="mdi-action-visibility large"></i><h5 class="black-text">Aviso</h5>
                <p>Antes de dar de alta un producto, verificar si esta dado de alta su provedor, de caso contrario dar primero de alta el provedor y despues el producto.
                  Usuarios administrativos tienen acceso total a todas las paginas.</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
            </div>
          </div>

        <!-- Modal funciones-->
          <div id="funciones" class="modal">
            <div class="modal-content center">
                <i class="mdi-action-settings large"></i><h5 class="black-text">Funciones de la pagina</h5>
                <p>Corte de caja <br> Altas <br> Ingresos <br> Edicion</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
            </div>
          </div>

          <!-- Modal catalogos-->
          <div id="catalogos" class="modal">
            <div class="modal-content center">
                <i class="mdi-action-book large"></i><h5 class="black-text">Catalogos Disponibles</h5>
                <p>Catalogo General <br> Catalogo de Cortes</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
            </div>
          </div>





         <!-- main -->
      </main>
    <!-- footer-->
    <!--<footer class="page-footer blue">

          <div class="footer-copyright">
            <div class="container">
            © 2015 Daft Admin
            <a class="grey-text text-lighten-4 right" href="#!">2015</a>
            </div>
          </div>
        </footer>-->
    <footer class="page-footer blue darken-2">
      <div class="container">

        <div class="row">
          <div class="col l4 s12">
            <div class="center"><i class="mdi-action-visibility btn2 disabled blue darken-2 large"></i><ul><li><a class="white-tex" href="#!" onclick="abrirAviso()"><h5 class="white-text">Aviso</h5></a></li></ul></div>

          </div>

          <div class="col l4 s12">
            <div class="center"><i class="mdi-action-settings btn2 disabled blue darken-2 large"></i><ul><li><a class="white-tex" href="#!" onclick="abrirFunciones()"><h5 class="white-text">Funciones</h5></a></li></ul></div>
          </div>

          <div class="col l4 s12">
            <div class="center"><i class="mdi-action-book btn2 disabled blue darken-2 large"></i><ul><li><a class="white-tex" href="#!" onclick="abrirCatalogos()"><h5 class="white-text">Catalogos</h5></a></li></ul></div>
          </div>
        </div>
        
      </div>
      
      <div class="footer-copyright">
        <div class="container">
        Copyright © 2015 | Joel Nahim & Luis Enrique
        <a class="grey-text text-lighten-4 right" href="https://www.facebook.com/Poliuva" target="_blank">&nbsp;&nbsp;Like</a>
        <a class="grey-text text-lighten-4 right" href="https://www.facebook.com/Poliuva" target="_blank"><img src="../images/facebook.svg" alt="facebook" id="fb"></a>
        </div>
      </div>
    </footer>
      <!-- end footer-->

      <script type="text/javascript">
      //tiempo de espera para mostrar los botones de menu
      setTimeout(function(){
                                                              //block muestra es directo del csss
          document.getElementById('acciones').style.display = 'block';
                                                                      // none oculta, es del css
          document.getElementById('circulo_cargando').style.display = 'none';
          document.getElementById('mostrar').style.display = 'none';
         

      }   ,1000);
      // el 1000 son los milisegundos que se espera para mostrar los botoenes
      //funcion que muestra los botones de abajo
      function mostrar(){

          document.getElementById('acciones').style.display = 'block';
          document.getElementById('circulo_cargando').style.display = 'none';
          document.getElementById('mostrar').style.display = 'none';
         

      }          

      </script>

      <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script src="../js/sweetalert.min.js"></script>

      <!--parallax-->
      <script type="text/javascript">
        $(document).ready(function(){
          $('.parallax').parallax();
           // Show sideNav
          $('.button-collapse').sideNav();
          $('.modal-trigger').leanModal();
        });


       
      </script>
      

      <script>   


      function acceso(){
          swal(
          {   
            title: "Acceso nuevo usuario",   
            text: "Contraseña",   
            type: "input", 
            inputType: "password",  
            showCancelButton: true,   
            closeOnConfirm: false,   
            animation: "slide-from-top",   
            inputPlaceholder: "Introduzca contraseña" 
          },
          function(inputValue){
            $.ajax({
                   type: "POST",
                   url: "acceso_alta_usuario.php",
                   data: "password="+inputValue, // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {
                      if(data == "Si"){

                        setTimeout(function(){
                          $(window).attr('location', 'nuevo_usuario.php');
                        }, 100);
                      }
                      
                      else if (data != "Si"){
                        swal.showInputError(data);     


                      }

                   }

                 });

            return false; // Evitar ejecutar el submit del formulario.
         }
        );

      }
        </script>


      <script>
      $(document).ready( function() 
   {
      $.ajax({
          type: "POST",
          url: "verificar_stock.php",
          data: "verificar=Si", // Adjuntar los campos del formulario enviado.
          success: function(data)
          {
            //correcto!
            if(data != ""){

              Materialize.toast("<i class='mdi-alert-warning'></i>&nbsp;Algunos productos estan por agotarse", 5000, 'rounded');
          
              //Materialize.toast(data, 5000, 'rounded');
              $("#tituloFalta").html("<br>");
              $("#notificacion").html("<img id='imgAlerta' src='../images/Alerta1.svg' alt='Aviso' /><br><br />Algunos productos estan por agotarse");
              $("#faltaEn").html(data);
              
              $('#button_show').removeClass('mdi-action-info-outline').addClass('notification-small');


            }            
          }

          });
   });
       
      </script>
      <script type="text/javascript">
        function abrirModal(){
         $('#login').openModal();
        }
        function abrirNotificacion(){
          $('#ModalNotificacion').openModal();
        }
        function abrirAcerca(){
          $('#ModalAcerca').openModal();
        }
        function abrirCambiarImagen(){
          $('#ModalImagen').openModal();
        }
        function abrirAviso(){
          $('#aviso').openModal();
        }
        function abrirFunciones(){
          $('#funciones').openModal();
        }
        function abrirCatalogos(){
          $('#catalogos').openModal();
        }
      </script>
      <script>
        // Modernizr with SVG detection required. http://modernizr.com
        ;window.Modernizr=function(a,b,c){
          function B(a){j.cssText=a
          }
          function C(a,b){
            return B(m.join(a+";")+(b||""))
          }
          function D(a,b){
            return typeof a===b
          }
          function E(a,b){
            return!!~(""+a).indexOf(b)
          }
          function F(a,b){
            for(var d in a)if(j[a[d]]!==c)return b=="pfx"?a[d]:!0;
              return!1
          }
        function G(a,b,d){
          for(var e in a){
            var f=b[a[e]];
            if(f!==c)
              return d===!1?a[e]:D(f,"function")?f.bind(d||b):f
          }
          return!1
        }
        function H(a,b,c){var d=a.charAt(0).toUpperCase()+a.substr(1),e=(a+" "+o.join(d+" ")+d).split(" ");return D(b,"string")||D(b,"undefined")?F(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),G(e,b,c))}var d="2.5.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={svg:"http://www.w3.org/2000/svg"},r={},s={},t={},u=[],v=u.slice,w,x=function(a,c,d,e){var f,i,j,k=b.createElement("div"),l=b.body,m=l?l:b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),k.appendChild(j);return f=["&#173;","<style>",a,"</style>"].join(""),k.id=h,m.innerHTML+=f,m.appendChild(k),l||(m.style.background="",g.appendChild(m)),i=c(k,a),l?k.parentNode.removeChild(k):m.parentNode.removeChild(m),!!i},y=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b).matches;var d;return x("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},z={}.hasOwnProperty,A;!D(z,"undefined")&&!D(z.call,"undefined")?A=function(a,b){return z.call(a,b)}:A=function(a,b){return b in a&&D(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=v.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(v.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(v.call(arguments)))};return e});var I=function(c,d){var f=c.join(""),g=d.length;x(f,function(c,d){var f=b.styleSheets[b.styleSheets.length-1],h=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"",i=c.childNodes,j={};while(g--)j[i[g].id]=i[g];e.touch="ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch||(j.touch&&j.touch.offsetTop)===9},g,d)}([,["@media (",m.join("touch-enabled),("),h,")","{#touch{top:9px;position:absolute}}"].join("")],[,"touch"]);r.touch=function(){return e.touch},r.rgba=function(){return B("background-color:rgba(150,255,150,.5)"),E(j.backgroundColor,"rgba")},r.backgroundsize=function(){return H("backgroundSize")},r.borderradius=function(){return H("borderRadius")},r.textshadow=function(){return b.createElement("div").style.textShadow===""},r.opacity=function(){return C("opacity:.55"),/^0.55$/.test(j.opacity)},r.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return B((a+"-webkit- ".split(" ").join(b+a)+m.join(c+a)).slice(0,-a.length)),E(j.backgroundImage,"gradient")},r.csstransitions=function(){return H("transition")},r.svg=function(){return!!b.createElementNS&&!!b.createElementNS(q.svg,"svg").createSVGRect},r.inlinesvg=function(){var a=b.createElement("div");return a.innerHTML="<svg/>",(a.firstChild&&a.firstChild.namespaceURI)==q.svg};for(var J in r)A(r,J)&&(w=J.toLowerCase(),e[w]=r[J](),u.push((e[w]?"":"no-")+w));return B(""),i=k=null,function(a,b){function g(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function h(){var a=k.elements;return typeof a=="string"?a.split(" "):a}function i(a){var b={},c=a.createElement,e=a.createDocumentFragment,f=e();a.createElement=function(a){var e=(b[a]||(b[a]=c(a))).cloneNode();return k.shivMethods&&e.canHaveChildren&&!d.test(a)?f.appendChild(e):e},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+h().join().replace(/\w+/g,function(a){return b[a]=c(a),f.createElement(a),'c("'+a+'")'})+");return n}")(k,f)}function j(a){var b;return a.documentShived?a:(k.shivCSS&&!e&&(b=!!g(a,"article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio{display:none}canvas,video{display:inline-block;*display:inline;*zoom:1}[hidden]{display:none}audio[controls]{display:inline-block;*display:inline;*zoom:1}mark{background:#FF0;color:#000}")),f||(b=!i(a)),b&&(a.documentShived=b),a)}var c=a.html5||{},d=/^<|^(?:button|form|map|select|textarea)$/i,e,f;(function(){var a=b.createElement("a");a.innerHTML="<xyz></xyz>",e="hidden"in a,f=a.childNodes.length==1||function(){try{b.createElement("a")}catch(a){return!0}var c=b.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()})();var k={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:j};a.html5=k,j(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.mq=y,e.testProp=function(a){return F([a])},e.testAllProps=H,e.testStyles=x,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+u.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return o.call(a)=="[object Function]"}function e(a){return typeof a=="string"}function f(){}function g(a){return!a||a=="loaded"||a=="complete"||a=="uninitialized"}function h(){var a=p.shift();q=1,a?a.t?m(function(){(a.t=="c"?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){a!="img"&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l={},o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};y[c]===1&&(r=1,y[c]=[],l=b.createElement(a)),a=="object"?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),a!="img"&&(r||y[c]===2?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i(b=="c"?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),p.length==1&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&o.call(a.opera)=="[object Opera]",l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return o.call(a)=="[object Array]"},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,i){var j=b(a),l=j.autoCallback;j.url.split(".").pop().split("?").shift(),j.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]||h),j.instead?j.instead(a,e,f,g,i):(y[j.url]?j.noexec=!0:y[j.url]=1,f.load(j.url,j.forceCSS||!j.forceJS&&"css"==j.url.split(".").pop().split("?").shift()?"c":c,j.noexec,j.attrs,j.timeout),(d(e)||d(l))&&f.load(function(){k(),e&&e(j.origUrl,i,g),l&&l(j.origUrl,i,g),y[j.url]=2})))}function i(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var j,l,m=this.yepnope.loader;if(e(a))g(a,0,m,0);else if(w(a))for(j=0;j<a.length;j++)l=a[j],e(l)?g(l,0,m,0):w(l)?B(l):Object(l)===l&&i(l,m);else Object(a)===a&&i(a,m)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,b.readyState==null&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
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