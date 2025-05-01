<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/usuarioControlador.php";
$in_usuario=new usuarioControlador();
if (isset($_POST['nombre'])) {
    # code...
   
    $in_usuario->nuevo_usuario_controlador();  
           
}

if (isset($_POST['eliminarUsuario'])) {
    if ($_POST['eliminarUsuario']==true){
        $in_usuario->eliminar_usuario_controlador($_POST['cedula_usuario']);
        
    }
}
if (isset($_POST['action'])) {
    if ($_POST['action']=='obtener_usuario'){
        $in_usuario->obtener_usuario_controlador($_POST['id']);
    }
}