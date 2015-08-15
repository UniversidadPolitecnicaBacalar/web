<html>
<div id="titulo">
   <h1>Altas</h1>
</div>
	<head>

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

<script language="javascript">// <![CDATA[
$(document).ready(function() {
   // Esta primera parte crea un loader no es necesaria
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });

  
   // Interceptamos el evento submit
    $('#altas').submit(function() {
  // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                $('#result').html(data);
                console.log(data[0]);
                console.log(data[1]);
                console.log(data[2]);
               
        		if (data[2]=="Y") {document.getElementById("altas").reset();
                alert('Ya existe paciente');}

                if (data[2]=="P"){document.getElementById("altas").reset();
                alert('Paciente ingresado');
                //window.location.href = "../home.html";
              }
            }
        })        
        return false;
    });
    
});



</script>				

		
	</head>
	<section> 
	
		<?php
		include("conexion/conexionMysql.php");
		Crear_Conexion();
		?>

		<div id="formulario">
				<form action="windows/procesamientoPaciente/altasPaciente.php" mothod="post" name="altas" id="altas" >
					<label>Nombre</label><br>
					<input class="nombre"type="text" name="nombre"  pattern="^[a-zA-Z][a-zA-Z\s]*$" required/><br>
					<label>Apellido Paterno</label> <label class="secundario">Apellido Materno</label> <br>
					<input class="nombre"type="text" name="apellidoPaterno" pattern="^[a-zA-Z][a-zA-Z\s]*$"required/>
					<input  onblur="onlytext(this);" class="nombre"type="text" name="apellidoMaterno" pattern="^[a-zA-Z][a-zA-Z\s]*$"required/><br>
					<label>Tipo</label><br><br>
					<input type="radio" name="activarFormulario" value=1 id="Conocido_1" onclick="mostrarActiva()"/>Activo
						
					<input  type="radio" name="activarFormulario" value=2 id="Conocido_0" onclick="mostrarActiva()"/>Depuracion

					<input  type="radio" name="activarFormulario" value=3 id="Conocido_0" onclick="mostrarActiva()"/>Pasivos
					
    				<input  type="radio" name="activarFormulario" value=4 id="Conocido_0" onclick="mostrarActiva()"/>Defuncion
    				<br>
    				<div id="depuracion" style="display:none;">
			    		<br><label>Caja</label> <br>
			    			<input onkeypress="return justNumbers(event);"  maxlength="3"class="nombre"type="int" name="caja"  />
						<br>
					</div>
					<br><br>
					<label>NSS</label> <br>
					<input onkeypress="return justNumbers(event);"  maxlength="10"class="nombre"type="text" name="noseguroSocial"  required/><br>
					<br><br><label >Agregado</label><br><br>
    				<div class="calidadSelect">
    				<select class="calidad" name="regimen">
    				<option value="OR">OR</option>
    				<option value="EC">EC</option>
    				<option value="ES">ES</option>
    				<option value="SF">SF</option>
    				<option value="SA">SA</option>
    				<option value="PE">PE</option>
    				</select>
    				</div>

    				<div class="calidadSelect2">
    				<select class="calidad" name="calidad">
    				<option value="1M">1M</option>
    				<option value="2M">2M</option>
    				<option value="3M">3M</option>
    				<option value="4M">4M</option>
    				<option value="5M">5M</option>
    				<option value="6M">6M</option>
    				<option value="1F">1F</option>
    				<option value="2F">2F</option>
    				<option value="3F">3F</option>
    				<option value="4F">4F</option>
    				<option value="5F">5F</option>
    				<option value="6F">4F</option>
    				
    				</select>
    				</div>

    				<div class="anho">
    				<select class="calidad" name="fecha">
    				<?php 
    					for($anioActual=(date("Y"));1950<=$anioActual;$anioActual--){
    					echo "<option value='$anioActual'>$anioActual</option>";
    					}?>
    				</select>
    				</div>

    				<br><br><br><br><br><label>UMF</label><br><br>
    				<div class="SelectStyle">
    				<?php
						$resultado_consulta_mysql=mysql_query("SELECT * FROM umf");
						echo"<select class='umf'  name='UMF'>";
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
					</div><br><br>
					<br><label>Espeacialidad</label><br><br>
					<div class="SelectStyle">
					<?php
					//hacer un ciclo para el select de especialidad
						$resultado_consulta_mysql=mysql_query("SELECT * FROM area");
						echo"<select class='umf' name='especialidad'>";
						while($fila=mysql_fetch_array($resultado_consulta_mysql)){
							$id_area=$fila['id_area'];
							if($area!=$id_area){
								echo "<option value='".$fila['id_area']."'>".$fila['descripcion']."</option>";
							}
    						else{
    							echo "<option selected value='".$fila['id_area']."'>".$fila['descripcion']."</option>"; 
    						}
    				
						
						}
						echo"</select>";?>
						</div>

					</select>
					<button class="miboton" name="buttonEnviarDatos" type="submit" value="Registrar">Guardar</button>
					</form>
					</div>


	</section>
<html>

      