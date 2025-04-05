<?php
require('fpdf.php'); // Asegúrate de que la ruta a FPDF es correcta

// 1. Recibir los datos enviados desde JavaScript
$pdfData = json_decode($_POST['pdfData'], true);
$fileName = $_POST['fileName'] ?? 'documento.pdf';

// 2. Validar los datos recibidos
if (!$pdfData || !isset($pdfData['type'])) {
    die("Error: Datos del PDF no recibidos correctamente");
}

// 3. Crear una clase personalizada de PDF CORREGIDA
class MyPDF extends FPDF {
    private $customTitle;
    
    // Método corregido para ser compatible con FPDF
    function SetTitle($title, $isUTF8 = false) {
        parent::SetTitle($title, $isUTF8); // Llama al método original
        $this->customTitle = $title; // Guarda el título para uso personalizado
    }
    
    function Header() {
        if ($this->customTitle) {
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0, 10, $this->customTitle, 0, 1, 'C');
            $this->Ln(10);
        }
    }
    
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    
    function createTable($headers, $data, $orientation = 'portrait') {
        // Configurar márgenes según orientación
        $margin = $orientation === 'landscape' ? 15 : 20;
        $this->SetLeftMargin($margin);
        
        // Colores, ancho de línea y fuente
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial', 'B', 12);
        
        // Calcular ancho de columnas
        $numColumns = count($headers);
        $pageWidth = $orientation === 'landscape' ? 270 : 190;
        $colWidth = ($pageWidth - ($margin * 2)) / $numColumns;
        
        // Cabecera de la tabla
        foreach ($headers as $header) {
            $this->Cell($colWidth, 7, $header, 1, 0, 'C', true);
        }
        $this->Ln();
        
        // Datos de la tabla
        $this->SetFont('Arial', '', 10);
        $fill = false;
        foreach ($data as $row) {
            if ($this->GetY() > ($this->GetPageHeight() - 20)) {
                $this->AddPage();
            }
            
            foreach ($row as $cell) {
                $this->Cell($colWidth, 6, $cell, 'LR', 0, 'L', $fill);
            }
            $this->Ln();
            $fill = !$fill;
        }
        
        $this->Cell($colWidth * $numColumns, 0, '', 'T');
    }
}

// 4. Crear el PDF
$pdf = new MyPDF($pdfData['orientation'] === 'landscape' ? 'L' : 'P');
$pdf->AliasNbPages();

// Configurar título (USANDO EL MÉTODO CORRECTO)
if (isset($pdfData['title'])) {
    $pdf->SetTitle($pdfData['title']); // Usa SetTitle en lugar de setTitle
}

$pdf->AddPage();

// 5. Generar contenido
if ($pdfData['type'] === 'table' && isset($pdfData['headers']) && isset($pdfData['rows'])) {
    $pdf->createTable($pdfData['headers'], $pdfData['rows'], $pdfData['orientation']);
} else {
    die("Error: Datos de tabla incompletos");
}

// 6. Enviar el PDF
$pdf->Output('I', $fileName);
?>