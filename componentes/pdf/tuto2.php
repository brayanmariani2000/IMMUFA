<?php
require('fpdf.php');
$datos = json_decode(file_get_contents('php://input'), true);


class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	// Logo
	//$this->Image('header.jpg',10,10,185);
	// Arial bold 15
	$this->SetFont('Arial','B',16);
	// Salto de l�nea
	//$this->Ln(25);
	// Movernos a la derecha
	$this->Cell(80);
	// T�tulo
	$this->Cell(30,7,'Reportes de Citas',0,1,'C');


	
	  // Arial bold 15
	$this->SetFont('Arial','',12);
	// Movernos a la derecha
	// Sub T�tulo
	$this->Cell(80, 10, 'Nombre y Apellido',1,'','C');
	
	$this->Cell(40, 10, 'cedula',1,'','C');

	$this->Cell(40, 10, 'Area de Consulta',1,'','C');

	$this->Cell(40, 10, 'fecha programada',1,'','C');

	$this->Cell(40, 10, 'Dependencia',1,'','C');
	// Salto de l�nea
	$this->Ln(10);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
//$title = 'Resumen Estadistico';
$pdf->SetTitle('Reportes de Citas');
$pdf->SetAuthor('JTEI del SATIUSUM');
$pdf->SetCreator('Reportes de Citas IMMUFA');
$pdf->SetSubject('Resumen Estadistico');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
foreach ($datos as $fila) {
    $pdf->Cell(80, 10, $fila['nombre'],1,'','C');
    $pdf->Cell(40, 10, $fila['cedula']);
	$pdf->Cell(40, 10, $fila['areaConsulta']);
	$pdf->Cell(40, 10, $fila['fechaConsulta']);
	$pdf->Cell(40, 10, $fila['dependencia']);
    $pdf->Ln();
}
$pdf->Output();
?>
