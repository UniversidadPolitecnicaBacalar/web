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
      <link rel="stylesheet" href="../css/style.css">
      
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    </head>

    <body>
      <header>
        <nav class = "top-nav">

          <div class = "nav-wrapper  blue darken-2">


            <a href="#" class = "brand-logo center"><i class = "mdi-content-add-circle"></i></a>

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

            <ul id="nav-mobile">
            
              <li><a href = "<?php echo $_SESSION['acceso'];?>.php"><i class = "mdi-navigation-arrow-back"></i></a></li>
              
            </ul>

          </div>
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
            <div class = "card-panel ">
              <span class = "black-text">
                <h2 class="header center">Ingreso</h2>
              </span>
            </div>
          </div>
        </div>


        <div class="container">
                    <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="ingresoTablaBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>
          <table id = "tablaIngreso" class = "responsive-table bordered hoverable centered ">
            <thead>
              <tr>
                  
                  <th data-field="Inventario"><i class="mdi-content-archive"></i>Inventario</th>
                  <th data-field="Nombre"><i class="mdi-communication-forum">Nombre</th>

                  <th data-field="Marca"><i class="mdi-image-style"></i>Marca</th>
                  <th data-field="Elaboracion"><i class="mdi-editor-wrap-text"></i>Elaboracion</th>
                  <th data-field="Costo"><i class="mdi-editor-attach-money"></i>Costo</th>

                  <th data-field="Precio"><i class="mdi-editor-attach-money"></i>Precio</th>
                  <th data-field="Ingresar producto"><i class="mdi-editor-vertical-align-center"></i>Ingresar/Reducir</th>
                  
              </tr>
            </thead>

            <tbody>

              <?php
              //lenado de tabla
              include("conexion.php");
              $consulta = mysql_query("SELECT * FROM `productos` ORDER BY Id_producto ASC") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla');history.back();</script>");
              while($pro = mysql_fetch_array($consulta)){
                $stock = $pro['stock'];
                $producto = $pro['descripcion'];
                echo '<tr>
                    <td>'.$stock.'</td>
                    <td>'.$producto.'</td>
                    <td>'.$pro['marca'].'</td>
                    <td>'.$pro['elaboracion'].'</td>
                    <td>'.$pro['costo'].'</td>
                    <td>'.$pro['precio'].'</td>
                    <td><a onclick="ingresar(\''.$pro['Id_producto'].'\',\''.$stock.'\',\''.$producto.'\')" 
                    class="btn-floating btn-large waves-effect waves-light grey">
                    <i class = "mdi-action-thumbs-up-down"></i></a></td>
                  </tr>';
 
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

            <?php if($_SESSION['acceso'] == "Administrativo"){?>



            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                   <!-- menu de tareas rapidas, se repite en todas las demas paginas -->
                <li><a class="btn-floating tooltipped grey" data-tooltip="Top Vendidos" data-position="left" onclick = "location='vendidos.php'"><i class="large mdi-action-trending-up"></i></a></li>
                <li><a class="btn-floating tooltipped blue" data-tooltip="Corte de caja" data-position="left" onclick = "location='corte.php'"><i class="large mdi-action-assignment-turned-in"></i></a></li>
                <li><a class="btn-floating tooltipped yellow darken-1" data-tooltip="Altas" data-position="left" onclick = "location='altas.php'"><i class="large mdi-action-add-shopping-cart"></i></a></li>
                <li><a class="btn-floating tooltipped purple" data-tooltip="Edición" data-position="left" onclick = "location='edicion.php'"><i class="large mdi-editor-mode-edit"></i></a></li>
                <li><a class="btn-floating tooltipped grey" data-tooltip="Catalogo de Cortes" data-position="left" onclick = "location='catalogo_cortes.php'"><i class="large mdi-editor-insert-chart"></i></a></li>
                <li><a class="btn-floating tooltipped brown" data-tooltip="Catalogo General" data-position="left" onclick = "location='catalogos.php'"><i class="large mdi-action-description" ></i></a></li>

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
                <li><a class="btn-floating tooltipped brown" data-tooltip="Catalogo General" data-position="left" onclick = "location='catalogos.php'"><i class="large mdi-action-description" ></i></a></li>

              </ul>
            </div>
            <?php }?>


      </main>
    <!-- footer-->
    <footer class="page-footer blue">

          <div class="footer-copyright">
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
      <script src="../js/sweetalert.min.js"></script>

      <script type="text/javascript">
        function abrirCambiarImagen(){
          $('#ModalImagen').openModal();
        }
      </script>

      <!--parallax-->
      <script type="text/javascript">
      $(document).ready(function() 
          { 
              $("#tablaIngreso").tablesorter(); 
          } 
      ); 
        $(document).ready(function(){
          $('.parallax').parallax();
        });
      </script>
      <!--modal-->

    </body>

     <script>
      $(document).ready(function(){
        // ingresoTablaBuscar es el id agregada a la barra de busqueda
        $("#ingresoTablaBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#tablaIngreso tbody>tr").hide();
            $("#tablaIngreso td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          /*else
          {
            // When there is no input or clean again, show everything back
            $("#tablaIngreso tbody>tr").show();
          }*/
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
    function ingresar(id, stock, producto){
        swal(
          {   
            title: "Ingresar/Reducir",   
            text: "¿Cuantas unidades va a ingresar de "+producto+"?",   
            type: "input",   
            inputType: "number",
            showCancelButton: true,   
            closeOnConfirm: false,   
            animation: "slide-from-top",   
            inputPlaceholder: "Introduzca cantidad" 
          }, 
          function(inputValue){
            var x = parseInt(inputValue);
            var y = parseInt(stock);

            if(inputValue != false && ((x + y) >= 0))
              {
                 $.ajax({
                   type: "POST",
                   url: "ingreso_producto.php",
                   data: "id="+id+"&cuantos="+x, // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {
                        
                     
                      
                        swal(
                          {   
                            title: "Ingresar/Reducir",   
                            text: data,   
                            type: "success",  
                            timer: 2000,   
                            showConfirmButton: false

                          });

                        setTimeout(function(){
                          $(window).attr('location', 'ingreso.php');
                        }, 2000);

                      

                   }

                 });

            return false; // Evitar ejecutar el submit del formulario.
         


              }

            if (inputValue === false)
              { 
              return false      
              }
            if(((x + y) < 0)){

              swal.showInputError("No se puede tener numeros negativos en stock");     
                return false 

            }
            if (inputValue === "") 
              {     
                swal.showInputError("Debe introducir valores numericos");     
                return false   
              }
            if (inputValue == 0) 
              {     
                swal.showInputError("Debe introducir numeros diferentes a cero");     
                return false   
              }
               
            });
    }
    </script>









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