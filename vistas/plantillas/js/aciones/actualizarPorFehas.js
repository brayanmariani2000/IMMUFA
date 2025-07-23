$(document).ready(function() {
    // Configuración de los formularios y sus contenedores
    const configForms = [
        {
            formId: 'filtroFechasDependencias',
            containerId: 'contenedorTablaDependencias',
            fechaInicioId: 'fechaInicio',
            fechaFinId: 'fechaFin',
            ajaxUrl: 'ajax/actualizarTablasFechas.php',
            tablaTipo: 'dependencias',  // Nuevo campo para identificar la tabla
            successMessage: 'Tabla de dependencias actualizada con éxito'
        },
        {
            formId: 'filtroFechasEspecialidad',
            containerId: 'contenedorTablaEspecialidad',
            fechaInicioId: 'fechaInicioEspecialidad',
            fechaFinId: 'fechaFinEspecialidad',
            ajaxUrl: 'ajax/actualizarTablasFechas.php',
            tablaTipo: 'especialidades',
            successMessage: 'Tabla de especialidades actualizada con éxito'
        },
        {
            formId: 'filtroFechasEdades',
            containerId: 'contenedorTablaEdades',
            fechaInicioId: 'fechaInicioEdades',
            fechaFinId: 'fechaFinEdades',
            ajaxUrl: 'ajax/actualizarTablasFechas.php',
            tablaTipo: 'edades',
            successMessage: 'Tabla de edades actualizada con éxito'
        },
        {
            formId: 'filtroFechasEtnia',
            containerId: 'contenedorTablaEtnia',
            fechaInicioId: 'fechaInicioEtnia',
            fechaFinId: 'fechaFinEtnia',
            ajaxUrl: 'ajax/actualizarTablasFechas.php',
            tablaTipo: 'etnias',
            successMessage: 'Tabla de etnias actualizada con éxito'
        },
        {
            formId: 'filtroFechasDiscapacidad',
            containerId: 'contenedorTablaDiscapacidad',
            fechaInicioId: 'fechaInicioDiscapacidad',
            fechaFinId: 'fechaFinDiscapacidad',
            ajaxUrl: 'ajax/actualizarTablasFechas.php',
            tablaTipo: 'discapacidades',
            successMessage: 'Tabla de discapacidades actualizada con éxito'
        },
        {
            formId: 'filtroFechasMunicipios',
            containerId: 'contenedorTablaMunicipios',
            fechaInicioId: 'fechaInicioMunicipios',
            fechaFinId: 'fechaFinMunicipios',
            ajaxUrl: 'ajax/actualizarTablasFechas.php',
            tablaTipo: 'municipios',
            successMessage: 'Tabla de municipios actualizada con éxito'
        },
        {
            formId: 'filtroFechasConsolidado',
            containerId: 'contenedorTablaConsolidado',
            fechaInicioId: 'fechaInicioConsolidado',
            fechaFinId: 'fechaFinConsolidado',
            ajaxUrl: 'ajax/actualizarTablasFechas.php',
            tablaTipo: 'Consolidado',
            successMessage: 'Tabla de Consolidado actualizada con éxito'
        }
    ];

    // Inicializar todos los formularios
    configForms.forEach(config => {
        initFilterForm(config);
        // Disparar el evento submit al cargar la página
        $(`#${config.formId}`).trigger('submit');
    });

    /**
     * Función para inicializar un formulario de filtrado
     * @param {Object} config - Configuración del formulario
     * @param {string} config.formId - ID del formulario
     * @param {string} config.containerId - ID del contenedor de resultados
     * @param {string} config.fechaInicioId - ID del input fecha inicio
     * @param {string} config.fechaFinId - ID del input fecha fin
     * @param {string} config.ajaxUrl - URL para la petición AJAX
     * @param {string} config.tablaTipo - Tipo de tabla a mostrar
     * @param {string} config.successMessage - Mensaje de éxito personalizado
     */
    function initFilterForm(config) {
        const $form = $(`#${config.formId}`);
        
        $form.on('submit', function(e) {
            e.preventDefault();
            
            // Obtener elementos del DOM
            const $contenedorTabla = $(`#${config.containerId}`);
            const $fechaInicio = $(`#${config.fechaInicioId}`);
            const $fechaFin = $(`#${config.fechaFinId}`);
            
            // Obtener fechas
            const fechaInicio = $fechaInicio.val();
            const fechaFin = $fechaFin.val();
            
            // Validar fechas
            if (!validarFechas(fechaInicio, fechaFin)) {
                return;
            }
            
            // Mostrar carga
            mostrarCarga($contenedorTabla);
            
            // Realizar petición AJAX
            $.ajax({
                url: config.ajaxUrl,
                type: 'POST',
                data: {
                    fechaInicio: fechaInicio,
                    fechaFin: fechaFin,
                    tablaTipo: config.tablaTipo  // Enviamos el tipo de tabla
                },
                success: function(html) {
                    // Actualizar la tabla con el nuevo HTML
                    $contenedorTabla.html(html);
                    
                    // Mostrar mensaje de éxito
                    mostrarAlerta(config.successMessage, 'success');
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    mostrarAlerta('Ocurrió un error al actualizar la tabla', 'danger');
                    // Restaurar contenido anterior en caso de error
                    $contenedorTabla.html('Error al cargar los datos. Intente nuevamente.');
                }
            });
        });
    }

    /**
     * Valida las fechas del formulario
     * @param {string} fechaInicio - Fecha de inicio
     * @param {string} fechaFin - Fecha de fin
     * @returns {boolean} - True si las fechas son válidas, False si no
     */
    function validarFechas(fechaInicio, fechaFin) {
        if (!fechaInicio || !fechaFin) {
            mostrarAlerta('Por favor seleccione ambas fechas', 'warning');
            return false;
        }
        
        if (new Date(fechaFin) < new Date(fechaInicio)) {
            mostrarAlerta('La fecha final debe ser mayor o igual a la fecha inicial', 'warning');
            return false;
        }
        
        return true;
    }

    /**
     * Muestra un spinner de carga en el contenedor
     * @param {jQuery} $container - Contenedor donde mostrar la carga
     */
    function mostrarCarga($container) {
        $container.html('<div class="text-center my-5"><div class="spinner-border text-primary" role="status"><span class="sr-only">Cargando...</span></div></div>');
    }

    /**
     * Muestra una alerta flotante
     * @param {string} mensaje - Mensaje a mostrar
     * @param {string} tipo - Tipo de alerta (success, warning, danger, etc.)
     */
    function mostrarAlerta(mensaje, tipo) {
        // Eliminar alertas anteriores
        $('.alert-flotante').remove();
        
        // Crear nueva alerta
        const alerta = $(`
            <div class="alert alert-${tipo} alert-dismissible fade show alert-flotante" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
                ${mensaje}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `);
        
        $('body').append(alerta);
        
        // Auto-eliminar después de 3 segundos
        setTimeout(() => {
            alerta.alert('close');
        }, 3000);
    }
});