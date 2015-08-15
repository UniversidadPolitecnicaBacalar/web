<html>
  <div id="titulo">
    <h1>Actualizar</h1>
  </div>
    <head>
      <meta charset="UTF-8">
       <title>IMSS</title>
       <link rel="stylesheet"  href="static/css/diseño.css"/>
    </head>
     <script src="windows/jquery/jquery-1.9.1.min.js"></script>
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
    $('#form, #fat, #fo3').submit(function() {
  // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                $('#result').html(data);
                console.log(data[2]);

            if (data[2]=="U") {document.getElementById("fo3").reset();
                alert('Usuario o contraseña incorrecta ');}

                if (data[2]=="V"){document.getElementById("fo3");
                alert('Verifique su nueva contraseña');
              }
                if (data[2]=="C") {document.getElementById("fo3").reset();
                alert('Contarseña actualizada');
              }
            }
        })        
        return false;
    });
    
});



</script>
<section>
<div id="formulario">
<form name="registro" action="windows/procesamiento/procesoEdicion.php" mothod="post" name="fo3" id="fo3" >
<label>USUARIO</label><br>
  <input class="nombre" type="text" name="username" size="30" maxlength="20" required/><br/>
<label>Contraseña Vieja</label><br>
<input class="nombre"type="password" name="Oldpassword" required/><br>
<label>Nueva contraseña</label><br>
<input class="nombre"type="password" name="Newpassword" size="40" maxlength="10" required/><br/>
<label>Confirmar contraseña</label><br>
<input class="nombre"type="password" name="Newpassword2" size="40" maxlength="10" required/><br/>
<button class="miboton" name="enviar" type="submit" value="Registrar">Guardar</button>
</form>
</div>

</section>
</html>