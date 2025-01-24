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
  








