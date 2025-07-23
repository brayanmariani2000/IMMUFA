<?php
// Limpiar cualquier buffer de salida
if (ob_get_level()) ob_end_clean();

// Configuración de errores
ini_set('display_errors', 0);
error_reporting(0);

// Validar método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Content-Type: application/json', true, 405);
    die(json_encode(['error' => 'Método no permitido. Use POST']));
}

// Incluir FPDF
require_once('fpdf.php');

class PDF extends FPDF {
    private $title = 'Reporte Consolidado de Pacientes';
    
    function __construct() {
        parent::__construct('P', 'mm', 'Letter'); // 'P' para orientación vertical
    }
    
    // Cabecera de página con membrete vertical
    function Header() {
        // Logos - ajustar posiciones para formato vertical
        $this->Image('logo1.png', 20, 10, 20); // Logo izquierdo más pequeño
        $this->Image('logo2.png', 170, 10, 20); // Logo derecho más pequeño
        
        // Membrete institucional centrado verticalmente
        $this->SetFont('Arial', 'B', 9);
        $this->SetY(12);
        $this->Cell(0, 4, utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 1, 'C');
        $this->Cell(0, 4, utf8_decode('ALCALDÍA BOLIVARIANA DEL MUNICIPIO MATURÍN'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 4, utf8_decode('INSTITUTO MUNICIPAL DE LA MUJER Y LA FAMILIA (IMMUFA)'), 0, 1, 'C');
        
        // Línea divisoria más delgada
        $this->SetLineWidth(0.3);
        $this->Line(20, $this->GetY() + 3, 190, $this->GetY() + 3);
        
        // Título del reporte
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, utf8_decode($this->title), 0, 1, 'C');
        
        // Fecha de generación
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 5, 'Generado: ' . date('d/m/Y H:i'), 0, 1, 'R');
        
        // Espacio antes del contenido
        $this->Ln(8);
    }
    
    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 7);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    
    // Tabla optimizada para formato vertical
   // Tabla optimizada para formato vertical (versión corregida)
   function createVerticalTable($title, $headers, $data) {
    // Anchos de columnas para 2 columnas
    $colWidths = [120, 70]; // Primera columna más ancha para texto, segunda para valores
    
    // Estilo del título de sección
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(0, 6, utf8_decode($title), 0, 1, 'L');
    $this->Ln(2);
    
    // Encabezado de tabla
    $this->SetFillColor(58, 106, 189);
    $this->SetTextColor(255);
    $this->SetFont('Arial', 'B', 9);
    
    // Dibujar borde superior de la tabla
    $this->Cell(array_sum($colWidths), 0, '', 'T');
    $this->Ln();
    
    // Solo mostrar las primeras 2 cabeceras (por si acaso vienen más)
    for($i = 0; $i < min(2, count($headers)); $i++) {
        $this->Cell($colWidths[$i], 6, utf8_decode($headers[$i]), 1, 0, 'C', true);
    }
    $this->Ln();
    
    // Datos de la tabla
    $this->SetFillColor(232, 240, 254);
    $this->SetTextColor(0);
    $this->SetFont('Arial', '', 8);
    
    $fill = false;
    foreach($data as $row) {
        // Tomar solo los primeros 2 valores de cada fila
        $values = array_values($row);
        for($i = 0; $i < 2; $i++) {
            $value = isset($values[$i]) ? $values[$i] : '';
            $align = ($i == 0) ? 'L' : 'C';
            $this->Cell($colWidths[$i], 5, utf8_decode($value), 'LR', 0, $align, $fill);
        }
        $this->Ln();
        $fill = !$fill;
    }
    
    // Cierre de tabla - Dibujar solo el borde inferior
    $this->Cell(array_sum($colWidths), 0, '', 'B');
    $this->Ln(10);
}
}

try {
    // Obtener datos JSON
    $jsonInput = file_get_contents('php://input');
    if (empty($jsonInput)) {
        throw new Exception('No se recibieron datos');
    }
    
    $requestData = json_decode($jsonInput, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Error en formato JSON: ' . json_last_error_msg());
    }
    
    // Validar estructura de datos
    if (!is_array($requestData)) {
        throw new Exception('Formato de datos incorrecto');
    }
    
    // Crear PDF en orientación vertical
    $pdf = new PDF();
    $pdf->SetMargins(20, 30, 20); // Márgenes optimizados para vertical
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Sección 1: Discapacidades
    if (!empty($requestData['discapacidades']) && is_array($requestData['discapacidades'])) {
        $pdf->createVerticalTable(
            '1. Distribución por Tipo de Discapacidad',
            ['Tipo de Discapacidad', 'Pacientes'],
            $requestData['discapacidades']
        );
    }
    
    // Sección 2: Edades
    if (!empty($requestData['edades']) && is_array($requestData['edades'])) {
        $pdf->createVerticalTable(
            '2. Distribución por Rango de Edad',
            ['Rango de Edad', 'Pacientes'],
            $requestData['edades']
        );
    }
    
    // Sección 3: Municipios
    if (!empty($requestData['municipios']) && is_array($requestData['municipios'])) {
        $pdf->createVerticalTable(
            '3. Distribución por Municipio',
            ['Municipio', 'Pacientes'],
            $requestData['municipios']
        );
    }
    
    // Sección 4: Especialidades
    if (!empty($requestData['especialidades']) && is_array($requestData['especialidades'])) {
        $pdf->createVerticalTable(
            '4. Citas por Especialidad',
            ['Especialidad', 'Citas'],
            $requestData['especialidades']
        );
    }
    
    // Sección 5: Dependencias
    if (!empty($requestData['dependencias']) && is_array($requestData['dependencias'])) {
        $pdf->createVerticalTable(
            '5. Distribución por Dependencia',
            ['Dependencia', 'Pacientes'],
            $requestData['dependencias']
        );
    }
    
    // Pie del documento
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(0, 5, utf8_decode('Documento generado automáticamente por el sistema IMMUFA'), 0, 1, 'C');
    
    // Generar PDF
    $pdf->Output('I', 'Reporte_Vertical_IMMUFA_' . date('Y-m-d') . '.pdf');
    exit;

} catch (Exception $e) {
    // Manejo de errores
    while (ob_get_level()) ob_end_clean();
    header('Content-Type: application/json', true, 500);
    die(json_encode([
        'error' => 'Error al generar PDF',
        'message' => $e->getMessage(),
        'timestamp' => date('c')
    ]));
}