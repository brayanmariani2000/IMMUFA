import { server } from "./variables.js";
$(document).on('click','#registrarUsuariobt',function(){
  
    $('#registrarUsuario').submit(function(e){

      e.preventDefault();

      const usuario={

       nombre:$('#nombreUsuario').val(),

       apellido:$('#apellidoUsuario').val(),

       cedula:$('#cedulaUsuario').val(),

       telefono:$('#telefonoUsuario').val(),
       
       fecha_nacimiento:$('#fecha_nacimiento').val(),
       
       sexo:$('#sexo').val(),
       
       usuario:$("#idUsuario").val(),
       
       clave:$('#clave').val(),
       
       rol:$('#rol').val(),
      
      }
      console.log(usuario)
      
    $.post(`${server}ajax/usuarioAjax.php`,usuario,function(repuesta){
      
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
 
$(document).on('click','#verUsuario',function(){  

})
     /**    ********ELMINAR DEL USUARIO ************  
           *     ************************************
           * *********************************************
           * **********************************************
          */

     $(document).on('click','#eliminarUsuario',function(){

      Swal.fire({        

        type: 'info',

        title: 'ELIMINAR',

        text: 'ESTA SEGURO QUUE DESEA ELIMINAR',  

        confirmButtonText:'OK',

        showCancelButton:true,

      }).then((result)=>{

        if(result.value){ 

          var cedula_usuario=$(this).val()

          console.log(cedula_usuario)

          $.ajax({

            type:'POST',

            url:`${server}/ajax/usuarioAjax.php`,

            data:{

              'eliminarUsuario':true,

              'cedula_usuario':cedula_usuario

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

                    window.location.href = `${server}nuevoUsuario`;}})

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
        
     
          })