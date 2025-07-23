import { server } from "./variables.js";

// Módulo de Utilidades
const Utils = {
    /**
     * Muestra un mensaje de error con SweetAlert
     * @param {string} mensaje - Mensaje a mostrar
     */
    mostrarError: function(mensaje) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: mensaje,
        });
    },

    /**
     * Muestra un mensaje de éxito con SweetAlert
     * @param {string} titulo - Título del mensaje
     * @param {string} texto - Texto del mensaje
     * @param {function} callback - Función a ejecutar después
     */
    mostrarExito: function(titulo, texto, callback = null) {
        Swal.fire({
            type: 'success',
            title: titulo,
            text: texto,
        }).then(() => {
            if (callback && typeof callback === 'function') {
                callback();
            }
        });
    },

    /**
     * Valida un campo del formulario
     * @param {string} selector - Selector del campo
     * @param {boolean} condicion - Condición de error
     * @param {string} mensaje - Mensaje de error
     * @returns {boolean} - True si el campo es válido
     */
    validarCampo: function(selector, condicion, mensaje = '') {
        if (condicion) {
            $(selector).addClass('is-invalid');
            return false;
        }
        $(selector).removeClass('is-invalid');
        return true;
    }
};

// Módulo de Validación
const Validator = {
    /**
     * Inicializa los mensajes de error
     */
    inicializarMensajes: function() {
        $('#cedulaUsuario').after('<div class="invalid-feedback">La cédula solo puede contener números (6-10 dígitos)</div>');
        $('#fecha_nacimiento').after('<div class="invalid-feedback">La fecha debe ser anterior a hoy</div>');
        $('#telefonoUsuario').after('<div class="invalid-feedback">Ingrese un número de teléfono válido</div>');
    },

    /**
     * Valida la cédula
     * @returns {boolean} - True si la cédula es válida
     */
    validarCedula: function() {
        const cedula = $('#cedulaUsuario').val().trim();
        const condicion = cedula.length < 6 || cedula.length > 10 || !/^\d+$/.test(cedula);
        return Utils.validarCampo('#cedulaUsuario', condicion);
    },

    /**
     * Valida la fecha de nacimiento
     * @returns {boolean} - True si la fecha es válida
     */
    validarFechaNacimiento: function() {
        const fechaNacimiento = new Date($('#fecha_nacimiento').val());
        const hoy = new Date();
        hoy.setHours(0, 0, 0, 0);
        const condicion = !$('#fecha_nacimiento').val() || fechaNacimiento >= hoy;
        return Utils.validarCampo('#fecha_nacimiento', condicion);
    },

    /**
     * Valida el teléfono
     * @returns {boolean} - True si el teléfono es válido
     */
    validarTelefono: function() {
        const telefono = $('#telefonoUsuario').val().trim();
        const condicion = telefono === '' || !/^\d+$/.test(telefono);
        return Utils.validarCampo('#telefonoUsuario', condicion);
    },

    /**
     * Valida todo el formulario
     * @returns {boolean} - True si el formulario es válido
     */
    validarFormulario: function() {
        let valido = true;
        
        // Validar campos básicos
        valido = Utils.validarCampo('#nombreUsuario', $('#nombreUsuario').val().trim() === '') && valido;
        valido = Utils.validarCampo('#apellidoUsuario', $('#apellidoUsuario').val().trim() === '') && valido;
        valido = this.validarCedula() && valido;
        valido = this.validarTelefono() && valido;
        valido = this.validarFechaNacimiento() && valido;
        valido = Utils.validarCampo('#idUsuario', $('#idUsuario').val().trim() === '') && valido;
        valido = Utils.validarCampo('#clave', $('#clave').val().trim() === '') && valido;

        return valido;
    },

    /**
     * Configura la validación en tiempo real
     */
    configurarValidacionTiempoReal: function() {
        // Validación en tiempo real para campos numéricos
        $('#cedulaUsuario, #telefonoUsuario').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            Validator.validarFormulario();
        });

        // Validación en tiempo real para otros campos
        $('#nombreUsuario, #apellidoUsuario, #fecha_nacimiento, #idUsuario, #clave').on('input', function() {
            Validator.validarFormulario();
        });
    }
};

// Módulo de Usuarios
const UsuarioController = {
    /**
     * Registra un nuevo usuario
     * @param {Event} e - Evento del formulario
     */
    registrar: function(e) {
        e.preventDefault();

        if (!Validator.validarFormulario()) {
            return false;
        }

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
                    Utils.mostrarExito('Éxito', 'Se ha registrado exitosamente', () => {
                        $('#registrarUsuario')[0].reset();
                        location.reload();
                    });
                } else {
                    Utils.mostrarError('Por favor verifique los datos');
                }
            })
            .fail(function() {
                Utils.mostrarError('Error en la conexión con el servidor');
            });
    },

    /**
     * Muestra la información de un usuario
     */
    verInfo: function() {
        const userId = $(this).val();
        $('#modalInfoUsuario').modal('show');

        $.ajax({
            url: 'ajax/usuarioAjax.php',
            type: 'POST',
            data: {
                'action': 'obtener_usuario',
                'id': userId
            },
            dataType: 'json',
            success: function(response) {
                if(response) {
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
                    $('#modalUsernameUsuario').text(response[0].UsarioNombre || 'No disponible');
                    $('#modalUsernameClave').text(response[0].UsuarioClave || 'No disponible');
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
    },

    /**
     * Elimina un usuario
     */
    eliminar: function() {
        const cedula_usuario = $(this).val();
          console.log(cedula_usuario)
        Swal.fire({
            type: 'warning',
            title: '¿Desabilitar usuario?',
            text: '¿Está seguro que desea eliminar este usuario?',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#d33'
        }).then((result) => {
            if(result.value) {
                $.ajax({
                    type: 'POST',
                    url: `ajax/usuarioAjax.php`,
                    data: {
                        'eliminarUsuario': true,
                        'idUsuario': cedula_usuario
                    },
                    success: function(respuesta) {
                        if(respuesta == 1) {
                            Utils.mostrarExito('Eliminado', 'El usuario ha sido eliminado correctamente', () => {
                                location.reload();
                            });
                        } else {
                            Utils.mostrarError('No se pudo eliminar el usuario');
                        }
                    },
                    error: function() {
                        Utils.mostrarError('Error en la conexión con el servidor');
                    }
                });
            }
        });
    },
habilitar: function() {
    const cedula_usuario = $(this).val();
      console.log(cedula_usuario)
    Swal.fire({
        type: 'warning',
        title: '¿Habilitar usuario?',
        text: '¿Está seguro que desea habilitadar este usuario?',
        showCancelButton: true,
        confirmButtonText: 'Sí, habilitar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#d33'
    }).then((result) => {
        if(result.value) {
            $.ajax({
                type: 'POST',
                url: `ajax/usuarioAjax.php`,
                data: {
                    'habilitarUsuario': true,
                    'idUsuario': cedula_usuario
                },
                success: function(respuesta) {
                    if(respuesta == 1) {
                        Utils.mostrarExito('Eliminado', 'El usuario ha sido habilitado correctamente', () => {
                            location.reload();
                        });
                    } else {
                        Utils.mostrarError('No se pudo eliminar el usuario');
                    }
                },
                error: function() {
                    Utils.mostrarError('Error en la conexión con el servidor');
                }
            });
        }
    });
}
};
// Inicialización de la aplicación
$(document).ready(function() {
    // Configurar validación
    Validator.inicializarMensajes();
    Validator.configurarValidacionTiempoReal();
    Validator.validarFormulario();

    // Configurar eventos
    $(document).on('submit', '#registrarUsuario', UsuarioController.registrar);
    $(document).on('click', '#verUsuarioBtn', UsuarioController.verInfo);
    $(document).on('click', '#eliminarUsuario', UsuarioController.eliminar);
    $(document).on('click', '#habilitarUsuario', UsuarioController.habilitar);
    $(document).on('click', '#actualizarUsuarioBtn', function() {
        const userId = $(this).val();
        $('#modalActualizarUsuario').modal('show'); 
        console.log(userId)
    
        $.ajax({
            url: 'ajax/usuarioAjax.php',
            type: 'POST',
            data: {
                'action': 'obtener_usuario',
                'id': userId
            },
            dataType: 'json',
            success: function(response) {
                if(response) {
                    // Llenar el formulario con los datos del usuario
                    $('#actualizarUsuarioId').val(response[0].id_usuario);
                    $('#actualizarNombres').val(response[0].nombres);
                    $('#actualizarApellido').val(response[0].apellido);
                    $('#actualizarCedula').val(response[0].cedula);
                    $('#actualizarTelefono').val(response[0].telefono);
                    $('#actualizarCorreo').val(response[0].correo);
                    $('#actualizarFechaNacimiento').val(response[0].fecha_nacimiento);
                    $('#actualizarSexo').val(response[0].sexo);
                    $('#actualizarRol').val(response[0].rol);
                    $('#actualizarParroquia').val(response[0].parroquia);
                    $('#actualizarMunicipio').val(response[0].municipio);
                    $('#actualizarEtnia').val(response[0].etnia);
                    $('#actualizarDiscapacidad').val(response[0].discapacidad);
                    $('#actualizarNacionalidad').val(response[0].nacionalidad);
                    $('#actualizarUsername').val(response[0].UsarioNombre);
                    $('#actualizarClave').val(response[0].UsuarioClave);
                    
                    // Aquí puedes cargar los selects de estado, municipio, etc. si es necesario
                } else {
                    Swal.fire('Error', 'No se pudo cargar la información del usuario', 'error');
                    $('#modalActualizarUsuario').modal('hide');
                }
            },
            error: function() {
                Swal.fire('Error', 'Error al cargar la información del usuario', 'error');
                $('#modalActualizarUsuario').modal('hide');
            }
        });
    });
    
    // Manejar el envío del formulario
    $('#formActualizarUsuario').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: 'ajax/usuarioAjax.php',
            type: 'POST',
            data: $(this).serialize() + '&action=actualizar_usuario',
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    Swal.fire('Éxito', response.message, 'success');
                    $('#modalActualizarUsuario').modal('hide');
                    // Recargar la tabla o lista de usuarios si es necesario
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Error al actualizar el usuario', 'error');
            }
        });
    });
});