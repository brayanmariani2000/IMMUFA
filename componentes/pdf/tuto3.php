<?php
require('fpdf.php'); // Asegúrate de tener la librería FPDF en tu proyecto

// Obtener datos del POST
$data = json_decode(file_get_contents('php://input'), true);

// Crear clase personalizada de FPDF
class PDF extends FPDF {
    private $reportTitle;
    private $reportType;
    
    function __construct($title, $type) {
        parent::__construct();
        $this->reportTitle = $title;
        $this->reportType = $type;
    }
    
    // Cabecera de página
    function Header() {
        // Logo
        
        // Título
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, utf8_decode($this->reportTitle), 0, 1, 'C');
        
        // Subtítulo según tipo de reporte
        $this->SetFont('Arial', 'I', 12);
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
        }
        $this->Cell(0, 10, utf8_decode($subtitle), 0, 1, 'C');
        
        // Fecha
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Fecha: ' . date('d/m/Y H:i'), 0, 1, 'R');
        
        // Salto de línea
        $this->Ln(10);
    }
    
    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
    }
    
    // Tabla coloreada
    function ImprovedTable($header, $data, $footer = null) {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(59, 89, 152);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        
        // Anchuras de las columnas
        $w = array(70, 40, 40);
        
        // Cabeceras
        for($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        }
        $this->Ln();
        
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        // Datos
        $fill = false;
        foreach($data as $row) {
            $this->Cell($w[0], 6, utf8_decode($row['col1']), 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, utf8_decode($row['col2']), 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, utf8_decode($row['col3']), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
        
        // Footer si existe
        if($footer) {
            $this->Ln(5);
            $this->SetFont('', 'B');
            $this->Cell($w[0], 6, utf8_decode($footer['col1']), 1, 0, 'R', true);
            $this->Cell($w[1], 6, utf8_decode($footer['col2']), 1, 0, 'C', true);
            $this->Cell($w[2], 6, utf8_decode($footer['col3']), 1, 0, 'C', true);
        }
    }
}

// Determinar encabezados según el tipo de reporte
$header = [];
switch($data['type']) {
    case 'municipios':
        $header = array('Municipio', 'Pacientes', 'Porcentaje');
        break;
    case 'dependencias':
        $header = array('Dependencia', 'Pacientes', 'Porcentaje');
        break;
    case 'edades':
        $header = array('Rango de Edad', 'Pacientes', 'Porcentaje');
        break;
    case 'especialidades':
        $header = array('Especialidad', 'Citas', 'Porcentaje');
        break;
}

// Crear PDF
$pdf = new PDF($data['title'], $data['type']);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->ImprovedTable($header, $data['data'], $data['footer']);

// Salida del PDF
$pdf->Output('D'); // 'D' para forzar descarga
?>