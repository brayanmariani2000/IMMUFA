<?php
$peticionesAjax=true;

require_once "../config/App.php";

require_once "../controlador/usuarioControlador.php";

$in_area=new usuarioControlador();

if (isset($_POST['area'])) {
   
    $in_area->nueva_especilidad();  
           
}

if (isset($_POST['eliminarArea'])) {
   
    if ($_POST['eliminarArea']==true){
   
        $in_area->eliminar_area_controlador($_POST['idEspecialidad']);
        
    }
}

if (isset($_POST['CitaxEspecialidad'])){
   
    if ($_POST['CitaxEspecialidad']==true){
   
        $in_area->Listar_especialidad_x_cita();
        
    }
}
