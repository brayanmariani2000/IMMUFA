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
if(isset($_POST['habilitarDependencia'])){
    if($_POST['habilitarDependencia']==true){
        $in_dependencia->habilitar_dependencia($_POST['idDependencias']);
    }
}

if(isset($_POST['editarDependencia'])){
    if($_POST['editarDependencia']==true){
        $in_dependencia->actualizar_dependencias_controlador($_POST['idDependencias'],$_POST['nombreDependencias']);
    }
}
