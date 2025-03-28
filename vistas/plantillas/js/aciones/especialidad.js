   /**    ********ARE DE CONSULTA REGISTRO ************  
           *     ************************************
           * *********************************************
           * **********************************************
           * 
          */
   $(document).ready(function(){
    $.ajax({

      type:'POST',

      url:`${server}ajax/areaAjax.php`,

      data:{

        CitaxEspecialidad:true
      },

      success:function(repuesta){
        let plantilla='';
      
        let especialidad=JSON.parse(repuesta);

        especialidad.forEach(row=> {

          if(row.status==1){
          plantilla+=`<h5 class="m-t-30">${row.especialidades}<span class="pull-right">1</span></h5>

                  <div class="progress ">

                      <div class="progress-bar bg-danger wow animated progress-animated" style="width: 15%; height:6px;" role="progressbar"></div>

                  </div>`}
          
        });

        $('#especialidadCitaJs').html(plantilla)

        console.log(repuesta)
              
            }
  
          })

    }) 
    
   import { server } from "./variables.js";

   $(document).on('click','#areaBT',function(){

    $('#areConNew').submit(function(e){

      e.preventDefault();

      const area_consulta={

        area:$('#nuevaAreaC').val(),

      }

      console.log(area_consulta)
      

      $.post(`${server}ajax/areaAjax.php`,area_consulta,function(repuesta){

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
  /**    ********ARE DE CONSULTA ELIMINAR ************  
           *     ************************************
           * *********************************************
           * **********************************************
          */

  $(document).on('click','#eliminarArea',function(){
    const server1='http://localhost/ubv/proyecto2/'

    Swal.fire({        

      type: 'info',

      title: 'DESABILITAR',

      text: 'ESTA SEGURO QUUE DESEA DESABILITAR',  

      confirmButtonText:'OK',

      showCancelButton:true,

    }).then((result)=>{

      if(result.value){ 

        var area=$(this).val()

        console.log(area)

        $.ajax({

          type:'POST',

          url:`${server1}ajax/areaAjax.php`,

          data:{

            'eliminarArea':true,

            'idEspecialidad':area

          },

          success:function(repuesta){

            console.log(repuesta)

            if(repuesta==1){  

              Swal.fire({        

                type: 'success',

                title: 'Éxito',

                text: 'SE HA DESABILITADO CORRECTAMENTE',  

                confirmButtonText:'OK',      

              }).then((result)=>{

                if(result.value){ 

                  window.location.href = `${server1}/nuevaArea`;}})

                }else{

                  Swal.fire(

                    'ERROR',

                    'ERROR',

                    'error'

                    )

                  }

                  
                }
      
              })
  
    
            }
  
          });
  
  
        })   

        $(document).on('click','#habilitarArea',function(){
          const server1='http://localhost/ubv/proyecto2/'
      
          Swal.fire({        
      
            type: 'info',
      
            title: 'HABILITAR',
      
            text: 'ESTA SEGURO QUUE DESEA HABILITAR',  
      
            confirmButtonText:'OK',
      
            showCancelButton:true,
      
          }).then((result)=>{
      
            if(result.value){ 
      
              var area=$(this).val()
      
      
              $.ajax({
      
                type:'POST',
      
                url:`${server1}ajax/areaAjax.php`,
      
                data:{
      
                  'habilitarArea':true,
      
                  'idEspecialidad':area
      
                },
      
                success:function(repuesta){
      
                  console.log(repuesta)
      
                  if(repuesta==1){  
      
                    Swal.fire({        
      
                      type: 'success',
      
                      title: 'Éxito',
      
                      text: 'SE HA HABILITADO CORRECTAMENTE',  
      
                      confirmButtonText:'OK',      
      
                    }).then((result)=>{
      
                      if(result.value){ 
      
                        window.location.href = `${server}/nuevaArea`;}})
      
                      }else{
      
                        Swal.fire(
      
                          'ERROR',
      
                          'ERROR',
      
                          'error'
      
                          )
      
                        }
      
                        
                      }
            
                    })
        
          
                  }
        
                });
        
        
              })   
  