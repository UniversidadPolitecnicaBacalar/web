<!DOCTYPE html>
  <html>
    <head>

      <meta charset="UTF-8">
       <title>IMSS</title>
       <link rel="stylesheet"  href="static/css/diseño.css"/>
       <script type="text/javascript" src="windows/jquery/jquery-2.1.4.min.js"></script>
       <link rel="icon" type="image/png" href="static/imagenes/imss1.png"/>
    </head>
    <body>
      <?php
        session_start();

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

        } 
        else{
          header('Location: login.html');
          exit;
        }
          
          ?>

    <script >
      function cargar(div, desde){
        $(div).load(desde)
      }


    </script>
    <div id="wrapper">
      <header>
        <div id="titulo1">
          <h1>Seguridad y Solidaridad Social</h1>
        </div>
        <?php  echo "<d id='hola'>Bienvenido! " . $_SESSION['username']; ?>
        <img id="logo" src="static/imagenes/imss.png">
      </header>
    
      <div id="menu">

        <ul id="submenu">
          <li><a id="menuAltas" href="#" onclick="cargar('#contenedor','windows/altas.php');">Altas</a></li>
          <li><a id="consultas" href="#" onclick="cargar('#contenedor','windows/consulta.php')">Consulta y Modifiacion </a></li>
          <li><a id="consultas" href="#" onclick="cargar('#contenedor','windows/grafica/grafica.php')">Grafica </a></li>
          <li><a id="usuarios" href="#" >Usuarios</a>
            <ul>
              <li><a id="consultas" href="#" onclick="cargar('#contenedor','windows/registrar.html')">-Registro</a></li>
              <li><a id="consultas" href="#" onclick="cargar('#contenedor','windows/editarUsuario.php')">-Actualizar</a></li>
              <li><a id="consultas" href="#" onclick="cargar('#contenedor','windows/eliminar.php')">-Eliminar</a></li>
            </ul>
           </li>
          <li><a id="consultas" href="cerrarSesion.php" >Salir</a></li>
        </ul>
      </div>
      <div id="contenedor">
        <section>

        <img id="logo2" src="static/imagenes/imss.png">

        </section>
      </div>

      <div id="contenidoAbajo">

      <footer >
      <p>Derechos Reservados by Diego AND Brayan</p>
      
      </footer>
      </div>
      </div>
    
    </body>

  </html>