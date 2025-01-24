<?php
$peticionesAjax=true;
require_once "../config/App.php";
if (isset($_POST['cedula'])){
    session_start();
    require_once "../controlador/pacienteControlador.php";
    $in_paciente=new pacienteControlador();
    $in_paciente->actualizar_paciente_controlador();
}