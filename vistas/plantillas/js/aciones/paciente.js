import { server } from "./variables.js";

$(document).on('click', '.editar-paciente', function() {
    var idPersona = $(this).data('id');
    
    // Mostrar el modal de edición
    $('#actualizarPacienteModal').modal('show');
    
    // Obtener datos del paciente via AJAX
    $.ajax({
        url: 'ajax/verInfoPaciente.php',
        type: 'POST',
        dataType: 'json',
        data: { 
            id_persona: idPersona,
            ver_paciente: true
        },
        success: function(datos) {
            // Llenar campos del formulario
            $('#nombrePacienteActualizar').val(datos.nombre);
            $('#apellidoPacienteActualizar').val(datos.apellido);
            $('#cedulaPacienteActualizar').val(datos.cedula);
            $('#fechaNaciPacienteActualizar').val(datos.fechaNaci);
            
            // Calcular y mostrar edad
            if (datos.fechaNaci) {
                const fechaNac = new Date(datos.fechaNaci);
                const hoy = new Date();
                let edad = hoy.getFullYear() - fechaNac.getFullYear();
                const mes = hoy.getMonth() - fechaNac.getMonth();
                if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
                    edad--;
                }
                $('#edadPacienteActualizar').val(edad);
            }
            
            // Seleccionar sexo
            $('#sexoPacienteActualizar').val(datos.sexoID);
            
            // Manejar discapacidad (convertir "NO" a valor 0)
            const discapacidadValue = datos.tipo_discapacidad === "NO" ? "0" : datos.tipo_discapacidad;
            $('#discapacidadPacienteActualizar').val(discapacidadValue);
            
            // Seleccionar etnia
            $('#etniaPacienteActualizar').val(datos.etnias);
            
            // Teléfono
            $('#telefonoPacienteActualizar').val(datos.telefono);
            
            // Municipio y parroquia
            $('#municipioPacienteActualizar').val(datos.idMunicipio).trigger('change');
            
            // Necesitamos un pequeño delay para que cargue las parroquias
            setTimeout(function() {
                $('#parroquiaPacienteActualizar').val(datos.idParroquia);
            }, 300);
            
            // Guardar el ID del paciente en el formulario
            $('#actualizarPacienteFormulario').data('id-persona', idPersona);
        },
        error: function(xhr, status, error) {
            console.error("Error al cargar datos:", error);
            alert("Error al cargar los datos del paciente");
        }
    });
});
$(document).on('click', '#verDatos', function() {
    // Obtener el ID de la persona del atributo data-id
    var idPersona = $(this).data('id');
    
    // Abrir el modal
    $('#infoPacienteModal').modal('show');

    $.ajax({
        url: 'ajax/verInfoPaciente.php',
        type: 'POST',
        data: { 
            id_persona: idPersona,
            ver_paciente: true
        },
        dataType: 'json', // Especificamos que esperamos JSON
        success: function(datos) {
            // Ya no necesitamos parsear porque usamos dataType: 'json'
            
            // Rellenar campos de Datos Personales
            $('#modalCedula').text(datos.cedula || 'No registrado');
            $('#modalNombre').text(datos.nombre || 'No registrado');
            $('#modalApellido').text(datos.apellido || 'No registrado');
            $('#modalFechaNacimiento').text(datos.fechaNaci || 'No registrado');

            // Calcular Edad
            if (datos.fechaNaci) {
                const fechaNac = new Date(datos.fechaNaci);
                const hoy = new Date();
                let edad = hoy.getFullYear() - fechaNac.getFullYear();
                const mes = hoy.getMonth() - fechaNac.getMonth();
                if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
                    edad--;
                }
                $('#modalEdad').text(edad + ' años');
            } else {
                $('#modalEdad').text('No disponible');
            }

            $('#modalTelefono').text(datos.telefono || 'No registrado');

            // Rellenar campos de Ubicación
            $('#modalMunicipio').text(datos.municipiosN || 'No registrado');
            $('#modalParroquia').text(datos.parroquias || 'No registrado');
            $('#modalDireccion').text(`${datos.municipiosN}, ${datos.parroquias}` || 'No registrado');

            // Rellenar campos de Características
            $('#modalEtnia').text(datos.etnias || 'No registrado');
            $('#modalDiscapacidad').text(datos.tipo_discapacidad === "NO" ? 'No tiene' : datos.tipo_discapacidad || 'No especificado');

            // Historial de atenciones
            $('#modalTotalAtenciones').text(datos.veces_atendido || 0);

            // Limpiar tabla previa
            $('#bodyHistorial').empty();

            // Manejar el historial de atenciones
            if (datos.especialidades_atendidas) {
                const especialidades = datos.especialidades_atendidas.split(',').map(esp => esp.trim());
                
                // Asumimos que solo tenemos la última atención
                // En un caso real deberías recibir un array de atenciones
                especialidades.forEach((especialidad) => {
                    const fila = `
                        <tr>
                            <td>${datos.ultima_atencion ? datos.ultima_atencion.split(' ')[0] : 'No disponible'}</td>
                            <td>${especialidad}</td>
                            <td>Médico no especificado</td>
                            <td><span class="badge bg-success">Completada</span></td>
                        </tr>`;
                    $('#bodyHistorial').append(fila);
                });
            } else {
                $('#bodyHistorial').append('<tr><td colspan="4" class="text-center">No hay registros de atenciones</td></tr>');
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la petición AJAX:", status, error);
            alert('Error al cargar los datos del paciente. Por favor intente nuevamente.');
        }
    });
});
// Manejar el envío del formulario de actualización
$(document).on('submit', '#actualizarPacienteFormulario', function(e) {
    e.preventDefault();
    
    // Mostrar loader o indicador de carga
    $('#loader').show();
    
    // Recolectar datos del formulario
    const formData = {
        id_persona: $(this).data('id-persona'),
        nombreActul: $('#nombrePacienteActualizar').val(),
        apellidoActul: $('#apellidoPacienteActualizar').val(),
        cedulaActul: $('#cedulaPacienteActualizar').val(),
        telefonoActul: $('#telefonoPacienteActualizar').val(),
        fechaNaciActul: $('#fechaNaciPacienteActualizar').val(),
        sexoActul: $('#sexoPacienteActualizar').val(),
        etniaActul: $('#etniaPacienteActualizar').val(),
        discapacidadActul: $('#discapacidadPacienteActualizar').val(),
        parroquiaActul: $('#Parroquia').val(),
        actualizarDatosPaciente:true
    };
    
    // Enviar datos al servidor
    $.ajax({
        url: 'ajax/verInfoPaciente.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        success: function(response) {
            $('#loader').hide();
            
            if(response.success) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: response.message,
                    timer: 2000,
                    showConfirmButton: false
                });
                
                // Cerrar el modal después de 2 segundos
                setTimeout(() => {
                    $('#actualizarPacienteModal').modal('hide');
                    // Opcional: Recargar la tabla o lista de pacientes
                    cargarPacientes();
                }, 2000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function(xhr, status, error) {
            $('#loader').hide();
            console.error("Error en la petición:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al intentar actualizar los datos'
            });
        }
    });
});
  $('#paciente_cita').submit(function(e){

  
  e.preventDefault();
  
  const paciente={
  
    nombre:$('#nombre').val(),
  
    apellido:$('#apellido').val(),
  
    cedula:$('#cedula').val(),
  
    telefono:$('#telefono').val(),
  
    fecha_naci:$('#fecha_naci').val(),
  
    sexo:$('#sexo').val(),
  
    parroquia:$('#Parroquia').val(),
  
    sector:$('#sector').val(),
  
    discapacidad:$('#discapacidad').val(),
  
    etnias:$('#etnias').val(),
  
    area_consultar:$('#area_consultar').val(),
  
    dependencia:$('#dependencia').val(),
  
    usuario:$('#usuarioRegistro').val(),
  
    especialista:$('#especialista').val(),
  
    fecha_consulta:$('#fecha_consulta').val(),

    datosCompletoPaciente:true
  
  }
  console.log(paciente)
  
 $.post(`${server}ajax/pacienteAjax.php`,paciente,function(repuesta){
  
    console.log(repuesta);
  
    if(repuesta=="1"){
  
      Swal.fire({        
  
        type: 'success',
  
        title: 'Éxito',
  
        text: 'Se ha registrado el paciente y agendado la cita',        
  
      });
    }else{
  
      Swal.fire({
  
        type: 'error',
  
        title: 'Error',
  
        text: 'Por favor Verifique los datos',        
  
      });
  
    }
  
  })
  
   
   /**    ********INFORMACION DEL PACIENTE ************  
             *     ************************************
             * *********************************************
             * **********************************************
            */

  })
   $(document).on('click','#actualizar_cita',function(){ 
   
    var idCita=$(this).val()
    
    console.log(idCita)
    
    $.ajax({
    
      type:'POST',
    
      url:`${server}ajax/citaAjax.php`,
    
      data:{
    
        'ver_Cita':true,
    
        'id_cita':idCita 
    
      },
    
      success:function(citas){
        var datosC=jQuery.parseJSON(citas);
    
        datosC.forEach(datos=>{ 
    
          $('#nombrePaciente').text(datos.nombrePaciente),
    
          $('#apellidoPaciente').text(datos.apellidoPaciente),
    
          $('#cedulaPaciente').text(datos.cedulaPaciente),
    
          $('#fechaAntencionPaciente').text(datos.fechaConsulta),
    
          $('#especialidadCitaPersona').text(datos.especialidad),

          $('#especialidadCitaPersona').val(datos.id_especialidad),
          
          $('#id_consulta').val(datos.id_consulta),

          $('#id_cita').val(datos.id_cita),
                 
          $('#condicionCita').val(datos.condicion)
             
        }) 
      
      } 
      
    })
      /**    ********INFORMACION DEL PACIENTE ************  
             *     ************************************
             * *********************************************
             * **********************************************
            */
  $('#veirInfo_cita').modal('show')
  
  })         
  $('#ActualizarBtnActul').click(function(e){
  e.preventDefault();
  
  const datosCita = {
      condicion: $('#condicionCita').val(),
      id_consulta: $('#id_consulta').val(),
      id_cita: $('#id_cita').val(),
      cita_actualizar: true
  };
  
  // Mostrar carga
  Swal.fire({
      title: 'Actualizando...',
      html: 'Por favor espere',
      allowOutsideClick: false,
      didOpen: () => {
          Swal.showLoading();
      }
  });
  
  $.ajax({
      url: `${server}ajax/actualizarPaciente.php`,
      type: 'POST',
      dataType: 'json',
      data: datosCita,
      success: function(response) {
          Swal.close();
          
          if(response.success) {
              Swal.fire({
                  icon: 'success',
                  title: 'Éxito',
                  text: response.message,
                  confirmButtonText: 'OK'
              }).then(() => {
                  // Recargar o actualizar la vista
                  location.reload();
              });
          } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: response.message
              });
          }
      },
      error: function(xhr, status, error) {
          Swal.close();
          Swal.fire({
              icon: 'error',
              title: 'Error de conexión',
              text: 'No se pudo conectar con el servidor'
          });
          console.error('Error:', error);
      }
  });
  });
  $(document).ready(function() {
    // Evento submit del formulario
    $('#paciente_cita_nueva').submit(function(e) {
        e.preventDefault();
        
        // Mostrar loader con SweetAlert2
        Swal.fire({
            title: 'Procesando solicitud',
            html: 'Estamos registrando su cita...',
            timerProgressBar: true,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Recolectar datos del formulario
        const datosCita = {
            id_paciente: $('#idPaciente').val(),
            area_consultar: $('#area_consultar').val(),
            dependencia: $('#dependencia').val(),
            especialista: $('#especialista').val(),
            fecha_consulta: $('#fecha_consulta').val(),
            usuario: $('#usuarioRegistro').val(),
            citaNueva: true
        };

        // Validaciones con SweetAlert2
        if(datosCita.area_consultar == "0") {
            Swal.fire({
                icon: 'error',
                title: 'Campo requerido',
                text: 'Debe seleccionar un área de consulta',
                confirmButtonColor: '#3085d6'
            });
            return false;
        }

        if(datosCita.especialista == "0") {
            Swal.fire({
                icon: 'error',
                title: 'Campo requerido',
                text: 'Debe seleccionar un especialista',
                confirmButtonColor: '#3085d6'
            });
            return false;
        }

        if(!datosCita.fecha_consulta) {
            Swal.fire({
                icon: 'error',
                title: 'Campo requerido',
                text: 'Debe seleccionar una fecha para la cita',
                confirmButtonColor: '#3085d6'
            });
            return false;
        }

        // Validar fecha futura
        const fechaSeleccionada = new Date(datosCita.fecha_consulta);
        const hoy = new Date();
        hoy.setHours(0, 0, 0, 0);
        
        if(fechaSeleccionada < hoy) {
            Swal.fire({
                icon: 'error',
                title: 'Fecha inválida',
                text: 'No puede seleccionar una fecha pasada',
                confirmButtonColor: '#3085d6'
            });
            return false;
        }

        // Enviar datos al servidor
        $.ajax({
            url: `${server}ajax/citaAjax.php`,
            type: 'POST',
            dataType: 'json',
            data: datosCita,
            success: function(response) {
                Swal.close();
                
                if(response == "1") {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Cita agendada!',
                        text:  '¡Cita agendada!',
                        showConfirmButton: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#3085d6',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir después de aceptar
                           
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al agendar',
                        text: response.mensaje,
                        confirmButtonColor: '#3085d6'
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error de conexión',
                    text: 'No se pudo conectar con el servidor. Intente nuevamente.',
                    confirmButtonColor: '#3085d6'
                });
                console.error('Error:', error);
            }
        });
    });

});;