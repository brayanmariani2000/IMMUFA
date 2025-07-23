<?php
require('fpdf.php');

// Configuración de errores (desactivar en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Recibir datos JSON
$datos = json_decode(file_get_contents('php://input'), true);

class PDF extends FPDF {
    public $metadatos;
    
    // Cabecera con membrete oficial en orientación horizontal
    function Header() {
        // Configuración para hoja horizontal (A4 landscape)
        $pageWidth = 297; // Ancho de A4 en horizontal (297mm)
        $margin = 15; // Margen uniforme
        
        // Logos perfectamente alineados
        $logoWidth = 20;
        $this->Image('logo1.png', $margin, 10, $logoWidth);
        $this->Image('Logo2.png', $pageWidth - $margin - $logoWidth, 10, $logoWidth);
        
        // Membrete institucional centrado
        $this->SetY(12);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 1, 'C');
        $this->Cell(0, 5, utf8_decode('ALCALDÍA BOLIVARIANA DEL MUNICIPIO MATURÍN'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(0, 5, utf8_decode('INSTITUTO MUNICIPAL DE LA MUJER Y LA FAMILIA (IMMUFA)'), 0, 1, 'C');
        
        // Línea divisoria alineada con los logos
        $this->SetLineWidth(0.3);
        $this->Line($margin, $this->GetY() + 3, $pageWidth - $margin, $this->GetY() + 3);
        
        // Título del reporte
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 12, utf8_decode($this->metadatos['título']), 0, 1, 'C');
        
        // Fecha de generación alineada a la derecha
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 8, 'Generado el: ' . utf8_decode($this->metadatos['generadoEl']), 0, 1, 'R');
        $this->Ln(5);
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    
    // Tabla perfectamente centrada y alineada
    function crearTablaHorizontal($encabezados, $filas, $anchos) {
        // Calcular el ancho total de la tabla
        $anchoTotal = array_sum($anchos);
        
        // Calcular posición X inicial para centrar la tabla
        $xInicio = (297 - $anchoTotal) / 2; // 297mm es el ancho de A4 horizontal
        $this->SetX($xInicio);
        
        // Encabezados con estilo profesional
        $this->SetFont('Arial', 'B', 11);
        $this->SetFillColor(58, 106, 189); // Azul institucional
        $this->SetTextColor(255);
        $this->SetDrawColor(255, 255, 255); // Bordes blancos
        
        foreach ($encabezados as $i => $encabezado) {
            $this->Cell($anchos[$i], 8, utf8_decode($encabezado), 1, 0, 'C', true);
        }
        $this->Ln();
        
        // Datos de la tabla perfectamente alineados
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0);
        $this->SetFillColor(232, 240, 254); // Fondo azul claro alternado
        $this->SetDrawColor(150, 150, 150); // Bordes grises
        
        $fill = false;
        foreach ($filas as $fila) {
            $this->SetX($xInicio); // Mantener alineación para cada fila
            foreach ($fila as $i => $valor) {
                $align = ($i === 0 || $i === 2 || $i === 4 || $i === 5) ? 'C' : 'L'; // Centrar números y fechas
                $this->Cell($anchos[$i], 6, utf8_decode($valor), 'LR', 0, $align, $fill);
            }
            $this->Ln();
            $fill = !$fill;
        }
        
        // Cierre de tabla perfectamente alineado
        $this->SetX($xInicio);
        $this->Cell($anchoTotal, 0, '', 'T');
        $this->Ln(8);
    }
}

// Crear PDF en orientación horizontal
$pdf = new PDF('L', 'mm', 'A4');
$pdf->metadatos = $datos['metadatos'];
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(15, 30, 15); // Márgenes izquierdo, superior, derecho

// Configuración de columnas optimizada para 7 columnas
$anchos = [
    15,  // N° (un poco más ancho)
    70,  // Nombre y Apellido (más espacio para nombres largos)
    30,  // Cédula
    55,  // Área/Motivo
    35,  // Fecha
    45,  // Edad
];

// Asegurar que la tabla no exceda el ancho disponible
$anchoTotal = array_sum($anchos);
$anchoMaximo = 297 - 30; // Ancho página - márgenes
if ($anchoTotal > $anchoMaximo) {
    $factor = $anchoMaximo / $anchoTotal;
    foreach ($anchos as &$ancho) {
        $ancho = round($ancho * $factor);
    }
}

// Crear tabla perfectamente centrada y alineada
$pdf->crearTablaHorizontal(
    $datos['contenido']['datos']['encabezados'],
    $datos['contenido']['datos']['filas'],
    $anchos
);

// Pie del documento
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, utf8_decode('Documento generado automáticamente por el sistema IMMUFA'), 0, 1, 'C');

// Salida del PDF
$pdf->Output('D', 'Reporte_Citas_IMMUFA_' . date('Y-m-d') . '.pdf');
?>