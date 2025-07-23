<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/usuarioControlador.php";
$in_configuracion=new usuarioControlador();
if (isset($_POST['nuevaEtnia'])) {
   
    if ($_POST['nuevaEtnia']==true){
        $in_configuracion->agregar_etnia_controlador($_POST['nombreEtnia']);
        
    } 
           
}
if (isset($_POST['nuevaDiscapcidad'])) {
    if ($_POST['nuevaDiscapcidad']==true){
        $in_configuracion->agregar_discapacidad_controlador($_POST['nombreDiscapcidad']);
        
    }
}
if(isset($_POST['nuevaParroquia'])){
    if($_POST['nuevaParroquia']==true){
        $in_configuracion->agregar_parroquia_controlador($_POST[ 'nombreParroquia'],$_POST['idMunicipio']);
    }
}
if(isset($_POST['actualizarDiscapaciad'])){
    if($_POST['actualizarDiscapaciad']==true){
        $in_configuracion-> actualizar_discapacidad_controlador($_POST[ 'id'],$_POST['nombre']);
    }
}
if(isset($_POST['actualizarEtnia'])){
    if($_POST['actualizarEtnia']==true){
        $in_configuracion->actualizar_etnia_controlador($_POST[ 'id'],$_POST['nombre']);
    }
}
if(isset($_POST['actualizarParroquia'])){
    if($_POST['actualizarParroquia']==true){
        $in_configuracion->actualizar_parroquia_controlador($_POST['id'],$_POST['nombre'],$_POST['id_municipio']);
    }
}

