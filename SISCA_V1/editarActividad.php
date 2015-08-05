<?php

session_start();
include("modulos/conexion/conexion.php");



if ($_SESSION['id_usuario'] == ""){

  header ("Location: login.php");

  }

$idMateria = $_REQUEST['idMateria'];
$idActividad = $_REQUEST['idActividad'];


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
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

        

          <!-- Alerts STYLES-->

    <script src="assets/sweetalert/dist/sweetalert.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
        


<!-- Optional theme 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">-->

        



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
                                    Nueva actividad
                                </h1>
                          </div>
                        </div>
                    </td>
                  </tr>
              </table>  












<a href="actividades.php?idMateria=<?= $idMateria ?>" style="position: absolute;margin-left: 0.3333333%;width:190px;" class="btn btn-default"><span class="glyphicon glyphicon-step-backward"></span>Regresar</a> <br><br><br> 
          <div style="margin-left:0.4444444444%">  
            <div class="row">
               
             <?php 
             //para ver que valor tiene el ultimo id
              $ssql="SELECT * FROM tb_actividad ORDER BY idact DESC LIMIT 1";
              $result=$mysqli->query($ssql);
              $row=mysqli_fetch_array($result);
              $idUltimo=$row["idact"];
              $idUltimo ++;


              //comienza para buscar las unidades disponibles de esa materia
              $sql2="SELECT * FROM tb_temaunidad tu INNER JOIN tb_unidades un ON (tu.tb_unidades_id_unidad = un.id_unidad) 
              INNER JOIN tb_materias ma ON (ma.id_materia = tu.tb_materias_id_materia AND tu.tb_materias_id_materia = $idMateria) 
              ORDER BY id_temaU ASC";

              $q2=$mysqli->query($sql2);


              //recuperar los datos de esa espeficica actividad para mostrarlos
              $sql3="SELECT * FROM tb_actividad act 
              INNER JOIN tb_competencias com ON (com.id_competencia = act.tb_competencias_id_competencia) 
              INNER JOIN tb_temaUnidad tu ON (tu.id_temaU = act.tb_temaUnidad_id_temaU) 
              INNER JOIN tb_materias mate ON (mate.id_materia = act.tb_temaUnidad_tb_materias_id_materia) 
              WHERE idact=$idActividad";

              $result=$mysqli->query($sql3);
              $row=mysqli_fetch_array($result);
              $idActividadr=$row["idact"];
              $nombreActividadr=$row["nom_actividad"];
              $idunidadr = $row["id_temaU"];
              $nomUnidadr=$row["nom_temaU"];

              $idCompetenciar=$row["id_competencia"];
              $nomCompetenciar=$row["nom_competencia"];

            ?>



              <br>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Clave unica de la actividad:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" value="<?= $idActividadr ?>" disabled>
                </div>
              </div>

              <br><br>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre de la actividad:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="nombreActividad" value="<?= $nombreActividadr ?>" placeholder="Nombre de la unidad">
                </div>
              </div>
              <br><br>


              <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Unidad:</label>
              <div class="col-sm-3">

                <select class="form-control" name="evidencia" id="unidad">

                  <option value="<?= $idunidadr ?>"><?= $nomUnidadr ?></option>
                  <?php
                    while($datos=$q2->fetch_assoc()){
                        $id_temaU=$datos["id_temaU"];
                        $nom_temaU=$datos["nom_temaU"];
                    ?>
                  <option value="<?= $id_temaU ?>"><?= $nom_temaU ?></option>
                  <?php } ?>
                </select>

              </div>
              </div>
              <br><br>

              <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Tipo de evidencia:</label>
              <div class="col-sm-3">
                <select class="form-control" name="evidencia" id="evidencia">
                  <option value="<?= $idCompetenciar ?>"><?= $nomCompetenciar ?></option>
                  <option value="1">Evidencia de producto</option>
                  <option value="2">Evidencia de desempeño</option>
                  <option value="3">Evidencia de conocimiento</option>
                  <option value="4">Evidencia de actitud</option>
                </select>
              </div>
              </div>
              <br><br>



              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" id="guardarActividad" class="btn btn-default" data-loading-text="Guardando...">Editar actividad</button>
                 
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

    <script src="js/jquery-1.11.2.min.js"></script>

    

<?php include("view/footer/footer.php"); ?>

   

<script>
  jQuery(document).ready(function() {   
  $( "#guardarActividad" ).click(function() {
    
    
    $.post("modulos/guardarActividadEditada.php",{idMateria:'<?= $idMateria ?>', idActividad:'<?= $idActividad ?>', nombreActividad:$('#nombreActividad').val(), evidencia:$('#evidencia').val(), unidad:$('#unidad').val()},function(html){
          console.log(html);          
          var dato = String (html);
          if (dato == 'ok') {
            alert("Guardado");
            //window.location="materia.php?idMateria=<?= $idMateria?>";

          } else {
            alert("Hay un error");
            
          }
      });

      });
  
  });
</script>
   
   
 
</body>
</html>
