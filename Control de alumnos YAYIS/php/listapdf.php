<?php
//se inicia sesion
session_start();
//checa que la sesion tenga algo, tambien la contraseña
if (isset($_SESSION['username']) && isset($_SESSION['password'])){
//se ejecutara si se cumple
	?>
<?php

ob_start();

//mostrar cualquier error
error_reporting(E_ALL);
#Librerias requeridas
require ("../fpdf/fpdf.php");
require ("conexion.php");
#creaccion del pdf
$pdf = new FPDF('L','mm','Letter');
#creacion de la pagina
$pdf->AddPage();
				//letra, tipo de letra, tamaño
$pdf->SetFont('Arial', '', 14);
						//ubicacion(x,y) y ancho alto , formato
$pdf->Image("../img/upb.png", 10, 8, 65, 20, 'PNG');
	//largo ancho, texto, borde
$pdf->Cell(85, 10, '', 0);

$pdf->Cell(130, 10, "Universidad Politecnica de Bacalar", 0);

$pdf->SetFont('Arial', 'I', 12);
								#fecha (dia, mes, año)
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);


#salto de linea
$pdf->Ln(15);

$pdf->SetFont('Arial', 'B', '14' );

$pdf->Cell(100, 8, '', 0);

$pdf->Cell(100, 8, "Listado de alumnos", 0);

$pdf->Ln(23);

$pdf->SetFont('Arial', 'B', 9);
#color de la celda
$pdf->SetFillColor(235, 235, 235);
#			tamaño					brode, si tiene salto de linea, centrado, si va pintada
$pdf->Cell(23, 8, "Apll. Pat.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "Apll. Mat.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "N.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "Fec. Nac.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "Loc. Nac.", 1, 0 , 'C', true);	

$pdf->Cell(23, 8, "Col.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "Dirc.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "Cdad.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "No Ext.", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "Tel. Movil", 1, 0 , 'C', true);
$pdf->Cell(23, 8, "Tel. Fijo", 1, 0 , 'C', true);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'I', 8);
//mysqli es diferente, primero se crea una nueva clase
//que recibe las primeras 3 variables, luego recibe la conexion y la base de datos

#conexion al servidor
$con = new mysqli($host, $user, $password) or die ("Problemas al conectar al servidor");
#conexion a la base de datos
mysqli_select_db($con,$database) or die ("Problemas al conectar a la base de datos");

#variable donde trae todo de la base de datos                                    #si hay problemas la funcion nos indica cual es
						#primero conexion, luego el query
$registro = mysqli_query($con,"SELECT * FROM alumnos ORDER BY Apellido_paterno ASC") or die ("Problemas en consulta".mysql_error());

#while donde muestra todo de la base de datos
#ayuda a traer en forma de lista lo que esta en una tabla, se traen los datos de la varible registro que es la consulta


while($reg = $registro->fetch_array()){
	
	$pdf->Cell(23, 15, utf8_decode($reg['Apellido_paterno']), 1);
	$pdf->Cell(23, 15, utf8_decode($reg['Apellido_materno']), 1);
	$pdf->Cell(23, 15, utf8_decode($reg['Nombre']), 1);
	$pdf->Cell(23, 15, utf8_decode($reg['Fecha_de_nacimiento']), 1);
	$pdf->Cell(23, 15, utf8_decode($reg['Lugar_de_nacimiento']), 1);
	$y = $pdf->GetY();
	$pdf->Cell(23, 15, utf8_decode($reg['Colonia']), 1);
	$pdf->SetXY(148, $y);
	$y = $pdf->GetY();
	$pdf->MultiCell(23,7.5,utf8_decode($reg['Domicilio']),1,'L'); 
	
	$pdf->SetXY(171, $y);
	$pdf->Cell(23, 15, utf8_decode($reg['Ciudad']), 1);
	$pdf->Cell(23, 15, utf8_decode($reg['Numero_exterior']), 1);
	$pdf->Cell(23, 15, utf8_decode($reg['Telefono_movil']), 1);
	$pdf->Cell(23, 15, utf8_decode($reg['Telefono_fijo']), 1);
	$pdf->Ln(8);
	}

$pdf->Output();
?>
<?php 

} else {
//de caso contrario redireciona al login
header('Location:../login.html');
}
?>