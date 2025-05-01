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
        console.log(parroquias);
  

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

// Para discapacidad
document.querySelectorAll('input[name="discapacidad_op"]').forEach(radio => {
  radio.addEventListener('change', function() {
      document.getElementById('discapacidad_opcion').classList.toggle('d-none', this.value === '0');
  });
});

// Para etnia
document.querySelectorAll('input[name="etnia_op"]').forEach(radio => {
  radio.addEventListener('change', function() {
      document.getElementById('etnia_opcion').classList.toggle('d-none', this.value === '0');
  });
});

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
  








