<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/usuarioControlador.php";
$in_medico=new usuarioControlador();
if (isset($_POST['nombre'])) {
    
    $in_medico->agregar_medico_controlador();

}

if (isset($_POST['eliminarMedico'])) {
   
    if ($_POST['eliminarMedico']==true){

        $in_medico->eliminar_Medico_controlador($_POST['cedulaM']);
        
    }
}
if (isset($_POST['especialistaCita'])){

    if ($_POST['especialistaCita']==true){
         
        $in_medico->listar_especialista_controlador();
        
    }
    
}
if (isset($_POST['obtenerMedico'])){

    if ($_POST['obtenerMedico']==true){
         
        $in_medico->obtener_medico_json($_POST['id']);
        
    }
    
}
