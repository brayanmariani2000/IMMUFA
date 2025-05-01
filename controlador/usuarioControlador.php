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
    
    $sexo=conexionModelo::limpiar_texto($_POST['sexo']);
    
    $correo=conexionModelo::limpiar_texto($_POST['correo']);

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
      $agregar_usuario_persona=usuarioModelo::agregar_persona_1($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo);
        
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
      if ($row['status']==1) {
      
        $json[]=array(

          'value'=>$row['id_medico'],
  
          'Nmedico'=>$row['nombre'],
  
          'Amedico'=>$row['apellido'],
  
          'especialidades'=>$row['id_especialidad']

        );
      
      }




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

        'especialidades'=>$row['especialidad'],

        'status'=>$row['status']

      );


    }

  }

  $jason=json_encode($json);

  echo $jason;

}

public function habilitar_dependencia($dependencia){

  $habilitarDependencia=usuarioModelo::habilitar_dependencia_modelo($dependencia);

  if ($habilitarDependencia->rowCount()>0) {

    echo 1;

  }else{

    echo 2;

  }

}
public function habilitar_area($area){

  $habilitarArea=usuarioModelo::habilitar_area_modelo($area);

  if ($habilitarArea->rowCount()>0) {

    echo 1;

  }else{

    echo 2;

  }

}

public function obtener_usuario_controlador($id) {
  $sql = usuarioModelo::listar_usuarios_modal();
  
  if($sql->rowCount() > 0) {
      $lista = $sql->fetchAll();
      $json = array();
      
      foreach($lista as $row) {
          if($row['id_usuario'] == $id && $row['status'] == 1) {
            $json[] = array(
              'id_usuario' => $row['id_usuario'],
              'nombres' => $row['nombre'],
              'apellido' => $row['apellido'],
              'cedula' => $row['cedula'],
              'telefono' => $row['telefono'],
              'correo' => $row['correo'],
              'fecha_nacimiento' => $row['fecha_nacimiento'],
              'sexo' => $row['sexo'],
              'rol' => $row['rol'],
              'nacionalidad' => $row['nacionalidad'],
              'parroquia' => $row['parroquias'],
              'municipio' => $row['municipio'],
              'etnia' => $row['etnias'],
              'discapacidad' => $row['discapacidades']
          );
      }
  }
  
  echo json_encode($json);
  exit;
} else {
  header('Content-Type: application/json');
  echo json_encode(array('error' => 'No se encontraron usuarios activos'));
  exit;
}
}
public function obtener_medico_json($id) {
  $sql = usuarioModelo::listar_medicos_modal();
  
  if($sql->rowCount() > 0) {
      $lista = $sql->fetchAll();
      $json = array();
      
      foreach($lista as $row) {
          if($row['id_medico'] == $id){
              // Calcular la edad basada en la fecha de nacimiento
              $fechaNac = new DateTime($row['fecha_nacimiento']);
              $hoy = new DateTime();
              $edad = $hoy->diff($fechaNac)->y;
              
              $json[] = array(
                  'id_medico' => $row['id_medico'],
                  'nombres' => $row['nombre'],
                  'apellido' => $row['apellido'],
                  'cedula' => $row['cedula'],
                  'telefono' => $row['telefono'],
                  'correo' => $row['correo'],
                  'fecha_nacimiento' => $row['fecha_nacimiento'],
                  'edad' => $edad,
                  'sexo' => ($row['sexo'] == 1) ? 'Femenino' : 'Masculino',
                  'especialidad' => $row['especialidad'],
                  'nacionalidad' => ($row['nacionalidad'] == 1) ? 'Venezolano' : 'Extranjero',
                  'parroquia' => $row['parroquias'],
                  'municipio' => $row['municipio'],
                  'etnia' => $row['etnias'],
                  'discapacidad' => $row['discapacidades'],
                  'status' => ($row['status'] == 1) ? 'Activo' : 'Inactivo'
              );
          }
      }
      
      header('Content-Type: application/json');
      echo json_encode($json);
      exit;
  } else {
      header('Content-Type: application/json');
      echo json_encode(array('error' => 'No se encontraron médicos activos'));
      exit;
  }
}
}

