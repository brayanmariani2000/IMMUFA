<?php
$peticionesAjax=true;
require_once "../config/App.php";

if (isset($_POST['usuario'])){
    require_once '../controlador/loginControlador.php';
    $login=new loginControlador();
    $login->iniciar_sesion_controlador($_POST['usuario'],$_POST['clave']);
}else {
    session_start(['name'=>'Inmufa']);
    session_unset();
    session_destroy();
    header("location: ".SERVERURL."login/");
    exit();
}
