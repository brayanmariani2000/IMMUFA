<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/usuarioControlador.php";
$in_medico=new usuarioControlador();
if (isset($_POST['nombre'])) {
    # code...
   
    $in_medico->nuevo_usuario_controlador();  
           
}

if (isset($_POST['eliminarUsuario'])) {
    if ($_POST['eliminarUsuario']==true){
        $in_medico->eliminar_usuario_controlador($_POST['cedula_usuario']);
        
    }
}
