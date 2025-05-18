<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/pacienteControlador.php";
error_reporting(0);
$in_paciente=new pacienteControlador();
if (isset($_POST['datosCompletoPaciente'])) {
    
    $in_paciente->agregar_paciente_controlador();             
}elseif(isset($_POST['regsitrar_Paciente'])){

    $in_paciente->agregar_cita_controlador();  
}

