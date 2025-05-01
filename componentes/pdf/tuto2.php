<?php
require('fpdf.php');

// Habilitar errores para debug (quitar en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Recibir datos JSON
$datos = json_decode(file_get_contents('php://input'), true);

class PDF extends FPDF {
    // Cabecera
    function Header() {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, utf8_decode($this->metadatos['título']), 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Generado el: ' . utf8_decode($this->metadatos['generadoEl']), 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Crear PDF
$pdf = new PDF();
$pdf->metadatos = $datos['metadatos'];
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Configuración de columnas (en milímetros)
$anchos = [
    10,  // N° (más estrecho)
    65,  // ★ Nombre y Apellido (más ancho) ★
    25,  // Cédula
    40,  // Área
    40,  // Fecha
    50   // Observación
];

// Encabezados de tabla
$pdf->SetFont('Arial', 'B', 12);
foreach ($datos['contenido']['datos']['encabezados'] as $i => $encabezado) {
    $pdf->Cell($anchos[$i], 10, utf8_decode($encabezado), 1, 0, 'C');
}
$pdf->Ln();

// Datos de la tabla
$pdf->SetFont('Arial', '', 11); // Fuente ligeramente más pequeña
foreach ($datos['contenido']['datos']['filas'] as $fila) {
    foreach ($fila as $i => $valor) {
        $align = ($i === 0) ? 'R' : 'L'; // N° alineado a la derecha
        $pdf->Cell($anchos[$i], 8, utf8_decode($valor), 1, 0, $align); // Altura de celda reducida a 8
    }
    $pdf->Ln();
}

// Salida (descarga automática)
$pdf->Output('D', 'reporte_citas_' . date('Y-m-d') . '.pdf');
?>