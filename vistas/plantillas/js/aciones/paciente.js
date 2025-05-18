import { server } from "./variables.js";

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
    
    var areaConsultar='',fechaCita='',estadoCita='',dependencia='';
   
    
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