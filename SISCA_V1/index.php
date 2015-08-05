<?php

session_start();



if ($_SESSION['id_usuario'] == ""){

	header ("Location: login.php");

	}

	

	$idUser = $_SESSION['id_usuario'];

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
        <table width="91.33333%">
          <tr>
            <td>

 <table class="table table-bordered">
                  <tr class="info">
                    <td>
                    	<div class="row-fluid">
                       	  <div class="span6">
                            	<h2 class="text-info">
                                    <img src="img/alumno.png" width="80" height="80">
                                    Materias
                                </h2>
                          </div>
                        </div>
                    </td>
                  </tr>
              </table>	













               <!--<a href ="nuevaMateria.php" style="margin-left: 88.3333333%;width: 9.33333333%; " class="btn btn-default">Nueva materia <span class="glyphicon glyphicon-plus"></span></a><br><br>-->

          <div style="margin-left:0.4444444444%">  
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             MATERIAS 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                             






                            <?php



                                    include("modulos/conexion/conexion.php");

                                    $sql="SELECT * FROM tb_maestros_has_tb_materias mama INNER JOIN tb_maestros mae ON (mama.tb_maestros_id_maestro= mae.id_maestro AND mae.id_maestro=$idUser) INNER JOIN tb_materias mate ON (mate.id_materia = mama.tb_materias_id_materia) INNER JOIN tb_carreras car ON (car.id_carrera = mama.carrera) INNER JOIN tb_grupos gru ON (mama.grupo = gru.id_grupo) INNER JOIN tb_turno tur ON (tur.id_turno = mama.turno) order by id ASC";

                                    $q=$mysqli->query($sql);

                                    

                            

                                    ?>

                                        

                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                                                        <thead>

                                                                        <tr>

                                                                            <th>Clave</th>

                                                                            

                                                                            <th>Materia</th>
                                                                            <th>Carrera</th>
                                                                            

                                                                            <th>Aula</th>

                                                                            

                                                                            <th>Turno</th>
                                                                            <th>Grupo</th>
                                                                            <th>Cuatrimestre</th>
                                                                            <th>Acciones</th>

                                                                            

                                                                          

                                                                        </tr>

                                                                    </thead>

                                                                    <tbody>









                                    <?php

                                    

                                    while($datos=$q->fetch_assoc()){

                                        $id=$datos["id"];
										                    $id_materia=$datos["tb_materias_id_materia"];
                                        $nomMateria=$datos["nom_materia"];                                        
                                        $nomCarrera=$datos["nom_carrera"]; 
                                        $aula=$datos["aula"];

                                        $turno=$datos["nom_turno"];

                                        $grupo=$datos["nom_grupo"];
                                        
                                        $cuatrimestre=$datos["cuatrimestre"];
                                        

                                        //$id_usu=$datos["id_usuario"];

                                    ?>

                                                                <tr class="even gradeC" id="entradaCell-<?php echo $id; ?>">

                                                                    <td ALIGN=CENTER class="center"><?php echo $id_materia;?></td>
                                                                    <td ALIGN=CENTER class="center"><?php echo $nomMateria;?></td>
                                                                    <td ALIGN=CENTER class="center"><?php echo $nomCarrera;?></td>
                                                                    <td ALIGN=CENTER class="center"><?php echo $aula;?></td>
                                                                    <td ALIGN=CENTER class="center"><?php echo $turno;?></td>
                                                                    <td ALIGN=CENTER class="center"><?php echo $grupo;?></td>
                                                                    <td ALIGN=CENTER class="center"><?php echo $cuatrimestre;?></td>

                                                                    

                                                                    <td ALIGN=CENTER class="center">

                                                                      <a href="materia.php?idMateria=<?php echo $id_materia;?>"><i class="glyphicon glyphicon-eye-open"></i></a>              

                                                                       <!--<a href="#" id="<?php echo $id;?>" class="borrarEntrada"><i class="glyphicon glyphicon-trash"></i></a>-->



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
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
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
    

<?php include("view/footer/footer.php"); ?>

   

<script>
	jQuery(document).ready(function() {   
	$( ".borrarEntrada" ).click(function() {
		
		
	  if (confirm("Eliminar ?") == true) {
		  
		   var idEntrada = $(this).attr("id");
	   $.ajax({
			   type: "POST",
			   url: "controll/eliminarEntrada.php",
			   data: "id="+idEntrada,
			   success: function(data){
				if(data="1")
				
				 alert('Eliminado');
			   },
			   error: function(data){
			    alert('Error !');
				console.log(data);
			   }
	
			   
	 
			 }).complete(function(){
			  
			   $('#entradaCell-'+idEntrada).hide(500);
	
		  
		});
	
	 
			 return false;  
	 }
		  });
	
	});
</script>
   
   
 
</body>
</html>
