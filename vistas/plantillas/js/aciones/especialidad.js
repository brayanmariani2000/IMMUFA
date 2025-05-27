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
      dataType: 'json',
      success: function(data){
          let html = '';
          
          if (data.error) {
              html = `<div class="alert alert-danger">${data.error}</div>`;
          } 
          else if (data.length === 0) {
              html = `<div class="alert alert-info">No hay citas registradas por especialidad</div>`;
          } 
          else {
              const maxCitas = Math.max(...data.map(item => item.cantidad));
              
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
          
          $('#especialidadCitaJs2').html(html);
      },
      error: function(xhr, status, error) {
          $('#especialidadCitaJs2').html(`
              <div class="alert alert-danger">
                  Error al cargar datos: ${error}
              </div>
          `);
      }
  });
})

import { server } from "./variables.js";

// Función para registrar nueva área
$(document).on('click','#areaBT',function(){
  $('#areConNew').submit(function(e){
      e.preventDefault();
      const area_consulta = {
          area: $('#nuevaAreaC').val(),
      }

      console.log(area_consulta)
      
      $.post(`${server}ajax/areaAjax.php`, area_consulta, function(repuesta){
          console.log(repuesta);
          if(repuesta=="1"){
              Swal.fire({        
                  type: 'success',
                  title: 'Éxito',
                  text: 'Se ha registrado Exitosamente',        
              });
              location.reload();
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

/**    ********FUNCIÓN PARA EDITAR ÁREA ************  
*     ************************************
* *********************************************
* **********************************************
*/

// Función para abrir modal de edición
$(document).on('click', '.btn-editar-area', function(){
  const id = $(this).data('id');
  const nombre = $(this).data('nombre');
  
  $('#idAreaEditar').val(id);
  $('#nombreAreaEditar').val(nombre);
  $('#modalEditarArea').modal('show');
});

// Función para enviar la edición
$(document).on('submit', '#formEditarArea', function(e){
  e.preventDefault();
  
  const datos = {
      editarArea: true,
      idArea: $('#idAreaEditar').val(),
      nombreArea: $('#nombreAreaEditar').val()
  };
  
  $.ajax({
      url: `${server}ajax/areaAjax.php`,
      type: 'POST',
      data: datos,
      success: function(respuesta){
          console.log(respuesta);
          if(respuesta == "1"){
              Swal.fire({
                  type: 'success',
                  title: 'Éxito',
                  text: 'Área actualizada correctamente'
              }).then(() => {
                  $('#modalEditarArea').modal('hide');
                  location.reload();
              });
          }else{
              Swal.fire({
                  type: 'error',
                  title: 'Error',
                  text: 'No se pudo actualizar el área'
              });
          }
      },
      error: function(xhr, status, error){
          Swal.fire({
              type: 'error',
              title: 'Error',
              text: 'Error en la conexión: ' + error
          });
      }
  });
});

/**    ********ARE DE CONSULTA ELIMINAR ************  
*     ************************************
* *********************************************
* **********************************************
*/

$(document).on('click','.btn-estado',function(){
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
              url:`${server}ajax/areaAjax.php`,
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
                              location.reload();
                          }
                      })
                  }else{
                      Swal.fire('ERROR','ERROR','error')
                  }
              }
          })
      }
  });
})

$(document).on('click','.btn-estado-habilitar',function(){
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
              url:`${server}ajax/areaAjax.php`,
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
                              location.reload();
                          }
                      })
                  }else{
                      Swal.fire('ERROR','ERROR','error')
                  }
              }
          })
      }
  });
})