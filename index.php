<?php
require_once "config/config.php";
require_once "./config/App.php";
require_once "./controlador/vistasControlador.php";

$plantilla=new vistasControlador();
$plantilla->obtener_plantilla_controlador();