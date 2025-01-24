<?php
$peticionesAjax=true;
require_once "../config/App.php";
if (isset($_POST['nombre'])) {

    require_once "../controlador/pacienteControlador.php";
    
    $in_paciente=new pacienteControlador();
    
    $in_paciente->agregar_paciente_controlador();  
           
    
}else {
     
    session_start(['name'=>'Inmufa']);
    
    session_unset();
    
    session_destroy();
    
    header("location: ".SERVERURL."home/");
    
    exit();
    
}

