<?php
$peticionesAjax=true;
require_once "../config/App.php";
if (isset($_POST['eliminar_paciente'])){
    session_start();
    require_once "../controlador/pacienteControlador.php";
    $in_paciente=new pacienteControlador();
    $in_paciente->eliminar_controlador($_POST['cedula_p']);
}