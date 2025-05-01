<?php
$peticionesAjax=true;
require_once "../config/App.php";
if (isset($_POST['cita_actualizar'])){
    session_start();
    require_once "../controlador/citaControlador.php";
    $in_paciente=new citaControlador();
    $in_paciente->cita_actualizar_Controlador($_POST['condicion'],$_POST['id_cita']);
}