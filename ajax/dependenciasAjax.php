<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/usuarioControlador.php";
$in_dependencia=new usuarioControlador();
if (isset($_POST['dependencia'])) {
   
    $in_dependencia->nueva_dependencia($_POST['dependencia']);  
           
}

if (isset($_POST['eliminarDependencia'])) {
    if ($_POST['eliminarDependencia']==true){
        $in_dependencia->eliminar_dependencia_controlador($_POST['idDependencias']);
        
    }
}