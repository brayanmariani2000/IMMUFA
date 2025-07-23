$(document).on('click', '#exportPDFGeneral', function(e) {
    e.preventDefault();
    
    console.log('Iniciando exportación a PDF...');
    
    // Mostrar mensaje de carga
    Swal.fire({
        title: 'Generando Reporte',
        text: 'Preparando documento PDF...',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });

    // Función para extraer datos de las tablas
    function extractTableData(tableId, fields) {
        let data = [];
        $(`#${tableId} tbody tr:not(.table-info)`).each(function() {
            let row = {};
            $(this).find('td').each(function(index) {
                if (index < fields.length) {
                    row[fields[index]] = $(this).text().trim();
                }
            });
            if (Object.keys(row).length > 0) {
                data.push(row);
            }
        });
        return data;
    }

    // Recopilar todos los datos
    const reportData = {
        discapacidades: extractTableData('tablaPacientesPorDiscapacidadPDF', ['tipo_discapacidad', 'pacientes_atendidos']),
        edades: extractTableData('tablaEdades', ['rango_edad', 'total_pacientes']),
        municipios: extractTableData('tablaPacientesPorMunicipioPDF', ['nombre_municipio', 'numero_pacientes_atendidos']),
        especialidades: extractTableData('tablaEspecialidadesPdf', ['especialidad', 'cantidad_citas']),
        dependencias: extractTableData('tablaDependenciasPDF', ['nombre_dependencia', 'numero_pacientes'])
    };

    console.log('Datos a enviar:', reportData);

    // Enviar datos al servidor
    $.ajax({
        url: 'componentes/pdf/tuto5.php',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(reportData),
        processData: false,
        xhrFields: {
            responseType: 'blob'
        },
        success: function(response, status, xhr) {
            Swal.close();
            
            // Verificar si es un PDF
            const contentType = xhr.getResponseHeader('Content-Type');
            if (contentType === 'application/pdf') {
                const blob = new Blob([response], {type: 'application/pdf'});
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'Reporte_Consolidado_' + new Date().toISOString().slice(0, 10) + '.pdf';
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            } else {
                // Leer posible mensaje de error
                const reader = new FileReader();
                reader.onload = function() {
                    Swal.fire('Error', 'El servidor no devolvió un PDF válido', 'error');
                    console.error('Respuesta del servidor:', reader.result);
                };
                reader.readAsText(response);
            }
        },
        error: function(xhr, status, error) {
            Swal.close();
            Swal.fire('Error', 'Ocurrió un error al generar el PDF: ' + error, 'error');
            console.error('Error en la solicitud:', status, error, xhr.responseText);
        }
    });
});