console.log('holamundo');

$(document).on('click', '#ParroquiaBoton', function(event) {
    event.preventDefault(); // Prevenir el envío tradicional del formulario
    
    // Validación básica
    const nombreParroquia = $('#ParroquiaInput').val().trim();
    const idMunicipio = $('#municipioInput').val();
    
    if (!nombreParroquia) {
        Swal.fire({
            type: 'warning',
            title: 'Campo vacío',
            text: 'Por favor ingresa el nombre de la parroquia'
        });
        return;
    }
    
    if (idMunicipio === "0") {
        Swal.fire({
            type: 'warning',
            title: 'Selección requerida',
            text: 'Por favor selecciona un municipio'
        });
        return;
    }

    const datos = {
        nuevaParroquia: true,
        nombreParroquia: nombreParroquia,
        idMunicipio: idMunicipio
    };

    $.ajax({
        url: 'ajax/ConfiguracionAjax.php',
        type: 'POST',
        data: datos,
        success: function(respuesta) {
            console.log(datos);
            console.log(respuesta);
            if (respuesta == "1") {
                Swal.fire({
                    type: 'success',
                    title: 'Éxito',
                    text: 'Se ha guardado correctamente'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar la parroquia'
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Error en la conexión: ' + error
            });
        }
    });
});
  /*-----------------------------------------------
  -------------------------------------------------
  -------------------------------------------------
  _________________________________________________
  */ 
  $('#DiscapacidadNew').on('submit', function(event) {
    event.preventDefault();
    const datos = {
        nuevaDiscapcidad: true,
        nombreDiscapcidad: $('#discapaciadInput').val() // Agrega .val() aquí
    };

    $.ajax({
        url: 'ajax/ConfiguracionAjax.php',
        type: 'POST',
        data: datos,
        success: function(respuesta) {
            console.log(respuesta);
            if(respuesta == "1") {
                Swal.fire({
                    type: 'success',
                    title: 'Éxito',
                    text: 'Se ha guardado correctamente'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'No se pudo actualizar el área'
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Error en la conexión: ' + error
            });
        }
    });
});
  //------------------------------------------------------------
  //------------------------------------------------------------
  //------------------------------------------------------------
  //------------------------------------------------------------
  $('#EtniaNew').on('submit', function(event) {
    event.preventDefault(); // Prevenir el envío tradicional del formulario
    
    // Obtener y validar el valor del input
    const nombreEtnia = $('#EtniaInput').val().trim();
    
    // Validación básica
    if (!nombreEtnia) {
        Swal.fire({
            type: 'warning',
            title: 'Campo vacío',
            text: 'Por favor ingresa el nombre de la etnia'
        });
        return;
    }

    // Deshabilitar el botón para evitar múltiples envíos
    const submitBtn = $('#EtniaBoton');
    submitBtn.prop('disabled', true);
    submitBtn.html('<i class="fa fa-spinner fa-spin"></i> Procesando...');

    // Preparar datos para enviar
    const datos = {
        nuevaEtnia: true,
        nombreEtnia: nombreEtnia
    };

    // Enviar datos via AJAX
    $.ajax({
        url: 'ajax/ConfiguracionAjax.php',
        type: 'POST',
        data: datos,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "1") {
                Swal.fire({
                    type: 'success',
                    title: 'Éxito',
                    text: 'Etnia registrada correctamente'
                }).then(() => {
                    location.reload(); // Recargar la página
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: respuesta || 'No se pudo registrar la etnia'
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                type: 'error',
                title: 'Error de conexión',
                text: 'Ocurrió un error al intentar registrar: ' + error
            });
        },
        complete: function() {
            // Rehabilitar el botón
            submitBtn.prop('disabled', false);
            submitBtn.text('Registrar');
        }
    });
});
$(document).on('click', '#actualizarEtnia', function() {
    // Obtener los datos de la etnia (ejemplo con datos en atributos data)
    const idEtnia = $(this).data('id');
    const nombreEtnia = $(this).data('nombre');
    
    // Llenar el formulario del modal
    $('#idEtniaEditar').val(idEtnia);
    $('#nombreEtniaEditar').val(nombreEtnia);
    
    // Mostrar el modal
    $('#modalEditarEtnia').modal('show');
});

// Evento para enviar el formulario de edición
$('#formEditarEtnia').on('submit', function(e) {
    e.preventDefault();
    
    // Obtener los datos del formulario
    const idEtnia = $('#idEtniaEditar').val();
    const nombreEtnia = $('#nombreEtniaEditar').val();
    
    // Aquí iría tu AJAX para actualizar la etnia
    $.ajax({
        url: 'ajax/ConfiguracionAjax.php',
        type: 'POST',
        data: {
            id: idEtnia,
            nombre: nombreEtnia,
            actualizarEtnia:true
        },
        success: function(response) {
            if(response === '1') {
                // Actualización exitosa
                $('#modalEditarEtnia').modal('hide');
                // Recargar o actualizar la tabla/listado
                location.reload(); // o tu función para actualizar la vista
                Swal.fire('Éxito', 'Etnia actualizada correctamente', 'success');
            } else {
                Swal.fire('Error', 'No se pudo actualizar la etnia', 'error');
            }
        },
        error: function() {
            Swal.fire('Error', 'Ocurrió un error al comunicarse con el servidor', 'error');
        }
    });
});

    // =============================================
    // Controlador para Discapacidad
    // =============================================
    $(document).on('click', '.btn-editar-discapacidad', function() {
        const id = $(this).data('id');
        const nombre = $(this).data('nombre');

        console.log(id,nombre)
        
        $('#idDiscapacidadEditar').val(id);
        $('#nombreDiscapacidadEditar').val(nombre);
        $('#modalEditarDiscapacidad').modal('show');
    });
    
    $('#formEditarDiscapacidad').on('submit', function(e) {
        e.preventDefault();
        
        const datos = {
            id: $('#idDiscapacidadEditar').val(),
            nombre: $('#nombreDiscapacidadEditar').val(),
            actualizarDiscapaciad: true
        };
        
        enviarDatos('ajax/ConfiguracionAjax.php', datos, '#modalEditarDiscapacidad');
    });
    
    // =============================================
    // Controlador para Parroquia
    // =============================================
    $(document).on('click', '.btn-editar-parroquia', function() {
        const id = $(this).data('id');
        const nombre = $(this).data('nombre');
        const idMunicipio = $(this).data('municipio');
        
        $('#idParroquiaEditar').val(id);
        $('#nombreParroquiaEditar').val(nombre);
        $('#municipioParroquiaEditar').val(idMunicipio);
        
        $('#modalEditarParroquia').modal('show');
    });
    
    $('#formEditarParroquia').on('submit', function(e) {
        e.preventDefault();
        
        const datos = {
            id: $('#idParroquiaEditar').val(),
            nombre: $('#nombreParroquiaEditar').val(),
            id_municipio: $('#municipioParroquiaEditar').val(),
            actualizarParroquia: true
        };
        console.log(datos)
        enviarDatos('ajax/ConfiguracionAjax.php', datos, '#modalEditarParroquia');
    });
    
    // Función genérica para enviar datos
    function enviarDatos(url, datos, modal) {
        $.ajax({
            url: url,
            type: 'POST',
            data: datos,
            success: function(response) {
                if(response === '1') {
                    $(modal).modal('hide');
                    Swal.fire('Éxito', 'Cambios guardados correctamente', 'success');
                    // Recargar o actualizar la tabla
                    setTimeout(() => location.reload(), 1500);
                } else {
                    Swal.fire('Error', 'No se pudieron guardar los cambios', 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Error de conexión con el servidor', 'error');
            }
        });
    }
    
