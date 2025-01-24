<?php

$peticionesAjax=true;

require_once "../config/App.php";

if (isset($_POST['ver_paciente'])){
    
    require_once "../controlador/pacienteControlador.php";
    
    $in_paciente=new pacienteControlador();
    
    $in_paciente->datos_paciente($_POST['cedula_p']);

}elseif(isset($_POST['BuscarPaciente'])){
 
    if (($_POST['BuscarPaciente'])==true) {
        
        require_once "../controlador/pacienteControlador.php";
               
        $buscar=new pacienteControlador();

        echo $buscar->buscar_Paciente($_POST['buscar']);

    }

}elseif(isset($_POST['actualizar_paciente'])){
  
    if (($_POST['actualizar_paciente'])==true) {
        
        require_once "../controlador/pacienteControlador.php";
               
        $actualizar=new pacienteControlador();

        $actualizar->datosPacienteActualizar($_POST['actualizar_paciente']);

    }

}