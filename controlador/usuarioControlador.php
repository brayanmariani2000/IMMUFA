<?php
if ($peticionesAjax) {
    require_once "../modelos/usuarioModelo.php";
}else {
    require_once "./modelos/usuarioModelo.php";
}
class usuarioControlador extends usuarioModelo{

   public function agregar_medico_controlador(){
  
    $nombre=conexionModelo::limpiar_texto($_POST['nombre']);
  
    $apellido=conexionModelo::limpiar_texto($_POST['apellido']);
  
    $cedula=conexionModelo::limpiar_texto($_POST['cedula']);
  
    $telefono=conexionModelo::limpiar_texto($_POST['telefono']);
  
    $fecha_naci=conexionModelo::limpiar_texto($_POST['fecha_naci']);
  
    $especialidad=conexionModelo::limpiar_texto($_POST['especialidad']);
     
    $validadcion=usuarioModelo::validacion($cedula);

    if ($validadcion->rowCount()>0)
    {
      $row=$validadcion->fetch();

      $idPersona=$row['id_persona'];      

      $agregar_usuario=usuarioModelo::nuevo_medico($idPersona,$especialidad);

      echo 1;

    }else
    {
      $agregar_usuario_persona=usuarioModelo::agregar_persona($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo,$correo);
        
      $validadcion2=usuarioModelo::validacion($cedula);

      if ($validadcion2->rowCount()>0)
      {
        $row=$validadcion2->fetch();
  
        $idPersona=$row['id_persona'];

        $agregar_usuario=usuarioModelo::nuevo_medico($idPersona,$especialidad);

        echo 1;
      }
    }

 }

 
 public function nuevo_usuario_controlador(){
   
    $nombre=conexionModelo::limpiar_texto($_POST['nombre']);

    $apellido=conexionModelo::limpiar_texto($_POST['apellido']);
  
    $cedula=conexionModelo::limpiar_texto($_POST['cedula']);
   
    $usuario=conexionModelo::limpiar_texto($_POST['usuario']);
   
    $clave=conexionModelo::limpiar_texto($_POST['clave']);

    $telefono=conexionModelo::limpiar_texto($_POST['telefono']);
    
    $fecha_naci=conexionModelo::limpiar_texto($_POST['fecha_nacimiento']);
     
    $sexo=conexionModelo::limpiar_texto($_POST['sexo']);
   
    $rol=conexionModelo::limpiar_texto($_POST['rol']);

    $correo=null;

    $validadcion=usuarioModelo::validacion($cedula);

    if ($validadcion->rowCount()>0)
    {
      $row=$validadcion->fetch();

      $idPersona=$row['id_persona'];      

      $agregar_usuario=usuarioModelo::nuevo_usuario($rol,$idPersona,$usuario,$clave);

      echo 1;
    }else
    {
      $agregar_usuario_persona=usuarioModelo::agregar_medico_modelo($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo);
        
      $validadcion2=usuarioModelo::validacion($cedula);

      if ($validadcion2->rowCount()>0)
      {
        $row=$validadcion2->fetch();
  
        $idPersona=$row['id_persona'];

        $agregar_usuario=usuarioModelo::nuevo_usuario($rol,$idPersona,$usuario,$clave);

        echo 1;
      }
    }
 }

 public function nueva_especilidad(){

  $especialidad=conexionModelo::limpiar_texto($_POST['area']);

  $nueva_especialidad=usuarioModelo::nuevo_especilidad_modelo($especialidad);

 if ($nueva_especialidad->rowCount()>0) {

   echo 1;
 
  }else{
 
    echo 2;
 }

}


public function nueva_dependencia($dependencia){
 
  $dependencia=conexionModelo::limpiar_texto($dependencia);
 
  $nueva_dependencia=usuarioModelo::nueva_dependencia_modelo($dependencia);
 
  if ($nueva_dependencia->rowCount()>0) {
 
    echo 1;
 
  }else{
 
    echo 2;
 }

} 


public function eliminar_Medico_controlador($cedula){

  $eliminarMedico=usuarioModelo::eliminar_medico_modelo($cedula);

  if ($eliminarMedico->rowCount()>0) {

    echo 1;

  }else{

    echo 2;

  }
}


public function eliminar_usuario_controlador($cedula){

  $eliminarMedico=usuarioModelo::eliminar_usuario_modelo($cedula);

  if ($eliminarMedico->rowCount()>0) {

    echo 1;

  }else{

    echo 2;
  }

}


public function eliminar_dependencia_controlador($dependencia){

  $eliminarDependencia=usuarioModelo::eliminar_dependencia_modelo($dependencia);

  if ($eliminarDependencia->rowCount()>0) {

    echo 1;

  }else{

    echo 2;

  }

}



public function eliminar_area_controlador($area){

  $eliminarArea=usuarioModelo::eliminar_area_modelo($area);

  if ($eliminarArea->rowCount()>0) {

    echo 1;

  }else{

    echo 2;

  }

}

public function listar_especialista_controlador(){

  $sql=usuarioModelo::listar_especialista();

  if($sql->rowCount()>0){

    $lista=$sql->fetchAll();

    $json=array();

    foreach($lista as $row){

      $json[]=array(

        'value'=>$row['id_medico'],

        'Nmedico'=>$row['nombre'],

        'Amedico'=>$row['apellido'],

        'especialidades'=>$row['id_especialidad']

      );


    }

  }

  $jason=json_encode($json);

  echo $jason;
}  

public function Listar_especialidad_x_cita(){
 
  $sql=usuarioModelo::listar_especialidad_x_cita_moldelo();

  if($sql->rowCount()>0){

    $lista=$sql->fetchAll();

    $json=array();

    foreach($lista as $row){

      $json[]=array(

        'especialidades'=>$row['especialidad']

      );


    }

  }

  $jason=json_encode($json);

  echo $jason;
}
}

