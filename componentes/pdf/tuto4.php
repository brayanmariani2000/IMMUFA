<?php
require_once('fpdf.php');

// Recibir datos JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

class PDF extends FPDF {
    function Header() {
        // Logos - ajustar posiciones para formato horizontal
        $this->Image('logo1.png', 15, 10, 20); // Logo izquierdo
        $this->Image('Logo2.png', 255, 10, 20); // Logo derecho (posición ajustada para A4 horizontal)
        
        // Membrete institucional centrado
        $this->SetFont('Arial', 'B', 9);
        $this->SetY(12);
        $this->Cell(0, 4, utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 1, 'C');
        $this->Cell(0, 4, utf8_decode('ALCALDÍA BOLIVARIANA DEL MUNICIPIO MATURÍN'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 4, utf8_decode('INSTITUTO MUNICIPAL DE LA MUJER Y LA FAMILIA (IMMUFA)'), 0, 1, 'C');
        
        // Línea divisoria
        $this->SetLineWidth(0.3);
        $this->Line(15, $this->GetY() + 3, 285, $this->GetY() + 3); // Ajustada para A4 horizontal
    }
    
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Crear instancia de PDF en orientación horizontal
$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

// Configurar márgenes para el membrete
$pdf->SetMargins(15, 30, 15); // Márgenes izquierdo, superior, derecho

// Título del reporte
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode($data['title']), 0, 1, 'C');
$pdf->Ln(2);

// Fecha de generación
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 6, 'Generado el: ' . $data['fecha'], 0, 1, 'R');
$pdf->Ln(5);

// Encabezados de tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(58, 106, 189); // Azul institucional
$pdf->SetTextColor(255);

// Ajustar anchos de columna para mejor distribución en horizontal
$pdf->Cell(10, 8, 'N°', 1, 0, 'C', true);
$pdf->Cell(45, 8, 'Nombre y Apellido', 1, 0, 'C', true);
$pdf->Cell(25, 8, 'Cédula', 1, 0, 'C', true);
$pdf->Cell(50, 8, 'Motivo de la cita', 1, 0, 'C', true);
$pdf->Cell(50, 8, 'Fecha atención', 1, 0, 'C', true);
$pdf->Cell(20, 8, 'Edad', 1, 0, 'C', true);
$pdf->Cell(35, 8, 'Estado', 1, 1, 'C', true);

// Contenido de la tabla
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(0);
$pdf->SetFillColor(232, 240, 254); // Fondo azul claro alternado

$fill = false;
foreach ($data['data'] as $row) {
    $pdf->Cell(10, 6, utf8_decode($row['numero']), 'LR', 0, 'C', $fill);
    $pdf->Cell(45, 6, utf8_decode($row['nombre']), 'LR', 0, 'L', $fill);
    $pdf->Cell(25, 6, utf8_decode($row['cedula']), 'LR', 0, 'C', $fill);
    $pdf->Cell(50, 6, utf8_decode($row['motivo']), 'LR', 0, 'L', $fill);
    $pdf->Cell(50, 6, utf8_decode($row['fecha']), 'LR', 0, 'C', $fill);
    $pdf->Cell(20, 6, utf8_decode($row['edad']), 'LR', 0, 'C', $fill);
    $pdf->Cell(35, 6, utf8_decode($row['estado']), 'LR', 1, 'C', $fill);
    $fill = !$fill;
}

// Cierre de la tabla (borde inferior)
$pdf->Cell(205, 0, '', 'T'); // Suma de los anchos de columna (10+45+25+50+25+15+35 = 205)
$pdf->Ln(10);

// Pie del documento
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, utf8_decode('Documento generado automáticamente por el sistema IMMUFA'), 0, 1, 'C');

// Salida del PDF
$pdf->Output('D', $data['title'] . '.pdf');
?>