import {server} from "./variables.js";

$(document).ready(function(){

  $('#municipio').click(function(e){

    let municipio=$('#municipio').val();

    console.log(municipio)

    $.ajax({

      url:`${server}ajax/direccion.php`,

      type:'GET',

      data:{municipio},

      success:function(response){

        console.log(response);
        let plantilla='';

        let parroquias=JSON.parse(response);

  

        parroquias.forEach(parroquia => {

          if(municipio==parroquia.municipio_id){

            plantilla+=`<option value="${parroquia.value}">${parroquia.parroquias}</option>`; 

          }

        });

        $('#Parroquia').html(plantilla);

      }

    })

  })


})

$(document).ready(function(){
 
  $('#discapacidad_si').click(function(e){
 
    console.log('hola')
 
    $('#discapacidad_opcion').removeClass('hiden');
  
 
  })

 
  $('#discapacidad_no').click(function(e){
 
    $('#discapacidad_opcion').addClass('hiden');
    
 
  })

 
  $('#etnia_si').click(function(e){
 
    $('#etnia_opcion').removeClass('hiden');
    
  
  })

  
  $('#etnia_no').click(function(e){
  
    $('#etnia_opcion').addClass('hiden');
    
  
  })
  
})
$(document).on('click','#generarReportes',function(){ 
   
  var areaConsultar='',fechaCita='',estadoCita='',dependencia='';
 
  
  $.ajax({
  
    type:'POST',
  
    url:`${server}ajax/citaAjax.php`,
  
    data:{
  
      'ver_Cita':true,
  
      'id_cita':idCita 
  
    },
  
    success:function(citas){
  console.log(citas)
      var datosC=jQuery.parseJSON(citas);
  
    
    } 
    
  })
    /**    ********INFORMACION DEL PACIENTE ************  
           *     ************************************
           * *********************************************
           * **********************************************
          */
$('#veirInfo_cita').modal('show')

})

    
    
    $('#botonAc').click(function(e){

      
      e.preventDefault();
    
      const paciente={
    
        nombre:$('#nombrePaciente').text(),
  
        apellido:$('#apellidoPaciente').text(),
  
        cedula:$('#cedulaPaciente').text(),
  
        fecha_consulta:$('#fechaAntencionPaciente').text(),
  
        especialidad:$('#especialidadCitaPersona').text(),   
               
        condicion:$('#condicionCita').val(),

        id_consulta:$('#id_consulta').val(),

        id_cita:$('#id_cita').val()
    
      }
      console.log(paciente)
    
      /*$.post(`${server}ajax/actualizarPaciente.php`,paciente,function(repuesta){
    
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
  
      })    */
       
    })	
  








