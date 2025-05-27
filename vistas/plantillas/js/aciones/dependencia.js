import { server } from "./variables.js";
$(document).on('click','#dependenciaBT',function(){
    $('#nuevaDependencias').submit(function(e){
      e.preventDefault();
      const dependencia={
       dependencia:$('#nuevaDependencia').val(),
      }
      console.log(dependencia)
      
     $.post(`ajax/dependenciasAjax.php`,dependencia,function(repuesta){
        console.log(repuesta);
        if(repuesta=="1"){
          Swal.fire({        
            type: 'success',
            title: 'Éxito',
            text: 'Se ha registrado Exitosamente',        
        });then((result)=>{
          if(result.value){ 
            location.reload();}})
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
$(document).on('click','#eliminarDependencia',function(){
   const server1=''
    Swal.fire({        
      type: 'info',
      title: 'DESABILITAR',
      text: 'ESTA SEGURO QUUE DESEA DESABILITAR',  
      confirmButtonText:'OK',
      showCancelButton:true,
  }).then((result)=>{
    if(result.value){ 
      var dependencia=$(this).val()
      console.log(dependencia)
     $.ajax({
        type:'POST',
        url:`ajax/dependenciasAjax.php`,
        data:{
              'eliminarDependencia':true,
              'idDependencias':dependencia,
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
                    location.reload();}})
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
$(document).on('click', '.btn-editar-Dependencia', function(){
  const id = $(this).data('id');
  const nombre = $(this).data('nombre');
  
  $('#editarIdDependencia').val(id);
  $('#editarNombreDependencia').val(nombre);
  $('#modalEditarDependencia').modal('show');
});
$('#formEditarDependencia').on('submit', function(event) {
  event.preventDefault(); // Prevenir el envío tradicional del formulario
  const datos = {
    editarDependencia: true,
    idDependencias: $('#editarIdDependencia').val(),
    nombreDependencias: $('#editarNombreDependencia').val()
} // Obtener los datos del formulario

  $.ajax({
      url: 'ajax/dependenciasAjax.php', // La URL de tu script PHP que procesa la actualización
      type: 'POST',
      data: datos,
      success: function(respuesta){
        console.log(respuesta);
        if(respuesta == "1"){
            Swal.fire({
                type: 'success',
                title: 'Éxito',
                text: 'dependencias actualizada correctamente'
            }).then(() => {
                $('#modalEditarDependencia').modal('hide');
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
$(document).on('click','#habilitarDependencia',function(){
  const server1=''
   Swal.fire({        
     type: 'info',
     title: 'HABILITAR',
     text: 'ESTA SEGURO QUUE DESEA HABILITAR',  
     confirmButtonText:'OK',
     showCancelButton:true,
 }).then((result)=>{
   if(result.value){ 
     var dependencia=$(this).val()
     console.log(dependencia)
    $.ajax({
       type:'POST',
       url:`ajax/dependenciasAjax.php`,
       data:{
             'habilitarDependencia':true,
             'idDependencias':dependencia,
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
             location.reload();}})
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
$(document).ready(function(){
  $.ajax({
    url: 'ajax/AjaxChartDependencias.php',
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
            html = `<div class="alert alert-info">No hay citas registradas por Dependencias</div>`;
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
                            <h5 class="m-0">${item.dependencia}</h5>
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
        
        $('#dependenciasCitaJs').html(html);
    },
    error: function(xhr, status, error) {
        $('#dependenciasCitaJs').html(`
            <div class="alert alert-danger">
                Error al cargar datos: ${error}
            </div>
        `);
    }
});


}) 