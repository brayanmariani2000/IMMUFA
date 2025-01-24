<?php
$peticionesAjax=true;
require_once "../config/App.php";
if (isset($_POST['motivo'])) {
    require_once "../controlador/citaControlador.php";
        $in_cita=new citaControlador();
        $in_cita->agendar_cita_controlador();  
           
    }
    else {
        session_start(['name'=>'Inmufa']);
        session_unset();
        session_destroy();
        header("location: ".SERVERURL."home/");
        exit();
    }

