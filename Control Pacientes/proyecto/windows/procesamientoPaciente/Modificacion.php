<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
       <title>IMSS</title>
       <link rel="stylesheet"  href="../../static/css/diseñoModificacion.css"/>
       <link rel="icon" type="image/png" href="../../static/imagenes/imss1.png"/>

       <script src="windows/jquery/jquery-1.9.1.min.js"></script>
       <script type="text/javascript">


					<!--
					function mostrarActiva(){
						//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto > y a la vez dentro del array de Conocido) esta activada
						if (document.altas.activarFormulario[1].checked == true) {
							//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
							document.getElementById('depuracion').style.display='block';
							//por el contrario, si no esta seleccionada
							} else {
								//oculta el div con id 'desdeotro'
								document.getElementById('depuracion').style.display='none';
								}
						}
						
    				function justNumbers(e){
						var keynum = window.event ? window.event.keyCode : e.which;
						if ((keynum == 8) || (keynum == 46))
							return true;
							return /\d/.test(String.fromCharCode(keynum));
						}
    					-->
					

					</script>


		
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
    <div id="wrapper">
      <header>
        <?php echo "<d id='hola'>Bienvenido! " . $_SESSION['username']; ?>
        <img id="logo" src="../../static/imagenes/imss.png">
        <h1 id="titulo">Modificacion</h1>
      </header>
    
      <div id="menu">
      <div id="contenedor">
        <section>

	
		<?php
		include("../conexion/conexionMysql.php");
		Crear_Conexion();
		$nss=($_REQUEST["dato"]);
		$agregado=($_REQUEST['agregado']);
		$buscarCoincidencia= mysql_query("SELECT * FROM paciente WHERE nss= '$nss'AND agregado='$agregado'");

		while ($row = mysql_fetch_assoc($buscarCoincidencia)) {
   				$nombre= $row['nom_paciente'];
   				$apellidoP= $row['apellido_paterno'];
   				$apellidoM= $row['apellido_materno'];
   				$estado=$row['id_estado'];
   				$area=$row['id_area'];
   				$caja=$row['id_caja'];
   				$fecha=$row['fecha'];
 			}

				$anio=(int)substr($agregado,2,4);
				$regimen=substr($agregado,6,2);
				$calidad=substr($agregado, 0,2);

    						
		$buscarEmpleado=mysql_query("SELECT nom_empleado FROM empleado INNER JOIN paciente  
			ON(empleado.id_empleado=paciente.id_empleado) WHERE paciente.nss='$nss' AND paciente.agregado='$agregado'");
		while ($row = mysql_fetch_assoc($buscarEmpleado)) {
			$nombreEmpleado=$row['nom_empleado'];
		}
		$_SESSION['nss'] = $nss;
		$_SESSION['nombre'] =$nombre;
		$_SESSION['agregado'] =$agregado;

		?>

		<div id="formulario">
				<form action="actualizarDatos.php" mothod="post" name="altas" id="altas" >
					
					<label>Fecha Ingreso</label><label class="empleado">Registrado por</label> <br><br>
					<input class="nombre1" type="text" name="fecha" value=<?php echo $fecha ?> readonly>
					<input class="nombre1" type="text" name="fecha" value=<?php echo $nombreEmpleado ?> readonly><br><br>
					<label>Nombre</label><br>
					<input class="nombre"type="text" name="nombre" value=<?php echo $nombre ?> pattern="^[a-zA-Z][a-zA-Z\s]*$" required/><br>
					
					<label>Apellido Paterno</label> <label class="secundario">Apellido Materno</label> <br>
					<input class="nombre"type="text" name="apellidoPaterno" value=<?php echo $apellidoP ?> pattern="^[a-zA-Z][a-zA-Z\s]*$"required/>
					<input  onblur="onlytext(this);" class="nombre"type="text" name="apellidoMaterno" value=<?php echo $apellidoM ?> pattern="^[a-zA-Z][a-zA-Z\s]*$"required/><br>
					<label>Tipo</label><br><br>
					<?php 
					if($estado=='1'){
						echo"<input type='radio' name='activarFormulario' value=1 checked='checked'  id='Conocido_1' onclick='mostrarActiva()'/>Activo";
					}
					else{
						echo"<input type='radio' name='activarFormulario'value=1  id='Conocido_1' onclick='mostrarActiva()'/>Activo";
					}
					if($estado=='2'){
						echo"<input  type='radio' name='activarFormulario' value=2 checked='checked' id='Conocido_0' onclick='mostrarActiva()'/>Depuracion";
					}
					else{
						echo"<input  type='radio' name='activarFormulario' value=2  id='Conocido_0' onclick='mostrarActiva()'/>Depuracion";
					}
					if($estado=='3'){
						echo"<input  type='radio' name='activarFormulario' value=3 checked='checked'  id='Conocido_0' onclick='mostrarActiva()'/>Pasivos";
					}
					else{
						echo"<input  type='radio' name='activarFormulario' value=3  id='Conocido_0' onclick='mostrarActiva()'/>Pasivos";
					}
					if($estado=='4'){
						echo"<input  type='radio' name='activarFormulario' value=4 checked='checked'id='Conocido_0' onclick='mostrarActiva()'/>Defuncion";
					}
					else{
						echo"<input  type='radio' name='activarFormulario' value=4 id='Conocido_0' onclick='mostrarActiva()'/>Defuncion";
					}
						?>
    				<br>
    				<div id="depuracion" style="display:none;">
			    		<br><label>Caja</label> <br>
			    			<input onkeypress="return justNumbers(event);" value=<?php echo $caja ?> maxlength="3"class="nombre"type="int" name="caja"  />
						<br>
					</div>
					<br>
					<label>NSS</label> <br>
					<input onkeypress="return justNumbers(event);"  maxlength="10"class="nombre"type="text" name="nss"
        			value=<?php echo $nss ?> required/>
        			<br><br><label>Agregado</label><br><br><br>
					
					<div class="calidadSelect">
    				<select class="calidad" name="regimen">
    				<?php
    				if($regimen=="OR"){
    					echo"<option selected value='OR'>OR</option>";
    					}
    				else{
    					echo"<option selected value='OR'>OR</option>";
    					}
    				if($regimen=="ES"){
    					echo"<option selected value='ES'>ES</option>";
    					}
    				else{
    					echo"<option value='ES'>ES</option>";
    					}
    				if($regimen=="EC"){
    					echo"<option selected value='EC'>EC</option>";
    					}
    				else{
    					echo"<option value='EC'>EC</option>";
    					}
    				if($regimen=="EF"){
    					echo"<option selected value='EF'>EF</option>";
    					}
    				else{
    					echo"<option value='EF'>EF</option>";
    					}

    				?>
    				</select>
    				</div>

    				<div class="calidadSelect2">
    				<select class="calidad" name="calidad">
    				<?php
    				if($calidad=="1M"){
    					echo"<option selected value='1M'>1M</option>";
    					}
    				else{
    					echo"<option value='1M'>1M</option>";
    				}
    				if($calidad=="2M"){
    					echo"<option selected value='2M'>2M</option>";
    					}
    				else{
    					echo"<option value='2M'>2M</option>";
    				}
    				if($calidad=="3M"){
    					echo"<option selected value='3M'>3M</option>";
    					}
    				else{
    					echo"<option value='3M'>3M</option>";
    				}
    				if($calidad=="4M"){
    					echo"<option selected value='4M'>4M</option>";
    					}
    				else{
    					echo"<option value='4M'>4M</option>";
    				}
    				if($calidad=="5M"){
    					echo"<option selected value='5M'>5M</option>";
    					}
    				else{
    					echo"<option value='5M'>5M</option>";
    				}
    				if($calidad=="6M"){
    					echo"<option selected value='6M'>6M</option>";
    					}
    				else{
    					echo"<option value='6M'>6M</option>";
    				}
    				if($calidad=="1F"){
    					echo"<option selected value='1F'>1F</option>";
    					}
    				else{
    					echo"<option value='1F'>1F</option>";
    				}
    				if($calidad=="2F"){
    					echo"<option selected value='2F'>2F</option>";
    					}
    				else{
    					echo"<option value='2F'>2F</option>";
    				}
    				if($calidad=="3F"){
    					echo"<option selected value='3F'>3F</option>";
    					}
    				else{
    					echo"<option value='3F'>3F</option>";
    				}
    				if($calidad=="4F"){
    					echo"<option selected value='4F'>1F</option>";
    					}
    				else{
    					echo"<option value='4F'>4F</option>";
    				}
    				if($calidad=="5F"){
    					echo"<option selected value='5F'>5F</option>";
    					}
    				else{
    					echo"<option value='5F'>5F</option>";
    				}
    				if($calidad=="6F"){
    					echo"<option selected value='6F'>6F</option>";
    					}
    				else{
    					echo"<option value='6F'>6F</option>";
    				}


    					?>
    				
    				</select>
    				</div>

    				<div class="anho">
    				<select class="calidad" name="fecha">
    				<?php 
    					for($anioActual=(date("Y"));1950<=$anioActual;$anioActual--){
    						
    					if($anio!=$anioActual){
    						echo "<option value='$anioActual'>$anioActual</option>";
    					}
    					else{
    						echo "<option value='$anioActual' selected>$anioActual</option>";
    					}
    				}
    					
    					?>
    				</select>
    				</div>        			

    				
    				<br><br><br><br><label>UMF</label><br><br><br>
    				<div class="SelectStyle">
    				<?php
						$resultado_consulta_mysql=mysql_query("SELECT * FROM umf");
						echo"<select name='UMF'>";
						while($fila=mysql_fetch_array($resultado_consulta_mysql)){
							$id_umf=$fila['id_umf'];
    					if($area!=$id_umf){
								echo "<option value='".$fila['id_umf']."'>".$fila['nombre_umf']."</option>";
							}
    						else{
    							echo "<option selected value='".$fila['id_umf']."'>".$fila['nombre_umf']."</option>"; 
    						}
    					
						}

						echo "</select>";?>
					</div><br><br><br><br><br>
					<label>Espeacialidad</label><br><br><br>
					<div class="SelectStyle">
					<?php
					//hacer un ciclo para el select de especialidad
						$resultado_consulta_mysql=mysql_query("SELECT * FROM area");
						echo"<select name='especialidad'>";
						while($fila=mysql_fetch_array($resultado_consulta_mysql)){
							$id_area=$fila['id_area'];
							if($area!=$id_area){
								echo "<option value='".$fila['id_area']."'>".$fila['descripcion']."</option>";
							}
    						else{
    							echo "<option selected value='".$fila['id_area']."'>".$fila['descripcion']."</option>"; 
    						}
    				
						
						}
						echo"</select>";?><br><br>
						</div>

					
					<button class="miboton" name="buttonEnviarDatos" type="submit" value="Registrar">Guardar</button>

					</form>
					
					</div>


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

      