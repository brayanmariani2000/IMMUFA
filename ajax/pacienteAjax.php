<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/pacienteControlador.php";
    
$in_paciente=new pacienteControlador();
if (isset($_POST['nombre'])) {


    
    $in_paciente->agregar_paciente_controlador();  
           
    
}

if(isset($_POST['regsitrar_Paciente'])){

    $in_paciente->agregar_cita_controlador();  
}

else {
     
    session_start(['name'=>'Inmufa']);
    
    session_unset();
    
    session_destroy();
    
    header("location: ".SERVERURL."home/");
    
    exit();
    
}

