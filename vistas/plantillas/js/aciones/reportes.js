$(document).on('click','#pdf_edad',function(){
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



  document.getElementById('pdf_edad').addEventListener('click', function() {
      exportTableToPDF('tablaEdadCantidad', {
          exportUrl: 'componentes/pdf/tuto2.php',
          fileName: 'reporte_edades.pdf',
          title: 'Reporte de edades - ' + new Date().toLocaleDateString(),
          orientation: 'landscape',
          action: 'download' // 'open' para abrir en nueva pestaña
      });
      
      // Opcional: Mostrar mensaje al usuario
  });
})
$(document).on('click','#pdf_cita',function(){
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



  document.getElementById('pdf_cita').addEventListener('click', function() {
      exportTableToPDF('tablaCita', {
          exportUrl: 'componentes/pdf/tuto2.php',
          fileName: 'Citas_en_espera.pdf',
          title: 'Reporte de en espera - ' + new Date().toLocaleDateString(),
          orientation: 'landscape',
          action: 'download' // 'open' para abrir en nueva pestaña
      });
      
      // Opcional: Mostrar mensaje al usuario
  });
})
$(document).on('click','#historialCita',function(){
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



  document.getElementById('historialCita').addEventListener('click', function() {
      exportTableToPDF('historialCitaTotal', {
          exportUrl: 'componentes/pdf/tuto2.php',
          fileName: 'historial_citas.pdf',
          title: 'Historial de Citas - ' + new Date().toLocaleDateString(),
          orientation: 'landscape',
          action: 'download' // 'open' para abrir en nueva pestaña
      });
      
      // Opcional: Mostrar mensaje al usuario
  });
})