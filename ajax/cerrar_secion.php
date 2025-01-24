<?php
$peticionesAjax=true;
require_once "../config/App.php";

if ($peticionesAjax==true) {

  require_once '../controlador/loginControlador.php';
 
  $login=new loginControlador();
 
  $login->cerrar_sesion_controlador();
}