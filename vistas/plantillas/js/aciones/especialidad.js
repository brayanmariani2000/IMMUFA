   /**    ********ARE DE CONSULTA REGISTRO ************  
           *     ************************************
           * *********************************************
           * **********************************************
           * 
          */
   $(document).ready(function(){
      $.ajax({
          url: 'ajax/citasCantidadEspecialidad.php',
          type: 'POST',
          dataType: 'json', // Especificamos que esperamos JSON
          success: function(data){
              let html = '';
              
              // Verificar si hay un error
              if (data.error) {
                  html = `<div class="alert alert-danger">${data.error}</div>`;
              } 
              // Verificar si no hay datos
              else if (data.length === 0) {
                  html = `<div class="alert alert-info">No hay citas registradas por especialidad</div>`;
              } 
              // Procesar datos normales
              else {
                  // Encontrar el máximo para calcular porcentajes
                  const maxCitas = Math.max(...data.map(item => item.cantidad));
                  
                  // Generar HTML para cada especialidad
                  data.forEach(item => {
                      const porcentaje = maxCitas > 0 ? Math.round((item.cantidad / maxCitas) * 100) : 0;
                      
                      html += `
                          <div class="especialidad-item mb-3">
                              <div class="d-flex justify-content-between align-items-center mb-1">
                                  <h5 class="m-0">${item.especialidad}</h5>
                                  <span class="badge ${item.color} rounded-pill"><p class="text-dark">${item.cantidad}</p></span>
                              </div>
                              <div class="progress" style="height: 6px;">
                                  <div class="progress-bar ${item.color}" 
                                      role="progressbar" 
                                      style="width: ${porcentaje}%" 
                                      aria-valuenow="${item.cantidad}" 
                                      aria-valuemin="0" 
                                      aria-valuemax="${maxCitas}">
                                  </div>
                              </div>
                          </div>
                      `;
                  });
              }
              
              $('#especialidadCitaJs').html(html);
          },
          error: function(xhr, status, error) {
              $('#especialidadCitaJs').html(`
                  <div class="alert alert-danger">
                      Error al cargar datos: ${error}
                  </div>
              `);
          }
      });
      
    
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
  