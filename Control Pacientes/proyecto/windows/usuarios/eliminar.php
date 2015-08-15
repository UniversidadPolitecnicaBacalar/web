
 <!--Eliminar una cuenta de usuario-->
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

                console.log(data[4]);


            if (data[4]=="E") {document.getElementById("fo3");
                alert('El usuario no existe');}

            if (data[4]=="U"){document.getElementById("fo3");
                alert('Usuario ha sido eliminado correctamente');
                //window.location.href = "../home.html";
              }
            }
        })        
        return false;
    });
    
});



</script>
<section>
<div id="formulario">
<form name="eliminacion" action="windows/procesamiento/procesoEliminacion.php" mothod="post" name="fo3" id="fo3" >
<label>USUARIO</label><br>
  <input class="nombre" type="text" name="username" size="30" maxlength="20" required/><br/>
<button class="miboton" name="buttonELiminar" type="submit" value="Eliminar">Eliminar</button>
</form>
</div>
</section>
</html>