$(document).ready(function() {
    // Variables para almacenar los valores de los campos
    let especialidad = '';
    let especialista = '';
    let fechaCita = '';

    // Detectar cambios en el campo de especialidad
    $('#area_consultar').on('change', function() {
        especialidad = $(this).val(); // Obtener el valor seleccionado
        verificarCampos(); // Verificar si todos los campos están llenos
    });

    // Detectar cambios en el campo de especialista
    $('#especialista').on('change', function() {
        especialista = $(this).val(); // Obtener el valor seleccionado
        verificarCampos(); // Verificar si todos los campos están llenos
    });

    // Detectar cambios en el campo de fecha de la cita
    $('#fecha_consulta').on('change', function() {
        fechaCita = $(this).val(); // Obtener el valor seleccionado
        verificarCampos(); // Verificar si todos los campos están llenos
    });

    // Función para verificar si todos los campos están llenos
    function verificarCampos() {
        if (especialidad !== '' && especialista !== '' && fechaCita !== '') {
            // Todos los campos están llenos, realizar la petición AJAX
            realizarPeticionAJAX();
        }
    }

    // Función para realizar la petición AJAX
    function realizarPeticionAJAX() {
        // Datos que se enviarán al servidor
        const datos = {
            especialidad: especialidad,
            especialista: especialista,
            fecha_cita: fechaCita
        };

        // Realizar la petición AJAX
        $.ajax({
            url: 'contar_citas.php', // Ruta al archivo PHP que procesará la petición
            type: 'POST', // Método HTTP (POST en este caso)
            data: datos, // Datos que se enviarán al servidor
            dataType: 'json', // Tipo de respuesta esperada (JSON en este caso)
            success: function(response) {
                // Manejar la respuesta del servidor
                if (response.success) {
                    // La petición fue exitosa
                    alert('Total de citas para el día: ' + response.total_citas);
                } else {
                    // Hubo un error en la petición
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Manejar errores de la petición AJAX
                alert('Error en la petición AJAX: ' + error);
            }
        });
    }
});