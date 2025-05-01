document.getElementById('pdf_cita').addEventListener('click', async () => {
    try {
        // Mostrar mensaje de carga
        Swal.fire({
            title: 'Generando PDF',
            text: 'Por favor, espere...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        // Obtener datos de la tabla
        const tabla = document.getElementById('tablaCita');
        const filas = tabla.querySelectorAll('tbody tr');
        
        const datos = {
            metadatos: {
                título: 'Reporte de Citas',
                autor: 'Sistema de Citas',
                generadoEl: new Date().toLocaleDateString('es-ES', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                })
            },
            contenido: {
                tipo: 'tabla',
                datos: {
                    encabezados: ['N°', 'Nombre y Apellido', 'Cédula', 'Área de Consulta', 'Fecha Programada', 'Observación'],
                    filas: []
                }
            }
        };

        // Procesar filas (celda 5 vacía)
        filas.forEach(fila => {
            const celdas = fila.querySelectorAll('td');
            if (celdas.length >= 6) {
                datos.contenido.datos.filas.push([
                    celdas[0].textContent.trim(),  // N°
                    celdas[1].textContent.trim(), // Nombre
                    celdas[2].textContent.trim(), // Cédula
                    celdas[3].textContent.trim(), // Área
                    celdas[4].textContent.trim(), // Fecha
                    ''                           // Observación (vacía)
                ]);
            }
        });

        // Enviar datos al servidor
        const response = await fetch('componentes/pdf/tuto2.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datos)
        });

        if (!response.ok) {
            throw new Error('Error en el servidor: ' + response.status);
        }

        // Mostrar PDF en nueva pestaña
        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        window.open(url, '_blank');

        Swal.close();
    } catch (error) {
        console.error('Error:', error);
        Swal.fire('Error', 'No se pudo generar el PDF: ' + error.message, 'error');
    }
});

