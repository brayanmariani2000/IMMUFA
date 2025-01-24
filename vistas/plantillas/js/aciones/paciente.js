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
  
    fecha_consulta:$('#fecha_consulta').val()
  
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
   $(document).on('click','#verInfo_p',function(){ 
   
    var cedula=$(this).val()
    
    console.log(cedula)
    
    var areaConsultar='',fechaCita='',estadoCita='',dependencia='';
   
    
    $.ajax({
    
      type:'POST',
    
      url:`${server}ajax/verInfoPaciente.php`,
    
      data:{
    
        'ver_paciente':true,
    
        'cedula_p':cedula 
    
      },
    
      success:function(citas){
    console.log(citas)
        var datosC=jQuery.parseJSON(citas);
    
        datosC.forEach(datos=>{ 
    
          $('#nombrePaciente').text(datos.nombre),
    
          $('#apellidoPaciente').text(datos.apellido),
    
          $('#cedulaPaciente').text(datos.cedula),
    
          $('#telefonoPaciente').text(datos.telefono),
    
          $('#sexoPaciente').text(datos.sexo),
    
          $('#edadPaciente').text(datos.edad),
    
          $('#municipioPaciente').text(datos.municipiosN),
    
          $('#parroquiaPaciente').text(datos.parroquias),
    
          $('#discapacidadPaciente').text(datos.tipo_discapacidad),
    
          $('#etniaPaciente').text(datos.etnias),
    
          $('#fechaNaciPaciente').text(datos.fechaNaci)        
  
             
        }) 
      
      } 
      
    })
      /**    ********INFORMACION DEL PACIENTE ************  
             *     ************************************
             * *********************************************
             * **********************************************
            */
  $('#veirInfoPaciente').modal('show')
  
})

       /**    ********ACTUALIZAR PACIENTE ************  
             *     ************************************
             * *********************************************
             * **********************************************
            */
      
      $('#municipioPacienteActualizar').click(function(e){
      
        let municipio=$('#municipioPacienteActualizar').val();
      
        $.ajax({
      
          url:`${server}/ajax/direccion.php`,
      
          type:'GET',
      
          data:{municipio},
      
          success:function(response){
      
            let plantilla='';
      
            let parroquias=JSON.parse(response);
      
            parroquias.forEach(parroquia => {
      
              if(municipio==parroquia.municipio_id){
      
                plantilla+=`<option value="${parroquia.value}">${parroquia.parroquias}</option>`; 
      
              }
      
            });
      
            $('#parroquiaPacienteActualizar').html(plantilla);
      
          }
      
        })
      
      })
  
      
      
      
      $('#botonAc').click(function(e){
      
        e.preventDefault();
      
        const paciente={
      
          nombre:$('#nombrePacienteActualizar').val(),
      
          apellido:$('#apellidoPacienteActualizar').val(),
      
          cedula:$('#cedulaPacienteActualizar').val(),
      
          telefono:$('#telefonoPacienteActualizar').val(),
      
          fechaNaci:$('#fechaNaciPacienteActualizar').val(),
      
          sexo:$('#sexoPacienteActualizar').val(),
      
          municipio:$('#municipioPacienteActualizar').val(),
      
          parroquia:$('#parroquiaPacienteActualizar').val(),
      
          discapacidad:$('#discapacidadPacienteActualizar').val(),
      
          etnia:$('#etniaPacienteActualizar').val(),
      
          edad:$('#edadPacienteActualizar').val()
      
        }
      
        $.post(`${server}ajax/actualizarPaciente.php`,paciente,function(repuesta){
      
          console.log(repuesta);
      
          if(repuesta==2){
      
            Swal.fire({        
      
              type: 'success',
      
              title: 'Éxito',
      
              text: 'Se ha Actualizado los datos del paciente',        
      
            });
      
          }else{
      
            Swal.fire({
      
              type: 'error',
      
              title: 'Error',
      
              text: 'Por favor Verifique los datos',        
      
            });
      
          }
    
        })    
         
      })	
  