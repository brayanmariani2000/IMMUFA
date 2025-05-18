/**
 * Función para exportar datos a PDF usando FPDF
 * @param {string} tableId - ID de la tabla a exportar
 * @param {string} title - Título del reporte PDF
 * @param {string} type - Tipo de reporte (municipios, dependencias, edades, especialidades)
 */
document.addEventListener('DOMContentLoaded', function() {
    // Tu código de asignación de eventos aquí
    document.getElementById('exportPDFEdades')?.addEventListener('click', function() {
        exportToPDF('#tablaEdades', 'Reporte de edades de pacientes', 'edades');
    });
    
    document.getElementById('exportarPdfEspecialidad')?.addEventListener('click', function() {
        exportToPDF('#tablaEspecialidadesPdf', 'Reporte por especialidades', 'especialidades');
    });
    
    document.getElementById('exportPDFDependencias')?.addEventListener('click', function() {
        exportToPDF('#tablaDependenciasPDF', 'Reporte por dependencias', 'dependencias');
    });
    
    document.getElementById('pdf_municipios')?.addEventListener('click', function() {
        exportToPDF('#tablaPacientesPorMunicipioPDF', 'Reporte por municipios', 'municipios');
    });
    document.getElementById('exportPDFDiscapacidades')?.addEventListener('click', function() {
        exportToPDF('#tablaPacientesPorDiscapacidadPDF', 'Reporte por discapacidades', 'discapacidad');
    });
    document.getElementById('exportPDFEtnias')?.addEventListener('click', function() {
        exportToPDF('#tablaPacientesPorEtniaPDF', 'Reporte por Etnias', 'etnias');
    });
});
function exportToPDF(tableId, title, type) {
    // Mostrar loader
    Swal.fire({
        title: 'Generando PDF',
        html: 'Por favor espere mientras se prepara el documento...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Recolectar datos de la tabla
    const table = document.querySelector(tableId);
    const rows = Array.from(table.querySelectorAll('tbody tr'));
    
    const data = rows.map(row => {
        const cells = Array.from(row.querySelectorAll('td'));
        return {
            col1: cells[0]?.textContent.trim() || '',
            col2: cells[1]?.textContent.trim() || '',
            col3: cells[2]?.textContent.trim() || ''
        };
    });

    // Obtener totales si existen
    const footerRow = table.querySelector('tfoot tr');
    let footerData = null;
    if (footerRow) {
        const footerCells = Array.from(footerRow.querySelectorAll('td'));
        footerData = {
            col1: footerCells[0]?.textContent.trim() || '',
            col2: footerCells[1]?.textContent.trim() || '',
            col3: footerCells[2]?.textContent.trim() || ''
        };
    }

    // Enviar datos al servidor
    fetch('componentes/pdf/tuto3.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            type: type,
            title: title,
            data: data,
            footer: footerData,
            fecha: new Date().toLocaleDateString('es-ES', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            })
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la generación del PDF');
        }
        return response.blob();
    })
    .then(blob => {
        // Crear enlace de descarga
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `${title}_${new Date().toISOString().slice(0,10)}.pdf`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
        
        Swal.fire({
            icon: 'success',
            title: 'PDF generado',
            text: 'El archivo se ha descargado correctamente',
            timer: 2000,
            showConfirmButton: false
        });
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error al generar el PDF',
            footer: error.message
        });
    });
}

// Modifica las llamadas para que cada tipo sea único y los títulos correspondan

// Asignar eventos para los otros botones de manera similar
// document.getElementById('exportPDFDependencias').addEventListener('click', ...);
// document.getElementById('exportPDFMunicipios').addEventListener('click', ...);
// document.getElementById('exportPDFEspecialidades').addEventListener('click', ...);