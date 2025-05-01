

document.getElementById('historialCitaPDf').addEventListener('click', async () => {
    console.log('Generando PDF...hoistorial');
    try {
        Swal.fire({
            title: 'Generando PDF',
            html: 'Preparando datos...',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        // Obtener datos de la tabla REAL (8 columnas)
        const tabla = document.getElementById('historialCitaTotal'); // Cambiado a tu tabla real
        const filas = tabla.querySelectorAll('tbody tr');
        
        const datos = {
            encabezados: [
                'N°', 
                'Nombre y Apellido', 
                'Cédula', 
                'Especialidad', 
                'Especialista', 
                'Fecha Atención', 
                'Fecha Registro', 
                'Funcionario'
            ],
            filas: []
        };

        // Procesar filas (8 columnas)
        filas.forEach((fila, index) => {
            const celdas = fila.querySelectorAll('td');
            if (celdas.length >= 8) { // Ajustado a 8 columnas
                datos.filas.push([
                    (index + 1).toString(), // N° automático
                    celdas[1].textContent.trim(),
                    celdas[2].textContent.trim(),
                    celdas[3].textContent.trim(),
                    celdas[4].textContent.trim(),
                    celdas[5].textContent.trim(),
                    celdas[6].textContent.trim(),
                    celdas[7].textContent.trim()
                ]);
            }
        });

        // Enviar al servidor
        const response = await fetch('componentes/pdf/tuto3.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datos) // Enviamos directamente la estructura que PHP espera
        });

        // Manejar respuesta
        if (!response.ok) throw new Error(await response.text());
        
        const blob = await response.blob();
        const url = URL.createObjectURL(blob);
        
        // Descarga forzada
        const link = document.createElement('a');
        link.href = url;
        link.download = 'reporte_citas_' + new Date().toISOString().slice(0, 10) + '.pdf';
        link.click();
        
        Swal.close();
    } catch (error) {
        Swal.fire('Error', 'Error al generar PDF: ' + error.message, 'error');
        console.error('Detalle del error:', error);
    }
});