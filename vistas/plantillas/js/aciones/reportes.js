/**
 * Función para exportar la tabla de citas por especialidad a PDF
 */
function exportCitasEspecialidadToPDF() {
    // Mostrar loader
    Swal.fire({
        title: 'Generando PDF',
        html: 'Preparando reporte de citas por especialidad...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Recolectar datos de la tabla
    const table = document.getElementById('especialidad');
    const rows = Array.from(table.querySelectorAll('tbody tr'));
    
    // Mapear los datos de cada fila
    const data = rows.map(row => {
        const cells = Array.from(row.querySelectorAll('td'));
        return {
            numero: cells[0]?.textContent.trim() || '',
            nombre: cells[1]?.textContent.trim() || '',
            cedula: cells[2]?.textContent.trim() || '',
            motivo: cells[3]?.textContent.trim() || '',
            fecha: cells[4]?.textContent.trim() || '',
            edad: cells[5]?.textContent.trim() || '',
            estado: cells[6]?.textContent.trim() || ''
        };
    });

    // Obtener título de la especialidad (puedes ajustar esto según tu necesidad)
    const tituloEspecialidad = document.querySelector('.card-title').textContent || 'Citas por Especialidad';

    // Enviar datos al servidor para generar PDF
    fetch('componentes/pdf/tuto4.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            type: 'citas_especialidad',
            title: tituloEspecialidad,
            data: data,
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
        a.download = `${tituloEspecialidad.replace(/\s+/g, '_')}_${new Date().toISOString().slice(0,10)}.pdf`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
        
        Swal.fire({
            type: 'success',
            title: 'PDF generado',
            text: 'El reporte de citas se ha descargado correctamente',
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

// Asignar evento al botón de exportación
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('expotarPDFCitaEspecialidad')?.addEventListener('click', exportCitasEspecialidadToPDF);
});