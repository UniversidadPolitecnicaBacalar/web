<?php

//se inicia sesion
session_start();
//checa si se escribio algo en el correo
if (isset($_POST['correo']) && !empty($_POST['correo'])){

    $host = "localhost";

    $user = "root";

    $password = "";

    $database = "login";

    $con = mysql_connect($host,$user,$password) or die ("<script type='text/javascript'>alert('Problemas al conectar al servidor');</script>");

    mysql_select_db($database,$con) or die ("<script type='text/javascript'>alert('Problemas al conectar a la based de datos');</script>");

            //agarra la variable  de la pagina anterior
            $correoRecuperar = $_POST['correo'];
            //seguridad del correo para que no sea inyeccion sql

            $correo = mysql_real_escape_string($_POST['correo']);
            $correoUsuario = trim($correo);
            //consulta para traer los valores
            $sql = mysql_query("SELECT * FROM usuarios u INNER JOIN empleados e ON (u.Id_empleado=e.Id_empleado) WHERE correo = '$correoRecuperar'",$con);
            if(mysql_num_rows($sql)) {
                $row = mysql_fetch_assoc($sql);
                $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
                $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
                $username = $row['username'];
                $user_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
                $user_clave2 = md5($user_clave); // encriptamos la nueva contraseña para guardarla en la BD
                $user_email = $row['correo'];
                // actualizamos los datos (contraseña) del usuario que solicitó su contraseña
                mysql_query("UPDATE usuarios SET password='".$user_clave2."' WHERE username='".$username."'");
                // Enviamos por email la nueva contraseña
                $remite_nombre = "Daft Admin"; // Tu nombre o el de tu página
                $remite_email = "joel.nahim.rivera.perez@gmail.com"; // tu correo
                $asunto = "Recuperación de contraseña"; // Asunto (se puede cambiar)
                $mensaje = "Se ha generado una nueva contraseña para el usuario <strong>".$username."</strong>. La nueva contraseña es: <strong>".$user_clave."</strong>.";
                $cabeceras = "From: ".$remite_nombre." <".$remite_email.">\r\n";
                $cabeceras = $cabeceras."Mime-Version: 1.0\n";
                $cabeceras = $cabeceras."Content-Type: text/html";
                $enviar_email = mail($user_email,$asunto,$mensaje,$cabeceras);
                if($enviar_email) {
                    echo "<script type='text/javascript'>alert('La nueva contraseña ha sido enviada al email asociado al usuario ".$username.".');history.back();</script>";
                }else {
                    echo "<script type='text/javascript'>alert('No se ha podido enviar el email de recuperacion');history.back();</script>";
                }
            }else {
                echo "<script type='text/javascript'>alert('No existe ningun usuario asociado al correo ingresado');history.back();</script>";
            }
    }
    else {

        echo "<script type='text/javascript'>alert('Favor de ingresar un correo electronico');history.back();</script>";

    }
?> 