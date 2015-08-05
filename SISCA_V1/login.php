<?php 

session_start();

if (!empty($_SESSION['id_usuario'])){

	header ("Location: index.php");

	}

?>





<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>SISCA LOGIN</title>

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">



        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->



   
        
        <link href="css/style.css" rel="stylesheet">
        
        
        <script src="assets/sweetalert/dist/sweetalert.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">

    </head>

    <body>

        <!--[if lt IE 7]>

            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

        <![endif]-->



        <!-- Add your site or application content here -->

        

            <section id="home" class="panel">            

                <div id="parallax1" class="parallaxParent animated fadeIn">

                    <div class="bg home">

                    	<div class="content w">

                            <div class="animated fadeIn delay-4">

                                <div class="login-card">

                                    <h1>Acceso</h1><br>

                                  <form id="frmLogin">

                                    <input type="text" id="txtUser" placeholder="Username" required>

                                    <input type="password" id="txtPwd" placeholder="Password" required>

                                    <input type="submit" id="submit" name="login" class="login login-submit" value="Entrar">

                                  </form>

                                    

                                  <div class="login-help">

                                    <a href="#">Registrarme</a> • <a href="#">Olvide mi contraseña</a>

                                  </div>

                                </div>

                            </div>

                        </div>                 

                    </div> 

                </div>

            </section>

                

          
        

        

        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script src="js/jquery-1.11.2.min.js"></script>

           



        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

        <script>

			$(document).ready(function() {

				

				$("#submit").click(function(event)

		{ event.preventDefault();

				$.post("modulos/login_verif.php",{txtUser:$('#txtUser').val(), txtPwd:$('#txtPwd').val()},function(html){

					

					console.log(html);

					switch (String (html))

					{

					case "1":location.href="index.php";

					break;

					case "0": swal({   
									title: "Datos incorrectos!",  
									text: "Verifica tus datos",   
									type: "error",   
									confirmButtonText: "Volver a intentar" 
								});

					break;

					

				       }		

			     });

			});

		});

	</script>



      

        <script src="js/plugins.js"></script>

        <script src="js/main.js"></script>

        <script type="text/javascript"></script>

      

    </body>

</html>
