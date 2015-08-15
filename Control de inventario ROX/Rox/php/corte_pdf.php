<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
//solo pueden entrar los que son administrativos
if (isset($_SESSION['username']) && isset($_SESSION['acceso'])){

  if ($_SESSION['acceso'] == 'Administrativo' || $_SESSION['acceso'] == 'Operacion') { 


    require('../fpdf/fpdf.php');
  

  class PDF extends FPDF
  {
     //Cabecera de página
     function Header()
     {


        $this->SetFont('Arial','B',12);
        setlocale(LC_ALL,"es_ES");


        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
  	  $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  	  global $fechaEspañol, $hora; 
  	  $fechaEspañol	 = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
        $hora = date("h:i:s A");
        $this->Cell(190,10,'Corte generado el dia '.utf8_decode($fechaEspañol).", ".$hora,1,0,'C');

     }


  //Pie de página
  	function Footer()
  	{

  	$this->SetY(-20);

  	$this->SetFont('Arial','I',8);

  	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  	$this->ln(5);
  	$this->Cell(0,10,utf8_decode('Copyright © 2015 | Joel Nahim & Luis Enrique'),0,0,'C');
  	}

  /*function FancyTable($cabeceraTabla, $data)
  {
      // Colores, ancho de línea y fuente en negrita
      $this->SetFillColor(107,117,134);
      $this->SetTextColor(255);
      $this->SetDrawColor(107,97,94);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');
      // Cabecera
      $w = array(50, 40, 50, 50);
      for($i=0;$i<count($cabeceraTabla);$i++)
          $this->Cell($w[$i],7,$cabeceraTabla[$i],1,0,'C',true);
      $this->Ln();
      // Restauración de colores y fuentes
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Datos
      $fill = false;
      for($x = 0; $x<count($data); $x++)
      {
          $this->Cell($w[0],6,$data[0],'LR',0,'L',$fill);
          $this->Cell($w[1],6,$data[1],'LR',0,'L',$fill);
          $this->Cell($w[2],6,$data[2],'LR',0,'R',$fill);
          $this->Cell($w[3],6,$data[3],'LR',0,'R',$fill);
          $this->Ln();
          $fill = !$fill;
      }

  }*/


  }





  //Creación del objeto de la clase heredada
  $pdf=new PDF();
  $pdf->AddPage();

  $pdf->SetFont('Times','',11);
  
  //Aquí escribimos lo que deseamos mostrar...
  //$cabeceraTabla = array("Cantidad" ,"Concepto", "Costo", "Precio");
  $pdf->ln(10);
  $realizo = $_SESSION['username'];
  $pdf->Cell(20,6,"Realizado por:",0,0);
  $pdf->ln();
  $pdf->Cell(20,6,"Usuario: ".$realizo,0,0);
  $pdf->ln();

    include("conexion_login.php");

  $user = mysql_query("SELECT * FROM usuarios u INNER JOIN empleados e ON (u.Id_empleado=e.Id_empleado) INNER JOIN areas a ON (u.Id_area=a.Id_area) WHERE u.username = '$realizo'",$con);
  $arrayUser=mysql_fetch_assoc($user);
  $user = $arrayUser['nombre'];
  $numero = $arrayUser['numero'];
  $area = $arrayUser['nombre_area'];


  $pdf->Cell(20,6,"Nombre: ".$user,0,0);
  $pdf->ln();
  $pdf->Cell(20,6,"Numero: ".$numero,0,0);
  $pdf->ln();
  $pdf->Cell(20,6,"Area: ".$area,0,0);

  $pdf->ln();
  $pdf->SetFillColor(191, 191, 191);

  $pdf->SetFont('Times','B',11);

  //$pdf->FancyTable($cabeceraTabla, $data);
  $pdf->Cell(20,6,"Cantidad",1,0,'C',1);
  $pdf->Cell(40,6,"Producto",1,0,'C',1);
  $pdf->Cell(30,6,"Marca",1,0,'C',1);
  $pdf->Cell(20,6,"Precio Ad.",1,0,'C',1);
  $pdf->Cell(20,6,"Precio P.",1,0,'C',1);
  $pdf->Cell(20,6,"Precio T.A.",1,0,'C',1);
  $pdf->Cell(20,6,"Total V.",1,0,'C',1);
  $pdf->Cell(20,6,"Utilidad",1,0,'C',1);


  $pdf->ln();
  $pdf->SetFont('Times','',11);
  $numero = count($_POST['productos']);
  $productos = array_values($_POST['productos']);
  $stocks = array_values($_POST['stocks']);

  $gananciaTotal = 0;
  $costoElaboracionTotal = 0;
  $totalVendido = 0;
  $pdf->SetFillColor(236, 236, 236);
  include("conexion.php");


  //creacion html
  $htmlFile="datos.html";

  $principio = '<html>
<head>

    <script src="../js/jquery-2.1.1.min.js"></script>
        
        <script src="../js/highcharts.js"></script>
        <script src="../js/modules/data.js"></script>
        <script src="../js/modules/exporting.js"></script>
     
        <script type="text/javascript">
$(function () {
    $("#container").highcharts({
        data: {
            table: "datatable"
        },
        chart: {
            type: "column"
        },
        title: {
            text: "Grafico de venta '.utf8_decode($fechaEspañol).', '.$hora.'"
        },
        yAxis: {
            allowDecimals: true,
            title: {
                text: "Unidades"
            }
        },
        tooltip: {
            formatter: function () {
                return "<b>" + this.series.name + "</b><br/>" +
                    this.point.y + " " + this.point.name.toLowerCase();
            }
        }
    });
});
        </script>

      </head>
  <body>
    <section>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      
    </section><section>';

        $final = '</section>
</body>



</html>';
  $tablaCabecera = '<table border = "1" id = "datatable">


  <thead>

  <tr>
    <th>
    Producto
    </th>
    <th>
    Vendidos
    </th>
    <th>
    Precio Adquisición
    </th>
    <th>
    Precio al Público
    </th>
    <th>
    Precio Adquisición Total
    </th>
    <th>
    Total Vendido
    </th>
    <th>
    Ganancia Total
    </th>
  </tr>

  ';
  $tablaCuerpo = "<tbody>";
  //creacion txt
  $ar=fopen("datos.txt","w") or die("<script>alert('Problemas al crear txt');history.back();</script>");

  //cabecera txt
  fwrite($ar,"Cantidad\tProducto\t\tMarca\t\tCosto\tPrecio\r\n");

  

  for ($x=0; $x <$numero ; $x++) {
    $f = $x%2; 
    $pS =$stocks[$x];
    $pdf->Cell(20,6, $pS,1,0,'C', $f);

    $p = $productos[$x];


    $consulta = mysql_query("SELECT * FROM productos WHERE Id_producto = '$p'",$con);
    $arrayConsulta = mysql_fetch_assoc($consulta);

    $stockOriginal = $arrayConsulta['stock'];
    $nombre = $arrayConsulta['descripcion'];
    $marca = $arrayConsulta['marca'];
    $costo = floatval($arrayConsulta['costo']);
    $precio = floatval($arrayConsulta['precio']);
    $Id_provedor = $arrayConsulta['Id_provedor'];
    $Id_producto = $arrayConsulta['Id_producto'];


    //grafico






    $z=intval($stockOriginal);
    $y=intval($pS);

    $nuevoStock = $z - $y;

    mysql_query("UPDATE productos SET stock = '$nuevoStock' WHERE Id_producto = '$p'",$con) or die ("<script type='text/javascript'>alert('Problemas en modificar valores del stock');history.back();</script>");
    $tablaCuerpo .= "<tr><th>".$nombre."</th>";
    $tablaCuerpo .= "<td>".$y."</td>";
    $tablaCuerpo .= "<td>".number_format($costo,2)."</td>";
    $tablaCuerpo .= "<td>".number_format($precio,2)."</td>";




    fwrite($ar,$pS."\t\t".$nombre."\t\t".$marca."\t\t".$costo."\t".$precio);
    fwrite($ar,"\r\n");


    $pdf->Cell(40,6, $nombre,1,0,'C', $f);
    $pdf->Cell(30,6, $marca,1,0,'C', $f);
    $pdf->Cell(20,6, $costo,1,0,'C', $f);
    $pdf->Cell(20,6, $precio,1,0,'C', $f);
    $costoProducto = floatval(number_format($costo,2))*floatval(number_format($pS,2));
    $costoElaboracionTotal += $costoProducto;
    $pdf->Cell(20,6,$costoProducto,1,0,'C', $f);

    $totalVendidoProducto = floatval(number_format($precio,2))*floatval(number_format($pS,2));
    $pdf->Cell(20,6,$totalVendidoProducto,1,0,'C', $f);
    $ganancia = $totalVendidoProducto - $costoProducto;
    //costo elaboracion total
    $tablaCuerpo .= "<td>".number_format($costoProducto,2)."</td>";

    //total vendido
    $tablaCuerpo .= "<td>".number_format($totalVendidoProducto,2)."</td>";

    //ganancia
    $tablaCuerpo .= "<td>".number_format($ganancia,2)."</td></tr>";
    $gananciaTotal += $ganancia;
    $pdf->Cell(20,6,$ganancia,1,0,'C', $f);

    $totalVendido += floatval(number_format($precio,2))*floatval(number_format($pS,2));

    mysql_query("INSERT INTO vendidos(Id_producto,
                                      totalVendidos,
                                      cantidadVendidos) VALUES('$Id_producto',
                                                                '$totalVendidoProducto',
                                                                '$pS')",$con);                          


    $pdf->ln();


  }
  //cerrado de las tablas
  $tablaCabecera .= "</tr></thead>";
  $tablaCuerpo .= "</tbody>";
  //creacion del html en string
  $tablaCompleta = $principio.$tablaCabecera.$tablaCuerpo."</table>".$final;

  



    $nameUsername = $_SESSION['username']."/CORTE";
    $fechaIngreso = date("Y-m-d H:i:s");




  $pdf->Cell(110,6,"",0,0,'C');
  $pdf->SetFont('Times','I',11);
  $pdf->Cell(20,6,"Totales",0,0,'C');

  $pdf->Cell(20,6,$costoElaboracionTotal,1,0,'C');
  $pdf->Cell(20,6,$totalVendido,1,0,'C');
  $pdf->Cell(20,6,$gananciaTotal,1,0,'C');
  
  fwrite($ar,"Totales");
  fwrite($ar,"\r\n");
  fwrite($ar,"Costo Elaboracion: \t".$costoElaboracionTotal);
  fwrite($ar,"\r\n");
  fwrite($ar,"Total Vendido: \t\t".$totalVendido);
  fwrite($ar,"\r\n");
  fwrite($ar,"Ganancia Total: \t".$gananciaTotal);

  fclose($ar);
  




  //guardado del pdf
  $guardarPdf=$pdf->Output('','S');
  //ruta de guardado
  $carpetaGuardar = "../cortes/";
  //numero de folio
  $folio = mysql_query("SELECT Id_corte FROM cortes ORDER BY Id_corte DESC limit 1");
  $arrayFolio = mysql_fetch_assoc($folio);
  $f = $arrayFolio['Id_corte'];
  $noFolio = $f+1;

  $nombreArchivo = $noFolio."_".date("Ymd");
  //ver que nombre poner
  $pdfFile = $carpetaGuardar.$nombreArchivo.'.pdf';
  //guardado del pdf en la carpeta del html
  file_put_contents($pdfFile, $guardarPdf);


  //html
  print_r('

    <!DOCTYPE html>
    <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    </head>
    <body>

    <header>
        <nav class = "top-nav">

          <div class = "nav-wrapper  blue darken-2">
              


            <a href="#" class = "brand-logo center"><i class = "mdi-action-group-work"> Corte de caja PDF</i></a>

          </div>
        
 
        </nav>
        </header>
        <main>


        </main>

        <div class="container">
        <div class = "card-panel center col s12">




    <br><a class = "btn waves-effect waves-light blue" target = "_blank" href="'.$pdfFile.'"><i class = "mdi-action-visibility"> VER PDF</i></a><br>');
  //cerrado del html

  $hF=fopen($htmlFile,"w");
  fwrite($hF,$tablaCompleta);
  fclose($hF);
  //obteniendo valores de los archivos creados
  $txtFile = file_get_contents("datos.txt");
  $htmlFile = file_get_contents("datos.html");
  //guardando datos del corte

  mysql_query("INSERT INTO cortes(ruta,
                                  datos,
                                  fechaCorte,
                                  costoElaboracion,
                                  totalVendido,
                                  ganancia,
                                  nameUsername,
                                  datosHtml) VALUES ('$pdfFile',
                                                    '$txtFile',
                                                    '$fechaIngreso',
                                                    '$costoElaboracionTotal',
                                                    '$totalVendido',
                                                    '$gananciaTotal',
                                                    '$realizo',
                                                    '$htmlFile')",$con) OR die ("<script type='text/javascript'>alert('Problemas en guardar ruta de pdf');history.back();</script>");
  //borrar archivos creados
  unlink("datos.txt");
  unlink("datos.html");
  //consulta de la ultima grafica

  $consultaGrafica = mysql_query("SELECT Id_corte FROM cortes ORDER BY Id_corte DESC LIMIT 1",$con);
  $arrayConsultaGrafica = mysql_fetch_assoc($consultaGrafica);
  $graficoId=$arrayConsultaGrafica['Id_corte'];
  //menu con botones

  print_r('<br><a class = "btn waves-effect waves-light" href="'.$pdfFile.'" download><i class = "mdi-av-my-library-books"> DESCARGAR PDF</i></a><br>
    <br><a class = "btn waves-effect waves-light black" target="_blank" href="grafica.php?id='.$graficoId.'"><i class = "mdi-editor-insert-chart"> GRAFICO</i></a><br>
    <br><a class = "btn waves-effect waves-light red" href="corte.php"><i class = "mdi-content-undo"> REGRESAR</i></a><br></div></div></main></html>');




 
}
else {
//de caso contrario redireciona al login
echo "<script>history.back();</script>";
}

} else {
//de caso contrario redireciona al login
echo "<script>history.back();</script>";
}
?>