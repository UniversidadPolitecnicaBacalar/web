<html>
  <div id="titulo2">
    <h1>Consultas y Modificación</h1>
  </div>
  <head>
    <script type="text/javascript" src="windows/jquery/jquery-1.4.2.min.js"></script> 
    <script type="text/javascript" src="windows/jquery/jquery-ui-1.8.2.custom.min.js"></script>
    <link rel="stylesheet" href="windows/smoothness/jquery-ui-1.8.2.custom.css" />
    <script type="text/javascript">

                jQuery(document).ready(function(){
                    $('#search').autocomplete({
                        source : 'windows/procesamientoPaciente/Busqueda.php',
                        minLength : 1,

                        select:function(e,ui) {//Redireccion
                              location.href = ui.item.href;
                              console.log(ui.item.href);
                        } 
                    });
                });        
            </script>
    
  </head>
  <section> 

    

    <div id="formulario">
          <label> Busqueda (NSS) </label><br>
          <input  type="text" class ="busqueda" id="search" name="search"/>

          
    </div>
  


  </section>
<html>