<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/listarControlador.php";

$in_mini_paciente=new tablaControlador();
echo $in_mini_paciente->  generarJsonDiscapacidadDonutControlador();