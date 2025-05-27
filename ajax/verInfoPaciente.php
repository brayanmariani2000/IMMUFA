<?php

$peticionesAjax=true;

require_once "../config/App.php";

if (isset($_POST['ver_paciente'])){
    
    require_once "../controlador/pacienteControlador.php";
    
    $in_paciente=new pacienteControlador();
    
    $in_paciente->datos_paciente($_POST['id_persona']);

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

}elseif(isset($_POST['action'])){ 

    require_once "../controlador/pacienteControlador.php";
               
    $buscar=new pacienteControlador();

    echo $buscar->buscar_Paciente_historia_controlador($_POST['buscar']);

}elseif(isset($_POST['actualizarDatosPaciente'])){

    require_once "../controlador/pacienteControlador.php";
               
    $buscar=new pacienteControlador();

    echo $buscar->actualizar_paciente_controlador();

}