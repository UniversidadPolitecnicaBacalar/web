<?php

session_start();
include("modulos/conexion/conexion.php");



if ($_SESSION['id_usuario'] == ""){

  header ("Location: login.php");

  }

$idMateria = $_REQUEST['idMateria'];
$idUnidad = $_REQUEST['idUnidad'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SISCA</title>


  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

        

          <!-- Alerts STYLES-->

    <script src="assets/sweetalert/dist/sweetalert.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
        


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

<?php include("view/header/navbar.php"); ?>








<div align="center">
        <table width="92%">
          <tr>
            <td>

 <table class="table table-bordered">
                  <tr class="info">
                    <td>
                      <div class="row-fluid">
                          <div class="span6">
                              <h1 class="text-info">
                                    <img src="img/alumno.png" width="80" height="80">
                                    Editar Unidad
                                </h1>
                          </div>
                        </div>
                    </td>
                  </tr>
              </table>  












<a href="materia.php?idMateria=<?= $idMateria ?>" style="position: absolute;margin-left: 0.3333333%;width:190px;" class="btn btn-default"><span class="glyphicon glyphicon-step-backward"></span>Regresar</a> <br><br><br> 
          <div style="margin-left:0.4444444444%">  
            <div class="row">
               
            <?php 
              $ssql="SELECT * FROM tb_temaunidad WHERE id_temaU= $idUnidad AND tb_materias_id_materia=$idMateria";
              $result=$mysqli->query($ssql);
              $row=mysqli_fetch_array($result);
              $nomUnidad=$row["nom_temaU"];

            ?>






            
              <br>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Clave unica de la unidad:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" value="<?= $idUnidad ?>" disabled>
                </div>
              </div>

              <br><br>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre de la unidad:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="nombreUnidad" value="<?= $nomUnidad ?>" placeholder="Nombre de la unidad">
                </div>
              </div>
              <br><br>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" id="guardarMateria" class="btn btn-default" data-loading-text="Guardando...">Guardar cambios</button>
                 
                </div>
              </div>
             










               
   
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
         </div>
     <!-- /. WRAPPER  -->
     </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS 
    <script src="assets/js/jquery-1.10.2.js"></script>-->

    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script src="js/jquery-1.11.2.min.js"></script>
    

<?php include("view/footer/footer.php"); ?>

   

<script>
  jQuery(document).ready(function() {   
  $( "#guardarMateria" ).click(function() {
    
    
    $.post("modulos/guardarUnidadEditada.php",{idMateria:'<?= $idMateria ?>',idUnidad:'<?= $idUnidad ?>', nombreUnidad:$('#nombreUnidad').val()},function(html){
          console.log(html);          
          var dato = String (html);
          if (dato == 'ok') {
            alert("Guardado");
            window.location="materia.php?idMateria=<?= $idMateria?>";

          } else {
            alert("Hay un error");
            
          }
      });

      });
  
  });
</script>
   
   
 
</body>
</html>
