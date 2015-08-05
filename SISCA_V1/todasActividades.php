<?php

session_start();
include("modulos/conexion/conexion.php");



if ($_SESSION['id_usuario'] == ""){

  header ("Location: login.php");

  }

  

$idUser = $_SESSION['id_usuario'];


$idMateria = $_REQUEST['idMateria'];




$ssql="SELECT * FROM tb_materias WHERE id_materia=$idMateria";
$result=$mysqli->query($ssql);
$row=mysqli_fetch_array($result);
$nomMateria=$row["nom_materia"]; 

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
    <link href="assets/css/custom.css" rel="stylesheet" />
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
                                    Todas las actividades<br>
                                    <?php echo $nomMateria. " | Clave Materia: ".$idMateria ?>
                                    <h4 class="text-info" style="margin-left: 7.333333%;"><a href="materia.php?idMateria=<?= $idMateria?>">Administrar Unidades</a></h4>
                                </h1>
                          </div>
                        </div>
                    </td>
                  </tr>
              </table>  












<a href="actividades.php?idMateria=<?php echo $idMateria; ?>" style="position: absolute;margin-left: 0.3333333%;width:190px;" class="btn btn-default"><span class="glyphicon glyphicon-step-backward"></span>Regresar</a> <br><br><br> 
          <div style="margin-left:0.4444444444%">  
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                             






                            <?php




                                    $sql="SELECT * FROM tb_alumnos_calificacionesxactividad aact 
                                    INNER JOIN tb_alumnos al ON(aact.tb_alumno_id_alumno=al.id_alumno) 
                                    INNER JOIN tb_actividad act ON (act.idact = aact.tb_actividad_idact) 
                                    WHERE tb_temaUnidad_tb_materias_id_materia=$idMateria";

                                    $q=$mysqli->query($sql);

                                    

                            

                                    ?>

                                        

                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                                        <thead>

                                                                        <tr>

                                                                            <th>Matricula</th>

                                                                            

                                                                            <th>Alumno</th>
                                                                            <th>Clave actividad</th>
                                                                            <th>Nombre actividad</th>
                                                                            <th>Calif actividad</th>


                                                                            

                                                                          

                                                                        </tr>

                                                                    </thead>

                                                                    <tbody>









                                    <?php

                                    

                                    while($datos=$q->fetch_assoc()){

                                        $id=$datos["idAlCa"];
                                        $idActividadt=$datos["tb_actividad_idact"];
                                        $matricula=$datos["matricula_alum"];
                                        $Alumno=$datos["nombres_alum"];
                                        $Alumno.=" ".$datos["ape_pate_alum"];
                                        $Alumno.=" ".$datos["ape_mate_alum"];
                                        $calificacion=$datos["calificacion_act"];
                                        $nom_temaU=$datos["nom_actividad"];                                        


                                        //$id_usu=$datos["id_usuario"];

                                    ?>

                                                                <tr class="even gradeC" id="entradaCell-<?php echo $id; ?>">

                                                                    <td ALIGN=CENTER class="center"><?php echo $matricula;?></td>
                                                                    <td ALIGN=CENTER class="center"><?php echo $Alumno;?></td>

                                                                    
                                                                    <td ALIGN=CENTER class="center"><?php echo $idActividadt;?></td>

                                                                    <td ALIGN=CENTER class="center"><?php echo $nom_temaU;?></td>

                                                                    <td ALIGN=CENTER class="center">

                                                                      <?= $calificacion ?>

                                                                    </td>

                                                                    

                                                                    

                                                                </tr>

                                                            <?php

                                    }





                                    ?>

                                                                
                                    </tbody>
                                </table>




            </td>
          </tr>
        </table>
             
                
  </div>






                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                
               
   
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
         </div>
     <!-- /. WRAPPER  -->
     </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS 
    <script src="assets/js/jquery-1.10.2.js"></script>-->
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script src="js/jquery-1.11.2.min.js"></script>
    
<?php include("view/footer/footer.php"); ?>

   

   
   
 
</body>
</html>