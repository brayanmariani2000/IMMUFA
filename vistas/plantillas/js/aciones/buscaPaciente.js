import { server } from "./variables.js";

$('#buscarPaciente').keyup(function(e){

    let buscar = $('#buscarPaciente').val()
 
    $.ajax({

        type:'POST',
    
        url:`${server}ajax/verInfoPaciente.php`,

     data:{
     
        'BuscarPaciente':true,

        'buscar':buscar
     
    },
    success:function(repuesta){
    
        var datosP=jQuery.parseJSON(repuesta);
        
        var i=0
        
        let insertar=` 
        
        <table  class="table table-hover table-responsive"  role="grid">
        
        <thead>

        <tr role="row">

          <th class=""  rowspan="1" colspan="1">N°</th>

          <th class=""  rowspan="1" colspan="1" >Nombre y Apellido</th>

          <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Cedula</th>

          <th class="" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending"><center>accion</center></th>

        </tr>

      </thead>
      
      <tbody>
        `
        
        datosP.forEach(paciente=>{
            
            i=i+1  

            insertar+=`<tr> 
            
            <td>${i}</td>

            <td>${paciente.nombre}  ${paciente.apellido}</td>

            <td>${paciente.cedula}</td>

            <td>

        <div style=" display:flex;">

        <form action="nuevaCita" method="post"><button type="submit" class="btn btn-success"    id="nuevaCita"  name="Nueva_Cita"  value="${paciente.id}" style="margin:5px;">Nueva Cita</button></form> 

        <form action="datosPaciente" method="post"><button type="submit" class="btn btn-info"    id="verHistoria"  name="verHistoria"  value="${paciente.id}" style="margin:5px;">Ver Historial</button></form> 
      

        </div>

              </td>

        </tr>`
        });
        insertar+=`  </tbody>

        </table>

      `

      $('#buscarTabla').html(insertar)

    }
    

    })
})
$('#registarPacienteInicio').click(function(e){

   let server1 ='http://localhost/ubv/proyecto2'

  window.location.href = `${server1}/formularioPaciente`;

})
$('#Actualizar_p_inicio').click(function(e){
console.log("hola actulaizar")
  var id_paciente=$(this).val()

  $.ajax({
    
    type:'POST',
  
    url:`${server}vistas/datosPaciente.php`,
  
    data:{
  
      'ver_paciente':true,
  
      'actualizar_paciente':id_paciente 
  
    }, success:function(citas){

      let server1 ='http://localhost/ubv/proyecto2'

      window.location.href = `${server1}/datosPaciente`;
    }

  })

})