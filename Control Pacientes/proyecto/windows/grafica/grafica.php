	<head>
       <script type="text/javascript" src="windows/jquery/jquery-2.1.4.min.js"></script>
       <script type="text/javascript" src="static/jschart/jscharts.js"></script>
    </head>
    <section>
    	<?php
    		include("../conexion/conexionMysql.php");
			Crear_Conexion();
			$altas= mysql_num_rows(mysql_query("SELECT * FROM paciente WHERE id_estado=1"));
			$depuracion= mysql_num_rows(mysql_query("SELECT * FROM paciente WHERE id_estado=2"));
			$pasivos= mysql_num_rows(mysql_query("SELECT * FROM paciente WHERE id_estado=3"));
			$defunciones= mysql_num_rows(mysql_query("SELECT * FROM paciente WHERE id_estado=4"));
			



			?>
    	<div id="grafica">Cargando</div>

 <script type="text/javascript">

 	var altas= <?php echo $altas;?>;
 	var depuracion= <?php echo $depuracion;?>;
 	var pasivos= <?php echo $pasivos;?>;
 	var defunciones= <?php echo $defunciones;?>;
 	var total=altas+defunciones+depuracion+pasivos;
 	var paciente=total.toString();

	var myData = new Array(['Altas', altas], ['Depuracion', depuracion], ['Pasivos', pasivos], ['Defuncion', defunciones]);
	var colors = ['#B71C1C', '#0277BD', '#EEFF41', '#4DB6AC'];
	var myChart = new JSChart('grafica', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setTitle('Numero de pacientes');
	myChart.setTitleColor('#8E8E8E');
	myChart.setAxisNameX('Pacientes '+ paciente);
	myChart.setAxisNameY('');
	myChart.setAxisColor('#C4C4C4');
	myChart.setAxisNameFontSize(16);
	myChart.setAxisNameColor('#999');
	myChart.setAxisValuesColor('#7E7E7E');
	myChart.setBarValuesColor('#7E7E7E');
	myChart.setAxisPaddingTop(60);
	myChart.setAxisPaddingRight(140);
	myChart.setAxisPaddingLeft(150);
	myChart.setAxisPaddingBottom(40);
	myChart.setTextPaddingLeft(105);
	myChart.setTitleFontSize(11);
	myChart.setBarSpacingRatio(50);
	myChart.setGrid(false);
	myChart.setSize(616, 321);
	myChart.draw();
</script>
</section>


