<?php
require('fpdf.php');

// 1. Limpieza extrema de buffers
while (ob_get_level()) ob_end_clean();

// 2. Headers indestructibles
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="reporte_citas.pdf"');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');

// 3. Validación estricta
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die(json_encode(['error' => 'Método no permitido']));
}

$input = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die(json_encode(['error' => 'JSON inválido']));
}

try {
    $pdf = new FPDF('L'); // Orientación horizontal
    $pdf->AddPage();
    
    // 4. Configuración de columnas (8 columnas)
    $anchos = [10, 45, 25, 50, 40, 35, 30, 50];
    
    // Encabezados
    $pdf->SetFont('Arial', 'B', 10);
    foreach ($input['encabezados'] as $i => $col) {
        $pdf->Cell($anchos[$i], 8, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $col), 1, 0, 'C');
    }
    $pdf->Ln();
    
    // Datos
    $pdf->SetFont('Arial', '', 9);
    foreach ($input['filas'] as $fila) {
        foreach ($fila as $i => $valor) {
            $pdf->Cell(
                $anchos[$i], 
                7, 
                iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $valor), 
                1, 
                0, 
                $i === 0 ? 'C' : 'L' // N° centrado, resto alineado izquierda
            );
        }
        $pdf->Ln();
    }
    
    // 5. Generación final
    $pdf->Output('D');
    exit;
    
} catch (Exception $e) {
    header('Content-Type: application/json');
    die(json_encode(['error' => $e->getMessage()]));
}
?>