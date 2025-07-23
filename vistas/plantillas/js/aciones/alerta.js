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
        let tabla=''

        let parroquias=JSON.parse(response);
        console.log(parroquias);
  

        parroquias.forEach(parroquia => {

          if(municipio==parroquia.municipio_id){

            plantilla+=`<option value="${parroquia.value}">${parroquia.parroquias}</option>`; 

          }

        });

        let cont=0
        parroquias.forEach(parroquia => {

          if(municipio==parroquia.municipio_id){
           cont++

            tabla+=`<tr>
                      <td>${cont}</td>
                      <td>${parroquia.parroquias}</td>
                          <td>   
                            <div class="btn-group" role="group">
                                  <button type="button" class="btn btn-warning btn-sm btn-editar-parroquia" 
                                      data-id="${parroquia.value}" 
                                      data-nombre="${parroquia.parroquias}"
                                      data-municipio="${parroquia.municipio_id}">
                                      <i class="fas fa-edit"></i> Actualizar
                                  </button>
                            </div>
                          <td>
                      </tr>`; 

          }

        });

        $('#Parroquia').html(plantilla);
        $('#tablaParroquia').html(tabla);

      }

    })

  })


})

// Para discapacidad
document.querySelectorAll('input[name="discapacidad_op"]').forEach(radio => {
  radio.addEventListener('change', function() {
      document.getElementById('discapacidad_opcion').classList.toggle('d-none', this.value === '1');
  });
});

// Para etnia
document.querySelectorAll('input[name="etnia_op"]').forEach(radio => {
  radio.addEventListener('change', function() {
      document.getElementById('etnia_opcion').classList.toggle('d-none', this.value === '1');
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









