import { server } from "./variables.js";
$(document).ready(function(){

$('#area_consultar').click(function(e){

  let area=$('#area_consultar').val();

  $.ajax({

    url:`${server}ajax/medicoAjax.php`,

    type:'POST',

    data:{

      'especialistaCita':true,

      'especialidad':area
    },
    success:function(response){

      let plantilla='';

      let especialista=JSON.parse(response);

      especialista.forEach(especialidad => {

        if(area==especialidad.especialidades){

          plantilla+=`<option value="${especialidad.value}">${especialidad.Nmedico}  ${especialidad.Amedico}</option>`; 

        }

      });

      $('#especialista').html(plantilla);

    }

  })

})

})

$(document).on('click','#resgistrarMedico',function(){

  $('#medicoRegistro').submit(function(e){

    e.preventDefault();

    const medico={
      
        nombre:$('#nombre').val(),
      
        apellido:$('#apellido').val(),
      
        cedula:$('#cedula').val(),
      
        telefono:$('#telefono').val(),
      
        correo:$("#correo").val(),
      
        sexo:$('#sexo_m').val(),
      
        especialidad:$('#especialidadM').val(),

        fecha_naci:$('#fecha_naci').val()
      }
      
      console.log(medico)
      
     $.post(`${server}ajax/medicoAjax.php`,medico,function(repuesta){
     
      console.log(repuesta);
     
      if(repuesta=="1"){
     
        Swal.fire({        
     
          type: 'success',
     
          title: 'Éxito',
     
          text: 'Se ha registrado Exitosamente',        
     
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
  
})
  
 
$(document).on('click','#eliminarMedico',function(){

  Swal.fire({        

    type: 'info',

    title: 'ELIMINAR',

    text: 'ESTA SEGURO QUUE DESEA ELIMINAR',  

    confirmButtonText:'OK',

    showCancelButton:true,

  }).then((result)=>{

    if(result.value){ 

      var cedula_m=$(this).val()

      console.log(cedula_m)
      
     $.ajax({

      type:'POST',

      url:`${server}ajax/medicoAjax.php`,

      data:{

        'eliminarMedico':true,

        'cedulaM':cedula_m 

      },
              success:function(repuesta){

                console.log(repuesta)
                
                if(repuesta==1){  

                  Swal.fire({        

                    type: 'success',

                    title: 'Éxito',

                    text: 'SE HA ELIMINADO CORRECTAMENTE',  

                    confirmButtonText:'OK',      

                  }).then((result)=>{

                    if(result.value){ 

                      window.location.href = `${server}/formulario`;}})
                }else{

                  Swal.fire(

                    'ERROR',

                    'NO SE HA ELIMINADO',

                    'error'
                  )
                }
            
                }
            
      })
  
    }
  });
    
   }
   )
  /**    ********INFORMACION DEL MEDICO************  
           *     ************************************
           * *********************************************
           * **********************************************
          */
$(document).on('click','#verMedico',function(){

})



