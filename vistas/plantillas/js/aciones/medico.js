import { server } from "./variables.js";

$(document).ready(function() {
    // Consultar especialistas por área
    $('#area_consultar').click(function(e) {
        let area = $('#area_consultar').val();
        
        $.ajax({
            url: `${server}ajax/medicoAjax.php`,
            type: 'POST',
            data: {
                'especialistaCita': true,
                'especialidad': area
            },
            success: function(response) {
                let plantilla = '<option value="0">---SELECCIONE UNA OPCION---</option>';
                let especialista = JSON.parse(response);
                
                especialista.forEach(especialidad => {
                    if(area == especialidad.especialidades) {
                        plantilla += `<option value="${especialidad.value}">${especialidad.Nmedico} ${especialidad.Amedico}</option>`;
                    }
                });
                
                $('#especialista').html(plantilla);
            }
        });
    });

    // Registrar nuevo médico
    $('#medicoRegistro').submit(function(e) {
        e.preventDefault();
        
        const medico = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            cedula: $('#cedula').val(),
            telefono: $('#telefono').val(),
            correo: $("#correo").val(),
            sexo: $('#sexo_m').val(),
            especialidad: $('#especialidadM').val(),
            fecha_naci: $('#fecha_naci').val()
        };
        
        $.post(`${server}ajax/medicoAjax.php`, medico, function(repuesta) {
            if(repuesta == "1") {
                Swal.fire({        
                    type: 'success',
                    title: 'Éxito',
                    text: 'Se ha registrado exitosamente',        
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Por favor verifique los datos',        
                });
            }
        });
    });

    // Eliminar médico
    $(document).on('click', '#eliminarMedico', function() {
        var idMedico = $(this).val();
        Swal.fire({        
            type: 'warning',
            title: 'DESABILITAR',
            text: '¿ESTÁ SEGURO QUE DESEA DESABILITAR?',  
            confirmButtonText: 'OK',
            showCancelButton: true,
        }).then((result) => {
            if(result.value) { 
                var cedula_m = $(this).val();
                
                $.ajax({
                    type: 'POST',
                    url: `${server}ajax/medicoAjax.php`,
                    data: {
                        'eliminarMedico': true,
                        'id': idMedico 
                    },
                    success: function(repuesta) {
                        if(repuesta == 1) {  
                            Swal.fire({        
                                type: 'success',
                                title: 'Éxito',
                                text: 'SE HA DESAHILITADO CORRECTAMENTE',  
                                confirmButtonText: 'OK',      
                            }).then((result) => {
                                if(result.value) { 
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire(
                                'ERROR',
                                'NO SE HA ELIMINADO',
                                'error'
                            );
                        }
                    }
                });
            }
        });
    });

    $(document).on('click', '#habilitarMedico', function() {
        var idMedico = $(this).val();
        Swal.fire({        
            type: 'warning',
            title: 'HABILITAR',
            text: '¿ESTÁ SEGURO QUE DESEA HABILITAR?',  
            confirmButtonText: 'OK',
            showCancelButton: true,
        }).then((result) => {
            if(result.value) { 
                var cedula_m = $(this).val();
                
                $.ajax({
                    type: 'POST',
                    url: `${server}ajax/medicoAjax.php`,
                    data: {
                        'habilitarMedico': true,
                        'id': idMedico 
                    },
                    success: function(repuesta) {
                        if(repuesta == 1) {  
                            Swal.fire({        
                                type: 'success',
                                title: 'Éxito',
                                text: 'SE HA HABILITADO CORRECTAMENTE',  
                                confirmButtonText: 'OK',      
                            }).then((result) => {
                                if(result.value) { 
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire(
                                'ERROR',
                                'NO SE HA ELIMINADO',
                                'error'
                            );
                        }
                    }
                });
            }
        });
    });

    // Ver información del médico (modal)
    $(document).on('click', '#verMedicoModal', function(e) {
        e.preventDefault();
        
        // Obtener el ID del médico del atributo data-id del botón
        var idMedico = $(this).val();
        console.log(idMedico);
        
        
        // Mostrar el modal inmediatamente
        $('#modalInfoMedico').modal('show');
        
        // Hacer la petición AJAX para obtener los datos del médico
        $.ajax({
            url: 'ajax/medicoAjax.php',
            type: 'POST',
            dataType: 'json',
            data: { id: idMedico,
                    obtenerMedico:true
             },
            success: function(datosMedico) {
                if(datosMedico) {
                    $('#modalNombre').text(datosMedico[0].nombres);
                    $('#modalApellido').text(datosMedico[0].apellido);
                    $('#modalCedula').text(datosMedico[0].cedula);
                    $('#modalFechaNacimiento').text(datosMedico[0].fecha_nacimiento);
                    $('#modalGenero').text(datosMedico[0].sexo);
                    $('#modalNacionalidad').text(datosMedico[0].nacionalidad);
                    
                    // Datos Profesionales
                    $('#modalEspecialidad').text(datosMedico[0].especialidad);
                    $('#modalStatus').text(datosMedico[0].status);
                    
                    // Contacto
                    $('#modalTelefono').text(datosMedico[0].telefono);
                    $('#modalCorreo').text(datosMedico[0].correo);
                    $('#modalUbicacion').text(datosMedico[0].parroquia + ', ' + datosMedico[0].municipio);
                    
                    // Información Adicional
                    $('#modalEtnia').text(datosMedico[0].etnia);
                    $('#modalDiscapacidad').text(datosMedico[0].discapacidad);
                    $('#modalEdad').text(datosMedico[0].edad + ' años');
                } else {
                    // Mostrar mensaje de error si la petición no fue exitosa
                    $('#modalInfoMedico .modal-body').html('<div class="alert alert-danger">'+response.message+'</div>');
                }
            },
            error: function(xhr, status, error) {
                // Manejar errores de la petición AJAX
                $('#modalInfoMedico .modal-body').html(
                    '<div class="alert alert-danger">'+
                    'Error al cargar la información del médico. Por favor, intente nuevamente.'+
                    '</div>'
                );
                console.error('Error en la petición AJAX:', error);
            }
        });
    });
    
    // Limpiar el modal cuando se cierre
    $('#modalInfoMedico').on('hidden.bs.modal', function() {
        // Restablecer los campos del modal
        $('#modalNombre, #modalApellido, #modalCedula, #modalTelefono, '+
        '#modalFechaNacimiento, #modalGenero, #modalEspecialidad, #modalCorreo').text('');
    });
});
    $('.actualizarMedico').click(function(e) {
                e.preventDefault();
                
                // Obtener el ID del médico del atributo data-id del botón (ajusta según tu HTML)
                var idMedico = $(this).val(); // O usa .val() si es un input
                console.log("ID Médico:", idMedico);
                
                // Mostrar el modal inmediatamente
                $('#actualizarMedicoModal').modal('show');
                
                // Hacer la petición AJAX para obtener los datos del médico
                $.ajax({
                    url: 'ajax/medicoAjax.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { 
                        id: idMedico,
                        obtenerMedico: true
                    },
                    success: function(datosMedico) {
                        if(datosMedico) {
                            // Datos Personales
                            $('#nombreMedicoActualizar').val(datosMedico[0].nombres);
                            $('#apellidoMedicoActualizar').val(datosMedico[0].apellido);
                            $('#cedulaMedicoActualizar').val(datosMedico[0].cedula);
                            $('#fechaNacimientoMedico').val(datosMedico[0].fecha_nacimiento);
                            $('#generoMedico').val(datosMedico[0].sexo === 'Masculino' ? 'Masculino' : 'Femenino');
                            $('#nacionalidadMedico').val(datosMedico[0].nacionalidad);
                            
                            // Datos Profesionales
                            $('#especialidadMedico').val(datosMedico[0].especialidad);
                            $('#estadoMedico').val(datosMedico[0].status);
                            
                            // Contacto
                            $('#telefonoMedico').val(datosMedico[0].telefono);
                            $('#emailMedico').val(datosMedico[0].correo);
                            $('#ubicacionMedico').val(datosMedico[0].parroquia + ', ' + datosMedico[0].municipio);
                            
                            // Información Adicional
                            $('#etniaMedico').val(datosMedico[0].etnia === 'Sí' ? 'Sí' : 'NO');
                            $('#discapacidadMedico').val(datosMedico[0].discapacidad === 'Sí' ? 'Sí' : 'NO');
                            $('#edadMedico').val(datosMedico[0].edad + ' años');
                            
                            // Opcional: Calcular edad automáticamente si tienes la fecha
                            if(datosMedico[0].fecha_nacimiento) {
                                const edad = calcularEdad(datosMedico[0].fecha_nacimiento);
                                $('#edadMedico').val(edad + ' años');
                            }
                        } else {
                            Swal.fire('Error', 'No se encontraron datos del médico', 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Error al cargar los datos: ' + error, 'error');
                        console.error("Error AJAX:", error);
                    }
                });
            });
            
            // Función para calcular edad desde fecha de nacimiento (opcional)
            function calcularEdad(fechaNacimiento) {
                const hoy = new Date();
                const nacimiento = new Date(fechaNacimiento);
                let edad = hoy.getFullYear() - nacimiento.getFullYear();
                const mes = hoy.getMonth() - nacimiento.getMonth();
                
                if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
                    edad--;
                }
                return edad;
            }