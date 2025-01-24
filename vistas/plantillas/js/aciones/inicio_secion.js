import { server } from "./variables.js";

$('#login').submit(function(e){
 
  console.log(server)
 
  const usuarios={
 
    usuario:$('#usuario').val(),
 
    clave:$('#clave').val()
 
  }
 
  e.preventDefault();
 
  $.post(`${server}ajax/loginAjax.php`,usuarios,function(repuesta){
    
    var seccion=jQuery.parseJSON(repuesta);
    
    seccion.forEach(s => {
      
 
    if(s.seccion==1){
 
      Swal.fire({
 
        type: 'error',
 
        title: 'Error',
 
        text: 'Usuario Invalido',        
 
      });
 
    }else if(s.seccion==2){
 
      Swal.fire({
 
        type: 'error',
 
        title: 'Error',
 
        text: 'Contraseña Invalido',        
 
      });
 
    }else{
        if (s.seccion==3) {

          if (s.rol==1 ) {
            
            window.location.href = `${server}inicio2`
          
          }else if(s.rol==2){

            window.location.href = `${server}inicio2`

          }else{

            window.location.href = `${server}inicio`
          
          }
          
        }
     
 
    }
  });
 console.log(seccion)
  }
 
  )
 
})