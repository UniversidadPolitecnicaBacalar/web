<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo') {

    
  if (isset($_GET['who'])    && !empty($_GET['who'])     &&
      isset($_GET['id'])     && !empty($_GET['id'])){



  include("conexion.php");


  $who = $_GET['who'];
  $id = $_GET['id'];


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
              
            <a href="#" class = "brand-logo center"><i class = "mdi-editor-mode-edit"></i></a>
            

             <ul class="right"><!-- Menu Cuenta de usuario -->
                <li><a class="dropdown-button tooltipped" data-tooltip="Cuenta" data-position="bottom" data-activates="dropdown1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']?>&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                <ul id='dropdown1' class='dropdown-content large'>
                  <!--<li><a onclick="">Cambiar Imagen</a></li>-->
                  <li><a onclick="location='modificar_usuario.php'">Modificar Cuenta</a></li>
                  <li><a onclick = "location='logout.php'">Cerrar Sesión</a></li>
                </ul>
            </ul>
            <ul id="nav-mobile">
            
              <li><a href = "edicion.php"><i class = "mdi-navigation-arrow-back"></i></a></li>
              
            </ul>
          </div>
        
 
        </nav>

      </header>    
  <!-- main -->
      <main>

  <?php


  if($who == 'Producto'){




          $consulta = mysql_query("SELECT * FROM productos WHERE id_producto='$id'", $con) or die ("<script type='text/javascript'>alert('Problemas en traer datos del producto');history.back();</script>");
    

            $pro = mysql_fetch_array($consulta);



        ?>


        <div class="section white">
          <div class="row container">
            <div class = "card-panel ">
              <span class = "black-text">
                <h2 class="header center"><?php echo $pro['descripcion'];?></h2>
              </span>
            </div>
          </div>
        </div>

        <div class="section white">
          <div class="row container">
            <ul class="collapsible popout" data-collapsible="accordion">
              <li>
                <div class="collapsible-header active">
                  <i class="mdi-maps-local-restaurant"></i>
                  Producto
                </div>
                <div class="collapsible-body">
                  <p>


                    <div class = "container">
                      <!--form producto-->
                      <div class="row">
                        <form class="col s12" id="formulario_producto" autocomplete="off">

                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="edicion" value="Producto">
  
                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-action-add-shopping-cart prefix"></i>
                              <input id="icon_prefix" name="stock" value="<?php echo $pro['stock']; ?>" type="number" min = "0" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Stock</label>
                            </div> 
                            <div class="input-field col s6">
                              <i class="mdi-maps-local-restaurant prefix"></i>
                              <input id="icon_prefix" name="nombre" value="<?php echo $pro['descripcion']; ?>" type="text" class="validate" required>
                              <label for="icon_prefix">Nombre</label>
                            </div>                            
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <?php 
                                if($pro['elaboracion'] == 'Interno'){
                                  echo "<select name = 'elaboracion' required>
                                          <option value='Interno' selected>Interno</option>
                                          <option value='Externo'>Externo</option>
                                        </select>";
                                } 
                                else if ($pro['elaboracion'] == 'Externo'){
                                  echo "<select name = 'elaboracion' required>
                                          <option value='Interno'>Interno</option>
                                          <option value='Externo' selected>Externo</option>
                                        </select>";
                                }
                              ?>
                              
                            </div>
                            <div class="input-field col s6">
                              
                                <?php 
                                  if($pro['tipo'] == 'Alimento'){
                                    echo "<select name = 'tipo' required>
                                            <option value='Alimento' selected>Alimento</option>
                                            <option value='Bebida'>Bebida</option>
                                            <option value='Golosina'>Golosina</option>
                                          </select>";
                                  } 
                                  else if ($pro['tipo'] == 'Bebida'){
                                    echo "<select name = 'tipo' required>
                                            <option value='Alimento'>Alimento</option>
                                            <option value='Bebida' selected>Bebida</option>
                                            <option value='Golosina'>Golosina</option>
                                          </select>";
                                  }
                                  else if ($pro['tipo'] == 'Golosina'){
                                    echo "<select name = 'tipo' required>
                                            <option value='Alimento'>Alimento</option>
                                            <option value='Bebida'>Bebida</option>
                                            <option value='Golosina' selected>Golosina</option>
                                          </select>";
                                  }
                                ?>
                                
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-action-loyalty prefix"></i>
                              <input id="icon_prefix" name="marca" value="<?php echo $pro['marca']; ?>" type="text" class="validate" required>
                              <label for="icon_prefix">Marca</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-action-add-shopping-cart prefix"></i>
                              <input name = "cantidad" value="<?php echo $pro['cantidad']; ?>" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Cantidad</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "costo" value="<?php echo $pro['costo']; ?>" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Costo</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "precio" value="<?php echo $pro['precio']; ?>" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Precio al publico</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s12">
                              <select name = "provedor" class ="browser-default" required>




                                <?php

                                $idProvedorOriginal = $pro['Id_provedor'];
                                



                                $consulta = mysql_query("SELECT * FROM provedores WHERE Id_provedor = '$idProvedorOriginal'", $con)or die("<script type='text/javascript'>alert('Problemas en consultar provedores');history.back();</script>");
                                $consulta2 = mysql_query("SELECT * FROM provedores", $con)or die("<script type='text/javascript'>alert('Problemas en consultar provedores');history.back();</script>");
                                $nombre = mysql_fetch_assoc($consulta);

                                $nombreProvedorOriginal = $nombre["nombre"];
                                echo '<option value ="'.$idProvedorOriginal.'" selected>'.$nombreProvedorOriginal.'</option>';

                                while($prov = mysql_fetch_array($consulta2)){

                                  echo '<option value ="'.$prov['Id_provedor'].'">'.$prov['nombre'].'</option>';
                     
                                }



                                ?>
                              </select>
                            </div>
                          </div>


                          <div class = "container center">
                            <button class="waves-effect waves-light btn blue" id="boton_enviar"><i class="mdi-maps-local-restaurant left"></i>Modificar</button>
                          </div>


                        </form>
                      </div>
                      <!--form producto-->

                  </p>
                </div>
              </li>
              
              
            </ul>
          </div>
        </div>

            
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal">
                  <i class="large mdi-navigation-menu"></i>
                </a>
              <ul>
                <li><a class="btn-floating blue" href="corte.php"><i class="large mdi-action-assignment-turned-in"></i></a></li>
                <li><a class="btn-floating green" href="ingreso.php"><i class="large mdi-content-add-circle"></i></a></li>
                <li><a class="btn-floating yellow darken-1" href = "altas.php"><i class="large mdi-action-add-shopping-cart"></i></a></li>
                <li><a class="btn-floating purple" href="edicion.php"><i class="large mdi-editor-mode-edit"></i></a></li>
                <li><a class="btn-floating grey" href = "catalogo_cortes.php"><i class="large mdi-editor-insert-chart"></i></a></li>
                <li><a class="btn-floating brown" href = "catalogos.php"><i class="large mdi-action-description"></i></a></li>
              </ul>
            </div>

            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" onclick = "location='administrativo.php'" data-tooltip="Menu administrativo" data-position="left">
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



           
         <!-- main -->
      </main>





  

  <?php  
  }
  //cierra el if de producto




  else if ($who == 'Cliente'){
     $consulta = mysql_query("SELECT * FROM clientes WHERE Id_cliente ='$id'", $con) or die ("<script type='text/javascript'>alert('Problemas en traer datos del cliente');history.back();</script>");
    

            $pro = mysql_fetch_array($consulta);



        ?>


        <div class="section white">
          <div class="row container">
            <div class = "card-panel ">
              <span class = "black-text">
                <h2 class="header center"><?php echo $pro['nombre'];?></h2>
              </span>
            </div>
          </div>
        </div>

        <div class="section white">
          <div class="row container">
            <ul class="collapsible popout" data-collapsible="accordion">
              <li>
                <div class="collapsible-header active">
                  <i class="mdi-social-person-add"></i>
                  
                  Cliente
                </div>
                <div class="collapsible-body">
                  <p>


                    <div class = "container">
                      <!--form producto-->
                      <div class="row">
                        <form class="col s12" id="formulario_cliente" autocomplete="off">

                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="edicion" value="Cliente">
  
                           <div class="row">
                            
                            <div class="input-field col s6">
                              <i class="mdi-social-person prefix"></i>
                              <input id="icon_prefix" name="nombre" type="text" pattern="^[a-zA-Z][a-zA-Z\s]*$" value="<?php echo $pro['nombre']; ?>" class="validate" required>
                              <label for="icon_prefix">Nombre</label>
                            </div> 
                            <div class="input-field col s6">
                              <i class="mdi-communication-call prefix"></i>
                              <input id="icon_prefix" maxlength = "10" name="numero" type="tel" class="validate" value="<?php echo $pro['numero']; ?>" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero</label>
                            </div>

                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "rfc" maxlegnth = "13" id="icon_prefix" type="text" value="<?php echo $pro['rfc']; ?>" class="validate" required>
                              <label for="icon_prefix">RFC</label>
                            </div>

                            <div class="input-field col s6">
                              <select class = "browser-default" name = "estado" required>
                                <option value ="<?php echo $pro['estado']; ?>"><?php echo $pro['estado']; ?></option>
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
                              <i class="mdi-action-store prefix"></i>
                              <input name = "direccion" id="icon_prefix" type="text" value="<?php echo $pro['direccion']; ?>" class="validate" required>
                              <label for="icon_prefix">Direccion</label>
                            </div>

                            <div class="input-field col s6">
                              <i class="mdi-action-add-shopping-cart prefix"></i>
                              <input name = "colonia" id="icon_prefix" type="text" value="<?php echo $pro['colonia']; ?>" class="validate" required>
                              <label for="icon_prefix">Colonia</label>
                            </div>
                          </div>


                          <div class="row">
                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "noExterno" min = "0" id="icon_prefix" type="number" value="<?php echo $pro['noExt']; ?>" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero Externo</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "ccp" min = "0" id="icon_prefix" type="number" class="validate" value="<?php echo $pro['ccp']; ?>" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Codigo Postal</label>
                            </div>
                            
                          </div>
                          <br>


                          <div class = "container center">
                            <button class="waves-effect waves-light btn blue" id="boton_cliente"><i class="mdi-social-person-add left"></i>Modificar</button>
                          </div>


                        </form>
                      </div>
                      <!--form cliente-->

                  </p>
                </div>
              </li>
              
              
            </ul>
          </div>
        </div>


        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
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

            




           
         <!-- main -->
      </main>





  
  <?php  
  }
  //cierra el if de cliente




  else if ($who == 'Provedor'){
     $consulta = mysql_query("SELECT * FROM provedores WHERE Id_provedor ='$id'", $con) or die ("<script type='text/javascript'>alert('Problemas en traer datos del provedor');history.back();</script>");
    

            $pro = mysql_fetch_array($consulta);



        ?>


        <div class="section white">
          <div class="row container">
            <div class = "card-panel ">
              <span class = "black-text">
                <h2 class="header center"><?php echo $pro['nombre'];?></h2>
              </span>
            </div>
          </div>
        </div>

        <div class="section white">
          <div class="row container">
            <ul class="collapsible popout" data-collapsible="accordion">
              <li>
                <div class="collapsible-header active">
                  <i class="mdi-social-person-add"></i>
                  Provedor
                </div>
                <div class="collapsible-body">
                  <p>


                    <div class = "container">
                      <!--form provedor-->
                      <div class="row">
                        <form class="col s12" id = "formulario_provedor" autocomplete="off">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="edicion" value="Provedor">

                          <div class="row">
                            
                            <div class="input-field col s12">
                              <i class="mdi-social-person prefix"></i>
                              <input id="icon_prefix" value="<?php echo $pro['nombre']; ?>" name="nombre" type="text" class="validate" required>
                              <label for="icon_prefix">Nombre</label>
                            </div> 
                           

                          </div>


                          <div class="row">
                            
                            <div class="input-field col s6">
                              <i class="mdi-social-person prefix"></i>
                              <input id="icon_prefix" value="<?php echo $pro['correo']; ?>" name="correo" type="text" class="validate" required>
                              <label for="icon_prefix">Correo</label>
                            </div> 
                            <div class="input-field col s6">
                              <i class="mdi-communication-call prefix"></i>
                              <input id="icon_prefix" value="<?php echo $pro['numero']; ?>" name="numero" type="tel" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero</label>
                            </div>

                          </div>


                          <div class="row">

                            <div class="input-field col s6">
                              <i class="mdi-action-store prefix"></i>
                              <input name = "rfc" value="<?php echo $pro['rfc']; ?>" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">RFC</label>
                            </div>
               
                            <div class="input-field col s6">
                              <select class = "browser-default" name = "estado" required>
                                <option value="<?php echo $pro['estado']; ?>" selected><?php echo $pro['estado']; ?></option>
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
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "ciudad" value="<?php echo $pro['ciudad']; ?>" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Ciudad</label>
                            </div>

                            

                            <div class="input-field col s6">
                              <i class="mdi-action-add-shopping-cart prefix"></i>
                              <input name = "direccion" value="<?php echo $pro['direccion']; ?>" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Direccion</label>
                            </div>
                          </div>


                          <div class="row">

                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "colonia" value="<?php echo $pro['colonia']; ?>" min = "0" id="icon_prefix" type="text" class="validate" required>
                              <label for="icon_prefix">Colonia</label>
                            </div>



                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "noExterno" value="<?php echo $pro['noExt']; ?>" min = "0" id="icon_prefix" type="number" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Numero Externo</label>
                            </div>
                            
                            
                          </div>



                          <div class="row">

                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "ccp" value="<?php echo $pro['ccp']; ?>" min = "0" id="icon_prefix" type="text" class="validate" onkeypress="return justNumbers(event);" required>
                              <label for="icon_prefix">Codigo postal</label>
                            </div>



                            <div class="input-field col s6">
                              <i class="mdi-editor-attach-money prefix"></i>
                              <input name = "fechaEntrega" value="<?php echo $pro['fechaEntrega']; ?>" id="icon_prefix" type="date" onkeypress="return justNumbers(event);" required>
                              <!--<label for="icon_prefix">Fecha entrega</label>-->
                            </div>
                            
                            
                          </div>


                          <br>


                          <div class = "container center">
                            <button class="waves-effect waves-light btn blue" id="boton_provedor"><i class="mdi-social-person-add left"></i>Modificar</button>
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
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large teal tooltipped" onclick = "location='administrativo.php'" data-tooltip="Menu administrativo" data-position="left">
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





  
  <?php  
  }
  //cierre del if cliente
  ?>

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


       <script>   
        $(function(){
         $("#boton_enviar").click(function(){
         var url = "modificar_valores.php"; // El script a dónde se realizará la petición.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formulario_producto").serialize(), // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {

                      if(data == "Datos del producto modificados correctamente"){
                        swal({   title: "Modificar producto",   text: data,   type: "success", timer: 2000,   showConfirmButton: false});
                        setTimeout(function(){
                          $(window).attr('location', 'edicion.php');
                        }, 2000);
                      }
                      else if(data == "Falta algun dato del producto por llenar"){
                        swal({   title: "Modificar producto",   text: data,   type: "info",   confirmButtonText: "Ok!" });
                      }
                      else{
                        swal({   title: "Modificar producto",   text: data,   type: "error",   confirmButtonText: "Ok!" });

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
         var url = "modificar_valores.php"; // El script a dónde se realizará la petición.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formulario_cliente").serialize(), // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {

                      if(data == "Datos del cliente modificados correctamente"){
                        swal({   title: "Modificar cliente",   text: data,   type: "success", timer: 2000,   showConfirmButton: false});
                        setTimeout(function(){
                          $(window).attr('location', 'edicion.php');
                        }, 2000);
                      }
                      else if(data == "Falta algun dato del cliente por llenar"){
                        swal({   title: "Modificar cliente",   text: data,   type: "info",   confirmButtonText: "Ok!" });
                      }
                      else{
                        swal({   title: "Modificar cliente",   text: data,   type: "error",   confirmButtonText: "Ok!" });

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
         var url = "modificar_valores.php"; // El script a dónde se realizará la petición.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formulario_provedor").serialize(), // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {

                      if(data == "Datos del provedor modificados correctamente"){
                        swal({   title: "Modificar provedor",   text: data,   type: "success", timer: 2000,   showConfirmButton: false});
                        setTimeout(function(){
                          $(window).attr('location', 'edicion.php');
                        }, 2000);
                      }
                      else if(data == "Falta algun dato del provedor por llenar"){
                        swal({   title: "Modificar provedor",   text: data,   type: "info",   confirmButtonText: "Ok!" });
                      }
                      else{
                        swal({   title: "Modificar provedor",   text: data,   type: "error",   confirmButtonText: "Ok!" });

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