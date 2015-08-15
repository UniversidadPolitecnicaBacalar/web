<head>
     
       <link rel="icon" type="image/png" href="../../static/imagenes/imss1.png"/>

       <script src="../jquery/jquery-1.9.1.min.js"></script>
</head>
<?php
session_start();

include("../conexion/conexionMysql.php");
Crear_Conexion();
  $nss1=$_SESSION['nss'];
  $agregado1=$_SESSION['agregado'];
  $calidad1=substr($agregado1, 0,2);
  $nombre1=$_SESSION['nombre'];
   $nombre = $_REQUEST["nombre"];
   $apellidoMaterno=$_REQUEST["apellidoMaterno"];
   $apellidoPaterno=$_REQUEST["apellidoPaterno"];
   $tipo=(INT)$_REQUEST["activarFormulario"];
   $caja=(INT)$_REQUEST["caja"];  
   $nss=$_REQUEST["nss"];
   $empleado=(INT)$_SESSION['id_usuario'];
   $calidad=$_REQUEST['calidad'];
   $fecha=$_REQUEST['fecha'];
   $regimen=$_REQUEST['regimen'];
   $agregado=$calidad.$fecha.$regimen;
   $umf=(INT)$_REQUEST["UMF"]; 
   $especialidad=(INT)$_REQUEST["especialidad"];
      $busquedacaja=mysql_query("SELECT * FROM depuracion WHERE id_caja='$caja'");
       
         $cajas = mysql_num_rows($busquedacaja);
         if($cajas>=1){

         }
         else{
            $nombre_caja="Caja #".$caja;
            $insertarCaja=mysql_query("INSERT INTO depuracion(id_caja,nombre_caja) VALUES($caja,'$nombre_caja')")or die(mysql_error());
         }
      if($calidad1==$calidad){
           $actualizar= mysql_query("UPDATE paciente SET nss= '$nss',agregado='$agregado', nom_paciente='$nombre', apellido_paterno='$apellidoPaterno',apellido_materno = '$apellidoMaterno', id_estado=$tipo,id_area=$especialidad,id_caja=$caja,id_umf=$umf 
          WHERE nss='$nss1' and agregado='$agregado1' and nom_paciente='$nombre1'")or die(mysql_error());
           ?><script type="text/javascript">alert("Actualizado"); window.location.href='../../index.php';</script><?php
      }
      else if($calidad1!=$calidad){
        $buscar= substr($calidad, 0,1);    

         switch (true) {
            case ($buscar=='1'|| $buscar== '2' ||$buscar=='5'):

               $buscarCoincidencia2= mysql_query("SELECT * FROM paciente WHERE nss= '$nss1' AND SUBSTRING(agregado, 1, 1)='$buscar'");

               $username_exist = mysql_num_rows($buscarCoincidencia2);
               if($username_exist>=1){
                 ?><script type="text/javascript">alert("Error no se puede actualizar ya exite uno1"); window.location.href='../../index.php';</script><?php
               }


               else{
                     $actualizar= mysql_query("UPDATE paciente SET nss= '$nss',agregado='$agregado', nom_paciente='$nombre', apellido_paterno='$apellidoPaterno',apellido_materno = '$apellidoMaterno', id_estado=$tipo,id_area=$especialidad,id_caja=$caja,id_umf=$umf 
                      WHERE nss='$nss1' and agregado='$agregado1' and nom_paciente='$nombre1'")or die(mysql_error());
                     ?><script type="text/javascript">alert("Actualizado"); window.location.href='../../index.php';</script><?php
               }
               break;
            
            case ($buscar=='3'||$buscar== '6'):
               
                     $actualizar= mysql_query("UPDATE paciente SET nss= '$nss',agregado='$agregado', nom_paciente='$nombre', apellido_paterno='$apellidoPaterno',apellido_materno = '$apellidoMaterno', id_estado=$tipo,id_area=$especialidad,id_caja=$caja,id_umf=$umf 
                      WHERE nss='$nss1' and agregado='$agregado1' and nom_paciente='$nombre1'")or die(mysql_error());
                     ?><script type="text/javascript">alert("Actualizado"); window.location.href='../../index.php';</script><?php
               
                  break;
            case ($buscar=='4'):
               
               if($calidad== "4M"){
                  $buscarCoincidencia= mysql_query("SELECT * from paciente WHERE SUBSTRING(agregado, 1,2)='$calidad 'AND nss= '$nss'");
                  $username_exist= mysql_num_rows($buscarCoincidencia);
                  if($username_exist>=1){
                     ?><script type="text/javascript">alert("Error no se puede actualizar ya exite uno 4m"); window.location.href='../../index.php';</script><?php
                  }
                  else{
                     $actualizar= mysql_query("UPDATE paciente SET nss= '$nss',agregado='$agregado', nom_paciente='$nombre', apellido_paterno='$apellidoPaterno',apellido_materno = '$apellidoMaterno', id_estado=$tipo,id_area=$especialidad,id_caja=$caja,id_umf=$umf 
                      WHERE nss='$nss1' and agregado='$agregado1' and nom_paciente='$nombre1'")or die(mysql_error());
                     ?><script type="text/javascript">alert("Actualizado"); window.location.href='../../index.php';</script><?php
                  }
               }
               if($calidad== "4F"){
                  $buscarCoincidencia= mysql_query("SELECT * from paciente WHERE SUBSTRING(agregado, 1,2)='$calidad 'AND nss= '$nss'");
                  $username_exist= mysql_num_rows($buscarCoincidencia);
                  if($username_exist>=1){
                     ?><script type="text/javascript">alert("Error no se puede actualizar ya exite uno 4f"); window.location.href='../../index.php';</script><?php
                  }
                  else{
                     $actualizar= mysql_query("UPDATE paciente SET nss= '$nss',agregado='$agregado', nom_paciente='$nombre', apellido_paterno='$apellidoPaterno',apellido_materno = '$apellidoMaterno', id_estado=$tipo,id_area=$especialidad,id_caja=$caja,id_umf=$umf 
                      WHERE nss='$nss1' and agregado='$agregado1' and nom_paciente='$nombre1'")or die(mysql_error());
                     ?><script type="text/javascript">alert("Actualizado"); window.location.href='../../index.php';</script><?php
                  }
               }
                  break;
              
               }
      }
      
     
     

   ?>