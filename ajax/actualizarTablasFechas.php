<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/listarControlador.php";

$in_mini_paciente=new tablaControlador();
if($_POST['tablaTipo']=='dependencias'){
echo $in_mini_paciente-> listar_citas_cantidad_dependecias_tabla_controlador_fechas();
}elseif($_POST['tablaTipo']=='especialidades'){
    echo $in_mini_paciente-> listarPacientesEspecialidadTablaControlador_fechas();
}elseif($_POST['tablaTipo']=='edades'){
    echo $in_mini_paciente-> listarPacientesEdadTablaControlador_fechas();
}elseif($_POST['tablaTipo']=='etnias'){
    echo $in_mini_paciente-> listarPacientesEtniaTablaControlador_fechas();
}elseif($_POST['tablaTipo']=='discapacidades'){
    echo $in_mini_paciente-> listarPacientesDiscapacidadTablaControlador_fechas();
}elseif($_POST['tablaTipo']=='municipios'){
    echo $in_mini_paciente-> listarPacientesMunicipioTablaControlador_fechas();
}elseif($_POST['tablaTipo']=='parroquias'){
    echo $in_mini_paciente-> listar_citas_cantidad_parroquias_tabla_controlador_fechas();   
}else{
    var_dump($_POST);
}
;