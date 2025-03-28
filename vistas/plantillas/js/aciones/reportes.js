$(document).on('click','#generarReportesCompletos',function(){ 
   console.log('lola')
    var areaConsultar='',fechaCita='',estadoCita='',dependencia='';
   
    
   /**  $.ajax({
    
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
         ********INFORMACION DEL PACIENTE ************  
             *     ************************************
             * *********************************************
             * **********************************************
            */
  $('#ReportesGenerarModal').modal('show')
  
  })
  
      