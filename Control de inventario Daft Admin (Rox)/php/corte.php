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
      <link type="text/css" rel="stylesheet" href="../css/materialize.css">
      <link rel="stylesheet" href="../css/style.css">

      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
      
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    </head>

    <body>
      <header>
        <nav class = "top-nav">

          <div class = "nav-wrapper  blue darken-2">
              
           
            
            <a href="#" class = "brand-logo center"><i class = "mdi-action-assignment-turned-in"></i></a>

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
            
              <li><a href = "<?php echo $_SESSION['acceso'];?>.php" ><i class = "mdi-navigation-arrow-back"></i></a></li>
              
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
                <h2 class="header center">Corte de caja</h2>
              </span>
            </div>
          </div>
        </div>

                    <div class="container">
                      <nav>
                        <div class="nav-wrapper black lighten-2">

                            <div class="input-field">
                              <input id="corteProductosBuscar" type="search">
                              <label for="search"><i class="mdi-action-search"></i></label>
                            </div>
                        </div>
                      </nav>
                    </div>

        <div class="row">
          <div class="container">
            <table id="tablaProductos" class = "responsive-table bordered hoverable centered" name = "tabla_productos">
              <thead>
                <tr>
                    <th data-field="Vendidos"><i class="mdi-action-shop"></i>Vendidos</th>
                    
                    <th data-field="Nombre"><i class="mdi-communication-forum"></i>Nombre</th>

                    <th data-field="Marca"><i class="mdi-image-style"></i>Marca</th>

                    <th data-field="Costo"><i class="mdi-editor-attach-money"></i>Costo</th>

                    <th data-field="Precio"><i class="mdi-editor-attach-money"></i>Precio</th>

                    <th data-field="Inventario"><i class="mdi-content-archive"></i>Inventario</th>

                    <th data-field="Editar"><i class="mdi-content-create"></i>Editar</th>

                    
                </tr>
              </thead>

              <tbody>

                <?php
                include("conexion.php");
                $consulta = mysql_query("SELECT * FROM `productos` WHERE stock > 0 ORDER BY descripcion ASC") or die ("<script type='text/javascript'>alert('Problemas en llenar tabla');window.location='administrativo.php';</script>");
                while($pro = mysql_fetch_array($consulta)){
                  $id     = $pro['Id_producto'];
                  $nombre = $pro['descripcion'];
                  $marca  = $pro['marca'];
                  $costo  = $pro['costo'];
                  $precio = $pro['precio'];
                  $stock  = $pro['stock'];


                  echo '<tr>
                      <td>
                      


                      <input type = "number" min = "0" id = "'.$id.'" onkeypress="return justNumbers(event);">


                      </td>
                      <td>'.$nombre.'</td>
                      <td>'.$marca.'</td>
                      <td>'.$costo.'</td>
                      <td>'.$precio.'</td>
                      <td>'.$stock.'</td>
                      <td><a onclick = "corte(\''.$id.'\',\''.$nombre.'\',\''.$marca.'\',\''.$costo.'\',\''.$precio.'\','.$stock.')" class="btn-floating btn-large waves-effect waves-light green"><i class = "mdi-content-add"></i></a></td>
                    </tr>';
   
                }
                ?>
              </tbody>
            </table>


          </div>
        </div>




        <div class="row center" id = "corte" style = "display:none;">
          <div class="section white">
            <div class="row container">
              <div class = "card-panel">
                  <form method = "POST" id = "corteGenera" name = "corteGenera" action = "corte_pdf.php">
                    <table id = "corteProductos" class = "responsive-table bordered hoverable centered ">
                      <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Costo</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Eliminar</th>
                        </tr>
                      </thead>
                          <tbody>

                          </tbody>
                    </table>
                  </form>
                </div>
            </div>
          </div>
          <div class = "row center" id = "botonesAcciones">
            <a class="waves-effect waves-light btn-large" id = "generar_corte" onclick = "generarCorte()"><i class="mdi-content-send right"></i>Generar Corte</a>
            <!--<a class="waves-effect waves-light btn-large red" id = "borrar_ultimo" onclick ="borrarUltimo()"><i class="mdi-action-delete right"></i>Borrar ultimo</a>-->
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

            <?php if($_SESSION['acceso'] == "Administrativo"){?>



            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                   <!-- menu de tareas rapidas, se repite en todas las demas paginas -->
                <li><a class="btn-floating tooltipped grey" data-tooltip="Top Vendidos" data-position="left" onclick = "location='vendidos.php'"><i class="large mdi-action-trending-up"></i></a></li>
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>
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
                <li><a class="btn-floating tooltipped green" data-tooltip="Ingresos" data-position="left" onclick = "location='ingreso.php'"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating tooltipped brown" data-tooltip="Catalogo General" data-position="left" onclick = "location='catalogos.php'"><i class="large mdi-action-description" ></i></a></li>

              </ul>
            </div>
            <?php }?>
       

            




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
      <script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
      <script src="../js/sweetalert.min.js"></script>

      <script type="text/javascript">
        function abrirCambiarImagen(){
          $('#ModalImagen').openModal();
        }

      </script>
      <script type="text/javascript">
      function corte(id, nombre, marca, costo, precio, stock){

        //variable x agarra lo que tiene el input
        
        var x = $("#"+id).val();

        //condiciones

        if(x== null || x == 0){
          swal({   
            title: "Corte de caja",   
            text: "Ingrese un valor mayor a cero",
            type: "error",   
            confirmButtonText: "Ok!" 
          });

        }
        if (x > stock) {


          swal({   
            title: "Corte de caja",   
            text: "No se puede poner valores mayores a lo que hay en inventario",
            type: "error",   
            confirmButtonText: "Ok!" 
          });


        }




        //si hay algo
        else if(x!= null && x != 0){
          //si el producto es menor o igual a lo que hay en el inventario
          if(x <= stock){

            //aparece la tabla de corte y los botones

            if(document.getElementById('corte').style.display == 'none'){
              document.getElementById('corte').style.display = 'block';
              document.getElementById('botonesAcciones').style.display = 'block'
            }


            if(document.getElementById('corte').style.display == 'block'){




              //crea un identificador para cada tabla
              var idP = id + "P";

              //<td><div class="input-field col s12"><input class = "validate" type="number" id = '+idP+' min = "0" onkeypress="return justNumbers(event);" /></div></td>
              //ingresa la nuevla fila
              $('#corteProductos').last().append(
              '<tr><td><input type="hidden" type="number" id="stocks" name="stocks[]" value="'+x+'"/>'+x+'</td><td><input type="hidden" type="text" id="productos" name="productos[]" value="'+id+'"/>'+nombre+'</td><td>'+marca+'</td><td>'+costo+'</td><td>'+precio+'</td><td>'+stock+'</td><td><a class="btn-floating btn-large waves-effect waves-light red elimina" onclick = "borrarEste(\''+idP+'\')"><i class = "mdi-action-delete"></i></a></td></tr>');
              //$("#"+idP).val(x);
              //pone el valor de la tabla principal a nulo
              $("#"+id).val('');
              //oculta e input
              $("#"+id).parents("tr").hide();





            }





          }






        }






          

      }

      function justNumbers(e)
      {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
      } 

      function borrarEste(idP){


     
    
        

        //funcion que borra esa fila
        $("a.elimina").click(function(){
        
                        $(this).parents("tr").remove();

                        var id = idP.replace("P","");



                        $("#"+id).parents("tr").show();


                        if($("#corteProductos > tbody > tr").length == 0){


                          document.getElementById('corte').style.display = 'none';


                        }

                });




        
      }


      /*function borrarUltimo(){
          if($("#corte_productos > tbody > tr").length > 0){

            $("#corte_productos > tbody > tr:last").remove();


          }

          if($("#corte_productos > tbody > tr").length == 0){


            document.getElementById('corte').style.display = 'none';


          }
      } */



      function generarCorte(){

          swal({   
            title: "Corte de caja",   
            text: "Se generara el corte de caja\n¿Desea continua?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si",   
            cancelButtonText: "No",   
            closeOnConfirm: false,   
            closeOnCancel: true 
          }, 
          function(isConfirm){   
            if (isConfirm) 
              {     
                setTimeout(function(){
                  $("form#corteGenera").submit();
                }, 10);
              } 
              else
              {

              }
              
              });



      }

      </script>

      


      <script type="text/javascript">

      $(document).ready(function() 
          { 
              $("#tablaProductos").tablesorter(); 
          } 
      ); 
      $(document).ready(function() 
          { 
              $("#corteProductos").tablesorter(); 
          } 
      ); 

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
      //verificar esto!
      //hacer que no aparezca el producto que este en la tabla de abajo
      $(document).ready(function(){
        // Write on keyup event of keyword input element
        $("#corteProductosBuscar").keyup(function(){
          // When value of the input is not blank
          if( $(this).val() != "")
          {
            // Show only matching TR, hide rest of them
            $("#tablaProductos tbody>tr").hide();
            $("#tablaProductos td:contains-ci('" + $(this).val() + "')").parent("tr").show();
          }
          else
          {
            // When there is no input or clean again, show everything back
            $("#tablaProductos tbody>tr").show();
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