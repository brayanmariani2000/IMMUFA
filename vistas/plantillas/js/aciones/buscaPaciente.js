import { server } from "./variables.js";

$(document).ready(function() {
    // Inicialización de variables
    const serverPath = window.server || server;

    // Evento de búsqueda para pacientes
    $('#buscarPaciente').keyup(handlePatientSearch);
    
    // Evento para registro de paciente
    
    // Evento para actualización de paciente
    $('#Actualizar_p_inicio').click(handlePatientUpdate);
    
    // Evento de búsqueda para historial de citas
    $('#buscarPacienteHistorial').keyup(handleAppointmentHistorySearch);

    // Manejador de búsqueda de pacientes
    function handlePatientSearch(e) {
        const searchTerm = $(this).val();
        
        $.ajax({
            type: 'POST',
            url: `${serverPath}ajax/verInfoPaciente.php`,
            data: {
                'BuscarPaciente': true,
                'buscar': searchTerm
            },
            success: function(response) {
                displayPatientResults(response);
            },
            error: handleSearchError
        });
    }

    // Manejador de actualización de paciente
    function handlePatientUpdate(e) {
        const patientId = $(this).val();
        console.log("hola actualizar");

        $.ajax({
            type: 'POST',
            url: `${serverPath}vistas/datosPaciente.php`,
            data: {
                'ver_paciente': true,
                'actualizar_paciente': patientId 
            }, 
            success: function() {
                window.location.href = `${serverPath}datosPaciente`;
            }
        });
    }

    // Manejador de búsqueda de historial de citas
    function handleAppointmentHistorySearch() {
        const searchTerm = $(this).val().trim();
        
            $.ajax({
                url: `${serverPath}ajax/verInfoPaciente.php`,
                type: 'POST',
                data: { 
                    action: 'buscar_historial_citas',
                    buscar: searchTerm
                },
                beforeSend: showLoadingSpinner('#historialCitaTotal tbody'),
                success: function(response) {
                    displayAppointmentHistoryResults(response);
                },
                error: handleSearchError
            });
    }

    // Función para mostrar resultados de pacientes
    function displayPatientResults(response) {
        const patients = jQuery.parseJSON(response);
        let html = buildPatientTableHeader();
        let counter = 1;

        patients.forEach(patient => {
            html += buildPatientRow(patient, counter);
            counter++;
        });

        html += `</tbody></table>`;
        $('#buscarTabla').html(html);
    }

    // Función para construir encabezado de tabla de pacientes
    function buildPatientTableHeader() {
        return ` 
        <table class="table table-hover table-responsive" role="grid">
            <thead>
                <tr role="row">
                    <th rowspan="1" colspan="1">N°</th>
                    <th rowspan="1" colspan="1">Nombre y Apellido</th>
                    <th tabindex="0" aria-controls="example23" rowspan="1" colspan="1">Cedula</th>
                    <th tabindex="0" aria-controls="example23" rowspan="1" colspan="1"><center>accion</center></th>
                </tr>
            </thead>
            <tbody>`;
    }

    // Función para construir fila de paciente
    function buildPatientRow(patient, index) {
        return `
        <tr> 
            <td>${index}</td>
            <td>${patient.nombre} ${patient.apellido}</td>
            <td>${patient.cedula}</td>
            <td>
                <div style="display:flex;">
                    <form action="nuevaCita" method="post">
                        <button type="submit" class="btn btn-success" name="Nueva_Cita" value="${patient.id}" style="margin:5px;">
                            Nueva Cita
                        </button>
                    </form> 
                    <form action="datosPaciente" method="post">
                        <button type="submit" class="btn btn-info" name="verHistoria" value="${patient.id}" style="margin:5px;">
                            Ver Historial
                        </button>
                    </form> 
                </div>
            </td>
        </tr>`;
    }

    // Función para mostrar resultados de historial de citas
    function displayAppointmentHistoryResults(response) {
        const appointments = JSON.parse(response);
        let html = '';
        let counter = 1;

        if (appointments.length > 0) {
            appointments.forEach(appointment => {
                html += buildAppointmentRow(appointment, counter);
                counter++;
            });
        } else {
            html = buildNoResultsRow();
        }

        $('#historialCitaTotal tbody').html(html);
        updateResultsCounter(counter - 1);
    }

    // Función para construir fila de cita
    function buildAppointmentRow(appointment, index) {
        return `
        <tr>
            <td>${index}</td>
            <td>${appointment.nombre} ${appointment.apellido}</td>
            <td>${appointment.cedula}</td>
            <td>${appointment.especialidad}</td>
            <td>${appointment.medico_nombre} ${appointment.medico_apellido}</td>
            <td>${appointment.fecha_consulta} ${appointment.hora_consulta}</td>
            <td>${appointment.fecha_registro_formateada}</td>
            <td>${appointment.usuario}</td>
        </tr>`;
    }

    // Función para mostrar mensaje de no resultados
    function buildNoResultsRow() {
        return `
        <tr>
            <td colspan="8" class="text-center">
                No se encontraron resultados para la búsqueda
            </td>
        </tr>`;
    }

    // Función para mostrar spinner de carga
    function showLoadingSpinner(selector) {
        return function() {
            $(selector).html(`
                <tr>
                    <td colspan="8" class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Buscando...</span>
                        </div>
                    </td>
                </tr>
            `);
        };
    }

    // Función para manejar errores de búsqueda
    function handleSearchError() {
        $('#historialCitaTotal tbody').html(`
            <tr>
                <td colspan="8" class="text-center text-danger">
                    Error al realizar la búsqueda
                </td>
            </tr>
        `);
    }

    // Función para actualizar contador de resultados
    function updateResultsCounter(total) {
        $('#historialInfo').html(`Mostrando ${total} resultados`);
    }
});