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
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Se ha registrado exitosamente',        
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor verifique los datos',        
                });
            }
        });
    });

    // Eliminar médico
    $(document).on('click', '#eliminarMedico', function() {
        Swal.fire({        
            icon: 'info',
            title: 'ELIMINAR',
            text: '¿ESTÁ SEGURO QUE DESEA ELIMINAR?',  
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
                        'cedulaM': cedula_m 
                    },
                    success: function(repuesta) {
                        if(repuesta == 1) {  
                            Swal.fire({        
                                icon: 'success',
                                title: 'Éxito',
                                text: 'SE HA ELIMINADO CORRECTAMENTE',  
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
function cargarDatosMedico(datosMedico) {
    // Datos Personales
   
    
    // Mostrar el modal

}