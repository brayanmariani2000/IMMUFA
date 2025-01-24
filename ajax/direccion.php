<?php
$peticionesAjax=true;
require_once "../config/App.php";
    require_once "../controlador/listarControlador.php";
    $in_muni=new listarControlador();
    $in_muni->listar_parroquia_controlador();