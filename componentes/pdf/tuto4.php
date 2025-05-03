<?php
require_once('fpdf.php');

// Recibir datos JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Crear instancia de PDF
$pdf = new FPDF('L', 'mm', 'A4'); // Orientación horizontal para mejor visualización
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Título del reporte
$pdf->Cell(0, 10, $data['title'], 0, 1, 'C');
$pdf->Ln(5);

// Fecha de generación
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'Generado el: ' . $data['fecha'], 0, 1, 'R');
$pdf->Ln(5);

// Encabezados de tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(10, 10, 'N°', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Nombre y Apellido', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Cedula', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Motivo de la cita', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Fecha atencion', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Edad', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Estado de la cita', 1, 1, 'C', true);

// Contenido de la tabla
$pdf->SetFont('Arial', '', 9);
$fill = false;
foreach ($data['data'] as $row) {
    $pdf->Cell(10, 8, $row['numero'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 8, $row['nombre'], 1, 0, 'L', $fill);
    $pdf->Cell(30, 8, $row['cedula'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 8, $row['motivo'], 1, 0, 'L', $fill);
    $pdf->Cell(30, 8, $row['fecha'], 1, 0, 'C', $fill);
    $pdf->Cell(15, 8, $row['edad'], 1, 0, 'C', $fill);
    $pdf->Cell(40, 8, $row['estado'], 1, 1, 'C', $fill);
    $fill = !$fill;
}

// Pie de página
$pdf->SetY(-15);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Pagina ' . $pdf->PageNo(), 0, 0, 'C');

// Salida del PDF
$pdf->Output('D', $data['title'] . '.pdf');
?>