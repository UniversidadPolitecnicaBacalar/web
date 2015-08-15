<?php
session_start();

include("../conexion/conexionMysql.php");
Crear_Conexion();

   $nombre = $_REQUEST["nombre"];
   $apellidoMaterno=$_REQUEST["apellidoMaterno"];
   $apellidoPaterno=$_REQUEST["apellidoPaterno"];
   $tipo=$_REQUEST["activarFormulario"];
   $caja=(INT)$_REQUEST["caja"];  
   $nss=$_REQUEST["noseguroSocial"];
   $calidad=$_REQUEST["calidad"];
   $empleado=(INT)$_SESSION['id_usuario'];
   $fecha=$_REQUEST["fecha"];
   $regimen=$_REQUEST["regimen"];
   $umf=(INT)$_REQUEST["UMF"]; 
   $especialidad=(INT)$_REQUEST["especialidad"];
   $fecha_hoy=date("Y-m-d");
   $agregado=$calidad.$fecha.$regimen;

   // Hay campos en blanco
         $busquedacaja=mysql_query("SELECT * FROM depuracion WHERE id_caja='$caja'");
       
         $cajas = mysql_num_rows($busquedacaja);
         if($cajas>=1){

         }
         else{
            $nombre_caja="Caja #".$caja;
            $insertarCaja=mysql_query("INSERT INTO depuracion(id_caja,nombre_caja) VALUES($caja,'$nombre_caja')")or die(mysql_error());
         }
         $buscar= substr($calidad, 0,1);     

         switch (true) {
            case ($buscar=='1'|| $buscar== '2' ||$buscar=='5'):

               $buscarCoincidencia= mysql_query("SELECT * FROM paciente WHERE nss= '$nss' AND SUBSTRING(agregado, 1, 2)='$calidad'");


               $username_exist = mysql_num_rows($buscarCoincidencia);
               
               

               if($username_exist>=1){
                  echo("Ya existe paciente con ese tipo de agregado");
               }


               else{
                     $paciente=mysql_query("INSERT INTO paciente(nss,agregado,nom_paciente,apellido_paterno,apellido_materno,fecha,id_empleado,id_estado,id_area,id_caja,id_umf)
                     VALUES('$nss','$agregado','$nombre','$apellidoPaterno','$apellidoMaterno','$fecha_hoy',$empleado,$tipo,$especialidad,$caja,$umf)") or die(mysql_error());
                     echo("Paciente regitrado");

               }
               break;
            case ($buscar=='3'):
                   $paciente=mysql_query("INSERT INTO paciente(nss,agregado,nom_paciente,apellido_paterno,apellido_materno,fecha,id_empleado,id_estado,id_area,id_caja,id_umf)
                     VALUES('$nss','$agregado','$nombre','$apellidoPaterno','$apellidoMaterno','$fecha_hoy',$empleado,$tipo,$especialidad,$caja,$umf)") or die(mysql_error());
                     echo("Paciente regitrado");
                  break;
            case ($buscar=='4'):
               
               if($calidad== "4F"){
               $buscarCoincidencia= mysql_query("SELECT * from paciente WHERE SUBSTRING(agregado, 1, 2)='$calidad' AND nss= '$nss'");
               $username_exist= mysql_num_rows($buscarCoincidencia);
                  if($username_exist>=1){
                     echo("Ya");
                  }
                  else{
                     $paciente=mysql_query("INSERT INTO paciente(nss,agregado,nom_paciente,apellido_paterno,apellido_materno,fecha,id_empleado,id_estado,id_area,id_caja,id_umf)
                     VALUES('$nss','$agregado','$nombre','$apellidoPaterno','$apellidoMaterno','$fecha_hoy',$empleado,$tipo,$especialidad,$caja,$umf)") or die(mysql_error());
                     echo("Paciente regitrado");
                  }

               }
               if($calidad== "4M"){
                  $buscarCoincidencia= mysql_query("SELECT * from paciente WHERE SUBSTRING(agregado, 1,2)='$calidad 'AND nss= '$nss'");
                  $username_exist= mysql_num_rows($buscarCoincidencia);
                  if($username_exist>=1){
                     echo("Ya");
                  }
                  else{
                     $paciente=mysql_query("INSERT INTO paciente(nss,agregado,nom_paciente,apellido_paterno,apellido_materno,fecha,id_empleado,id_estado,id_area,id_caja,id_umf)
                     VALUES('$nss','$agregado','$nombre','$apellidoPaterno','$apellidoMaterno','$fecha_hoy',$empleado,$tipo,$especialidad,$caja,$umf)") or die(mysql_error());
                     echo("Paciente regitrado");
                  }
               }
                  break;
              
               }


      
   
     
  

?>