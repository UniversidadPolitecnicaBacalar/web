<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {
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
       <script src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>

        
        <script src="../js/highcharts.js"></script>
        <script src="../js/modules/data.js"></script>
        <script src="../js/modules/exporting.js"></script>
     
        <script type="text/javascript">
$(function () {
    $("#graficaVendidos").highcharts({
        data: {
            table: "totalVendidosTabla"
        },
        chart: {
            type: "column"
        },
        title: {
            text: "Vendidos"
        },
        yAxis: {
            allowDecimals: true,
            title: {
                text: "Pesos"
            }
        },
        tooltip: {
            formatter: function () {
                return "<b>" + this.series.name + "</b><br/>" +
                    this.point.y + " " + this.point.name.toLowerCase();
            }
        }
    });
});
        </script>
    </head>

    <body>
      <header>
        <nav class = "top-nav">

          <div class = "nav-wrapper  blue darken-2">
              
            <a href="#" class = "brand-logo center"><i class = "mdi-action-trending-up"></i></a>
            
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
                <h2 class="header center">Vendidos</h2>
              </span>
            </div>
          </div>
        </div>
        <div class="container">

          <blockquote>Total/Cantidad Vendidos</blockquote>

          <table class = "hoverable striped responsive-table"id = "totalVendidosTabla">
            <thead>
              <tr>
                <th>
                  Producto
                </th>

                <th>
                  Cantidades Vendidas
                </th>
                
                <th>
                  Total Vendido (Pesos)
                </th>
              </tr>
            </thead>



          <?php
          $tablaCuerpo = "<tbody>";


          include("conexion.php");



          $vendidos = mysql_query("SELECT descripcion, sum(cantidadVendidos), sum(totalVendidos) FROM vendidos v INNER JOIN productos p ON (v.Id_producto=p.Id_producto) GROUP BY p.descripcion",$con);

          

          $nombres = array();
          $cantidades = array();
          $precios = array();
          //productos
          while($arrayVendidos = mysql_fetch_array($vendidos)){

            $nombres[] = $arrayVendidos['descripcion'];
            $cantidades[] = $arrayVendidos[1];
            $precios[] = $arrayVendidos[2];

            
          }

          for($x = 0; $x < count($nombres); $x++) {
            $tablaCuerpo .= "<tr><th>".$nombres[$x]."</th><td>".$cantidades[$x]."</td><td>".$precios[$x]."</td></tr>";

          }

          #$tablaCuerpo .= "<tr><th>".$n."</th>";
          #$tablaCuerpo .= "<td>".$cantidad."</td>";
          #$tablaCuerpo .= "<td>".$precio."</td></tr>";


          $tablaCuerpo .= "</tbody></table>";

          print $tablaCuerpo;

          ?>

          </table>
          <section>

          <div id="graficaVendidos" style="min-width: 310px; height: 400px; margin: 0 auto">
            
          </div>
        </section>



          
        </div>


          
                  

            
            <?php if($_SESSION['acceso'] == "Administrativo"){?>



            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" data-tooltip="Menu administrativo" data-position="left">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                   <!-- menu de tareas rapidas, se repite en todas las demas paginas -->
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