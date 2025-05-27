<?php
$peticionesAjax=true;
require_once "../config/App.php";
require_once "../controlador/citaControlador.php";
require_once "../controlador/pacienteControlador.php";
$in_cita=new citaControlador();
$in_paciente=new pacienteControlador();
if (isset($_POST['motivo'])) {
   
        $in_cita->agendar_cita_controlador();  
           
    }

if(isset($_POST['ver_Cita'])){
    
    if($_POST['ver_Cita']==true){
    
        $in_cita->mostrar_citas_x_personas_controlador($_POST['id_cita']);
    
    }
}
if(isset($_POST['cantidadPacienteXDia'])){
    
    if($_POST['cantidadPacienteXDia']==true){
    
        $in_cita->citas_dias_controlador($_POST['especialidad'],$_POST['especialista'],$_POST['fecha_cita']);
    
    }

}

if(isset($_POST['citaNueva'])){

    echo $in_paciente->agregar_cita_controlador();
    
}
