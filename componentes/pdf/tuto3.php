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
    private $reportTitle;
    private $reportType;
    
    function __construct($title, $type) {
        parent::__construct('P', 'mm', 'Letter');
        $this->reportTitle = $title;
        $this->reportType = $type;
    }
    
    // Cabecera de página con membrete
    function Header() {
        // Logos - ajustar rutas según sea necesario
        $this->Image('logo1.png', 15, 8, 25); // Logo izquierdo
        $this->Image('Logo2.png', 165, 8, 25); // Logo derecho
        
        // Membrete institucional
        $this->SetFont('Arial', 'B', 10);
        $this->SetY(10);
        $this->Cell(0, 5, utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 1, 'C');
        $this->Cell(0, 5, utf8_decode('ALCALDÍA BOLIVARIANA DEL MUNICIPIO MATURÍN'), 0, 1, 'C');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(0, 5, utf8_decode('INSTITUTO MUNICIPAL DE LA MUJER Y LA FAMILIA (IMMUFA)'), 0, 1, 'C');
        
        // Línea divisoria
        $this->SetLineWidth(0.5);
        $this->SetDrawColor(0, 0, 0);
        $this->Line(15, $this->GetY() + 2, 200, $this->GetY() + 2);
        $this->Ln(8);
        
        // Título del reporte
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 8, utf8_decode($this->reportTitle), 0, 1, 'C');
        
        // Subtítulo según tipo de reporte
        $this->SetFont('Arial', 'I', 11);
        $subtitle = '';
        switch($this->reportType) {
            case 'municipios':
                $subtitle = 'Distribución de pacientes por municipio';
                break;
            case 'dependencias':
                $subtitle = 'Distribución de pacientes por dependencia';
                break;
            case 'edades':
                $subtitle = 'Distribución de pacientes por rango de edad';
                break;
            case 'especialidades':
                $subtitle = 'Distribución de citas por especialidad médica';
                break;
            case 'etnias':
                $subtitle = 'Distribución de pacientes por etnias';
                break;
            case 'discapacidad':
                $subtitle = 'Distribución de pacientes por discapacidad';
                break;
        }
        $this->Cell(0, 6, utf8_decode($subtitle), 0, 1, 'C');
        
        // Fecha de generación
        $this->SetFont('Arial', '', 9);
        $this->Cell(0, 6, 'Generado: ' . date('d/m/Y H:i'), 0, 1, 'R');
        
        // Salto de línea antes del contenido
        $this->Ln(10);
    }
    
    // Pie de página
    function Footer() {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }
    
    // Tabla mejorada
    function createTable($headers, $data, $footer = null) {
        // Colores
        $this->SetFillColor(58, 106, 189); // Azul institucional para encabezado
        $this->SetTextColor(255);
        $this->SetDrawColor(150, 150, 150);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial', 'B', 10);
        
        // Cabecera de tabla
        $colWidths = [80, 55, 55]; // Anchos de columna ajustados
        for($i = 0; $i < count($headers); $i++) {
            $this->Cell($colWidths[$i], 7, utf8_decode($headers[$i]), 1, 0, 'C', true);
        }
        $this->Ln();
        
        // Restaurar colores y fuente
        $this->SetFillColor(232, 240, 254);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 9);
        
        // Datos
        $fill = false;
        foreach($data as $row) {
            $this->Cell($colWidths[0], 6, utf8_decode($row['col1']), 'LR', 0, 'L', $fill);
            $this->Cell($colWidths[1], 6, utf8_decode($row['col2']), 'LR', 0, 'C', $fill);
            $this->Cell($colWidths[2], 6, utf8_decode($row['col3']), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        
        // Cierre de tabla
        $this->Cell(array_sum($colWidths), 0, '', 'T');
        
        // Footer si existe
        if($footer) {
            $this->Ln(2);
            $this->SetFont('Arial', 'B', 9);
            $this->Cell($colWidths[0], 6, utf8_decode($footer['col1']), 1, 0, 'R', true);
            $this->Cell($colWidths[1], 6, utf8_decode($footer['col2']), 1, 0, 'C', true);
            $this->Cell($colWidths[2], 6, utf8_decode($footer['col3']), 1, 0, 'C', true);
        }
        
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
    
    // Validar estructura básica de datos
    if (!isset($requestData['type']) || !isset($requestData['title']) || !isset($requestData['data'])) {
        throw new Exception('Formato de datos incorrecto. Faltan campos requeridos');
    }
    
    // Determinar encabezados según el tipo de reporte
    $header = [];
    switch($requestData['type']) {
        case 'municipios':
            $header = ['Municipio', 'Pacientes', 'Porcentaje'];
            break;
        case 'dependencias':
            $header = ['Dependencia', 'Pacientes', 'Porcentaje'];
            break;
        case 'edades':
            $header = ['Rango de Edad', 'Pacientes', 'Porcentaje'];
            break;
        case 'especialidades':
            $header = ['Especialidad', 'Citas', 'Porcentaje'];
            break;
        case 'etnias':
            $header = ['Etnia', 'Pacientes', 'Porcentaje'];
            break;
        case 'discapacidad':
            $header = ['Discapacidad', 'Pacientes', 'Porcentaje'];
            break;
        default:
            throw new Exception('Tipo de reporte no válido');
    }
    
    // Crear PDF
    $pdf = new PDF($requestData['title'], $requestData['type']);
    $pdf->SetMargins(15, 40, 15); // Márgenes ajustados para el membrete
    $pdf->SetAutoPageBreak(true, 25); // Margen inferior
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    // Generar tabla
    $footer = isset($requestData['footer']) ? $requestData['footer'] : null;
    $pdf->createTable($header, $requestData['data'], $footer);
    
    // Pie del documento
    $pdf->SetFont('Arial', 'I', 9);
    $pdf->Cell(0, 8, utf8_decode('Documento generado automáticamente por el sistema IMMUFA'), 0, 1, 'C');
    
    // Generar PDF
    $pdf->Output('I', 'Reporte_IMMUFA_' . $requestData['type'] . '_' . date('Y-m-d') . '.pdf');
    exit;

} catch (Exception $e) {
    // Limpiar buffers nuevamente
    while (ob_get_level()) ob_end_clean();
    
    // Respuesta de error estructurada
    header('Content-Type: application/json', true, 500);
    die(json_encode([
        'error' => 'Error al generar PDF',
        'message' => $e->getMessage(),
        'timestamp' => date('c')
    ]));
}