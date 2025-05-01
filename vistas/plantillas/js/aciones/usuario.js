import { server } from "./variables.js";

$(document).ready(function() {
    // 1. Registrar nuevo usuario
    $(document).on('submit', '#registrarUsuario', registrarUsuario);

    // 2. Ver información del usuario
    $(document).on('click', '#verUsuarioBtn', verUsuario);

    // 3. Eliminar usuario
    $(document).on('click', '#eliminarUsuario', eliminarUsuario);
});

/**
 * Función para registrar un nuevo usuario
 */
function registrarUsuario(e) {
    e.preventDefault();

    const usuario = {
        nombre: $('#nombreUsuario').val(),
        apellido: $('#apellidoUsuario').val(),
        cedula: $('#cedulaUsuario').val(),
        telefono: $('#telefonoUsuario').val(),
        fecha_nacimiento: $('#fecha_nacimiento').val(),
        sexo: $('#sexo').val(),
        usuario: $("#idUsuario").val(),
        clave: $('#clave').val(),
        rol: $('#rol').val()
    };

    $.post(`${server}ajax/usuarioAjax.php`, usuario)
        .done(function(respuesta) {
            if(respuesta == "1") {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se ha registrado exitosamente',
                }).then(() => {
                    $('#registrarUsuario')[0].reset();
                });
            } else {
                mostrarError('Por favor verifique los datos');
            }
        })
        .fail(function() {
            mostrarError('Error en la conexión con el servidor');
        });
}

/**
 * Función para ver información detallada de un usuario
 */
function verUsuario() {
    const userId = $(this).val();

    console.log(userId);

    // Mostrar spinner de carga (asumo que tienes un mecanismo para esto en el modal)
    $('#modalInfoUsuario').modal('show');
// Puedes personalizar el mensaje de carga

    // Obtener datos del usuario
    $.ajax({
        url: 'ajax/usuarioAjax.php',
        type: 'POST',
        data: {
            'action': 'obtener_usuario',
            'id': userId
        },
        dataType: 'json', // **Importante:** Esperamos una respuesta JSON
        success: function(response) {
            console.log(response);
            if(response) {
                // **Corrección:** Asignamos los valores directamente desde el objeto 'response'
                $('#modalNombreUsuario').text(response[0].nombres || 'No disponible');
                $('#modalApellidoUsuario').text(response[0].apellido || 'No disponible');
                $('#modalCedulaUsuario').text(response[0].cedula || 'No disponible');
                $('#modalTelefonoUsuario').text(response[0].telefono || 'No disponible');
                $('#modalCorreoUsuario').text(response[0].correo || 'No disponible');
                $('#modalFechaNacimientoUsuario').text(response[0].fecha_nacimiento || 'No disponible');
                $('#modalSexoUsuario').text(response[0].sexo || 'No disponible');
                $('#modalRolUsuario').text(response[0].rol || 'No disponible');
                $('#modalParroquiaUsuario').text(response[0].parroquia || 'No disponible');
                $('#modalMunicipioUsuario').text(response[0].municipio || 'No disponible');
                $('#modalEtniaUsuario').text(response[0].etnia || 'No disponible');
                $('#modalDiscapacidadUsuario').text(response[0].discapacidad || 'No disponible');
            } else {
                $('#modalInfoUsuario .modal-body').html(`
                    <div class="alert alert-danger">
                        No se encontró información del usuario
                    </div>
                `);
            }
        },
        error: function() {
            $('#modalInfoUsuario .modal-body').html(`
                <div class="alert alert-danger">
                    Error al cargar la información del usuario
                </div>
            `);
        }

    });
}

/**
 * Función para eliminar un usuario
 */
function eliminarUsuario() {
    const cedula_usuario = $(this).val();

    Swal.fire({
        icon: 'warning',
        title: '¿Eliminar usuario?',
        text: '¿Está seguro que desea eliminar este usuario?',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#d33'
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: `${server}ajax/usuarioAjax.php`,
                data: {
                    'eliminarUsuario': true,
                    'cedula_usuario': cedula_usuario
                },
                success: function(respuesta) {
                    if(respuesta == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            text: 'El usuario ha sido eliminado correctamente',
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        mostrarError('No se pudo eliminar el usuario');
                    }
                },
                error: function() {
                    mostrarError('Error en la conexión con el servidor');
                }
            });
        }
    });
}

/**
 * Función auxiliar para mostrar errores
 */
function mostrarError(mensaje) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: mensaje,
    });
}