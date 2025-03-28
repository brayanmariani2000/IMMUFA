   /**    ********REGISTRO DE DEPENDENCIA************  
           *     ************************************
           * *********************************************
           * **********************************************
          */
   import { server } from "./variables.js";
   $(document).on('click','#dependenciaBT',function(){
    $('#nuevaDependencias').submit(function(e){
      e.preventDefault();
      const dependencia={
       dependencia:$('#nuevaDependencia').val(),
      }
      console.log(dependencia)
      
     $.post(`${server}ajax/dependenciasAjax.php`,dependencia,function(repuesta){
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
   /**    ********ELIMINAR DE DEPENDENCIA************  
           *     ************************************
           * *********************************************
           * **********************************************
          */
   $(document).on('click','#eliminarDependencia',function(){
   const server1='http://localhost/ubv/proyecto2/'
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
        url:`${server1}/ajax/dependenciasAjax.php`,
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
                window.location.href = `${server}nuevaDependencia`;}})
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

$(document).on('click','#habilitarDependencia',function(){
  const server1='http://localhost/ubv/proyecto2/'
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
       url:`${server1}/ajax/dependenciasAjax.php`,
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
               window.location.href = `${server}nuevaDependencia`;}})
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