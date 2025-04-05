$(document).ready(function(){
        // Función para exportar a PDF
        function exportToPDF(options) {
            // Validación básica
            if (!options.exportUrl) {
                console.error('Se requiere la URL del endpoint PHP');
                return;
            }

            // Crear formulario dinámico
            const form = document.createElement('form');
            form.style.display = 'none';
            form.method = 'POST';
            form.action = options.exportUrl;
            form.target = options.action === 'open' ? '_blank' : '_self';

            // Añadir datos como inputs ocultos
            const addHiddenInput = (name, value) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = typeof value === 'object' ? JSON.stringify(value) : value;
                form.appendChild(input);
            };

            addHiddenInput('pdfData', options.data || {});
            addHiddenInput('fileName', options.fileName || 'documento.pdf');

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }

        // Función específica para exportar tablas
        function exportTableToPDF(tableId, options = {}) {
            const table = document.getElementById(tableId);
            if (!table) {
                console.error(`No se encontró la tabla con ID: ${tableId}`);
                return;
            }

            // Extraer datos de la tabla
            const headers = [];
            const rows = [];

            // Obtener encabezados (th)
            const headerCells = table.querySelectorAll('thead th');
            headerCells.forEach(th => headers.push(th.textContent.trim()));

            // Obtener filas de datos (td)
            const dataRows = table.querySelectorAll('tbody tr');
            dataRows.forEach(tr => {
                const row = [];
                tr.querySelectorAll('td').forEach(td => row.push(td.textContent.trim()));
                rows.push(row);
            });

            // Configurar opciones para el PDF
            const pdfOptions = {
                exportUrl: options.exportUrl || 'componentes/pdf/tuto2.php',
                fileName: options.fileName || 'tabla-exportada.pdf',
                action: options.action || 'download',
                data: {
                    title: options.title || 'Tabla Exportada',
                    type: 'table',
                    headers: headers,
                    rows: rows,
                    orientation: options.orientation || 'portrait'
                }
            };

            exportToPDF(pdfOptions);
        }

        // Evento click para el botón
        document.getElementById('btn-generar-pdf').addEventListener('click', function() {
            exportTableToPDF('tablaCitaCantidad', {
                exportUrl: 'componentes/pdf/tuto2.php',
                fileName: 'reporte_citas_por_especialidad.pdf',
                title: 'Reporte de Citas por Especialidad - ' + new Date().toLocaleDateString(),
                orientation: 'landscape',
                action: 'download' // 'open' para abrir en nueva pestaña
            });
            
            // Opcional: Mostrar mensaje al usuario
            alert('El PDF se está generando. Por favor espere...');
        });

        document.getElementById('pdf_edad').addEventListener('click', function() {
            exportTableToPDF('tablaEdadCantidad', {
                exportUrl: 'componentes/pdf/tuto2.php',
                fileName: 'reporte_edades.pdf',
                title: 'Reporte de edades - ' + new Date().toLocaleDateString(),
                orientation: 'landscape',
                action: 'download' // 'open' para abrir en nueva pestaña
            });
            
            // Opcional: Mostrar mensaje al usuario
            alert('El PDF se está generando. Por favor espere...');
        });
    })