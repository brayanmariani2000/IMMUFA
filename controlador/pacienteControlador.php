<?php
if ($peticionesAjax) {
    require_once "../modelos/pacienteModelo.php";
}else {
    require_once "./modelos/pacienteModelo.php";
}
class pacienteControlador extends pacienteModelo{

  public function agregar_paciente_controlador()
  {
    /**
    * ============================================================
    * RECOLECION DE TODOS LOS DATOS Y ASIGNAMIENTO DE LA VARIABLES
    * ============================================================
    */


    $nombre=conexionModelo::limpiar_texto($_POST['nombre']);

    $apellido=conexionModelo::limpiar_texto($_POST['apellido']);

    $cedula=conexionModelo::limpiar_texto($_POST['cedula']);

    $telefono=conexionModelo::limpiar_texto($_POST['telefono']);
    
    $especialista=$_POST['especialista'];

    $fecha_naci=$_POST['fecha_naci'];

    $sexo=$_POST['sexo'];

    $parroquia=$_POST['parroquia'];

    $etnia=$_POST['etnias'];

    $discapacidad=$_POST['discapacidad'];

    $area_consulta=$_POST['area_consultar'];

    $fecha_consulta=$_POST['fecha_consulta'];

    date_default_timezone_set('America/Caracas');

    $fecha_registro = date('Y-m-d H:i:s');

    $id_usuario=$_POST['usuario'];
    
    $dependencia=$_POST['dependencia'];

    $condicion='1';

    $estado_consulta=1;

    $hora_consulta='9:00am hasta 12:00pm';
 

    /**
    * ============================================================
    * FIN DE LA RECOLECION DE TODOS LOS DATOS Y ASIGNAMIENTO DE LA VARIABLES
    * ============================================================
    */

    $validadcion_consulta=pacienteModelo::validacion_consulta($area_consulta,$especialista,$fecha_consulta,$hora_consulta,$estado_consulta);

    if($validadcion_consulta->rowCount()>0)
    {
      $row=$validadcion_consulta->fetch();

      $idConsulta=$row['id_consulta'];

    }else
    {
      $agregarConsulta=pacienteModelo::registrar_consulta_modelo($area_consulta,$especialista,$fecha_consulta,$hora_consulta);
    
      $validadcion_consulta2=pacienteModelo::validacion_consulta($area_consulta,$especialista,$fecha_consulta,$hora_consulta,$estado_consulta);

      $row=$validadcion_consulta2->fetch();
    
      $idConsulta=$row['id_consulta']; 
    }

    /*===========================================================
      VALIDACION SI LA PERSONA EXISTE
      SI LA PERSONA EXISTE EN LA BASE DE DATOS SE LE AGENDA LA CITA
      =============================================================
      */ 
    $validadcion=pacienteModelo::validacion($cedula);
        
    if ($validadcion->rowCount()>0)
    {
      $row=$validadcion->fetch();

      $idPersona=$row['id_persona'];      

      $agregar_cita=pacienteModelo::agregar_paciente_cita($idPersona,$fecha_registro,$condicion,$dependencia,$id_usuario,$idConsulta);

      echo 1;
    }else
    {
      $agregar_paciente=pacienteModelo::agregar_paciente_modelo($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo,$parroquia,$etnia,$discapacidad);
        
      $validadcion2=pacienteModelo::validacion($cedula);

      if ($validadcion2->rowCount()>0)
      {
        $row=$validadcion2->fetch();
  
        $idPersona=$row['id_persona'];

        $agregar_cita=pacienteModelo::agregar_paciente_cita($idPersona, $fecha_consulta,$condicion,$dependencia,$id_usuario,$idConsulta);

        echo 1;
      }
    }
  } 
  
  
 public function agregar_cita_controlador(){

    $estado_consulta=1;

    $hora_consulta='9:00am hasta 12:00pm';
    
    $condicion='1';
    
    $area_consulta=$_POST['area_consultar'];

    $fecha_consulta=$_POST['fecha_consulta'];

    date_default_timezone_set('America/Caracas');

    $fecha_registro = date('Y-m-d H:i:s');

    $id_usuario=$_POST['usuario'];
    
    $dependencia=$_POST['dependencia'];

    $especialista=$_POST['especialista'];

    $cedula=conexionModelo::limpiar_texto($_POST['cedula']);


    $validadcion_consulta=pacienteModelo::validacion_consulta($area_consulta,$especialista,$fecha_consulta,$hora_consulta,$estado_consulta);

    if($validadcion_consulta->rowCount()>0)
    {
      $row=$validadcion_consulta->fetch();

      $idConsulta=$row['id_consulta'];

    }else
    {
      $agregarConsulta=pacienteModelo::registrar_consulta_modelo($area_consulta,$especialista,$fecha_consulta,$hora_consulta);
    
      $validadcion_consulta2=pacienteModelo::validacion_consulta($area_consulta,$especialista,$fecha_consulta,$hora_consulta,$estado_consulta);

      $row=$validadcion_consulta2->fetch();
    
      $idConsulta=$row['id_consulta']; 
    }


    $validadcion=pacienteModelo::validacion($cedula);
        
    if ($validadcion->rowCount()>0)
    {
      $row=$validadcion->fetch();

      $idPersona=$row['id_persona'];      

      $agregar_cita=pacienteModelo::agregar_paciente_cita($idPersona,$fecha_registro,$condicion,$dependencia,$id_usuario,$idConsulta);

      echo 1;
 }
}


  public function eliminar_controlador($cedula_p){

    $eliminar_paciente=pacienteModelo::eliminar_modelo($cedula_p);
    
    if ($eliminar_paciente->rowCount()>0) {

      echo 1;

    }else {

    echo 2;
    }
  }

    /*===========================================================
    ESTA FUNCION PARA CONTAR DISCAPACITADOS
    =============================================================*/
  public function contar_discapcidad_controlador(){

      $cont=0;

      $contar=pacienteModelo::contar_discapcitados();

      if ($contar->rowCount()>0) {

          $contador=$contar->fetchAll();

            foreach ($contador as $row) {

              if ($row['id_discapacidad']>0) {

                  $cont=$cont+1;

              }
            }
          }
    return $cont;

  }
    /*===========================================================
    FUNCIONPARA MSOTRAR DISCAPACITADOS
    =============================================================*/

   public function mostrar_discapacitados(){

    $brayan=0;

    $mostar=pacienteModelo::contar_discapcitados();

    if ($mostar->rowCount()>0) {

        $contador=$mostar->fetchAll();

          foreach ($contador as $row) {

            if ($row['discapacidad']==2) {

              $brayan=$brayan+1;

              ?>

              <tr>

              <td><?php echo $brayan?></td>

              <td><?php echo $row['nombre_p'].' '. $row['apellido_p']?> </td>

              <td><?php echo  $row['cedula_p']?></td>

              <td><?php echo  $row['especialidades']?></td>

              <td><?php echo 'Municipio '. $row['municipios_n'].',Parroquia '.$row['parroquias']?></td>

              <td><?php echo  $row['tipos_discapacidad']?></td>

              <td><?php echo $brayan ?></td>

              <td><?php echo  $row['tipo_entia']?></td>

                <td>

          <div style=" display:flex;">

          <button type="submit" class="btn btn-danger"  id="eliminarBoton"  value="<?php echo $row['cedula_p']?>" style="margin:5px;"><i class="ti-close"></i></button>

          <button type="submit" class="btn btn-success" id="verInfo"        value="<?php echo $row['cedula_p']?>" style="margin:5px;"><i class="ti-user"></i> </button>

          <button type="submit" class="btn btn-info"    id="actualizar"     value="<?php echo $row['cedula_p']?>" style="margin:5px;"> <i class="ti-plus"></i></button>

          </div>

                </td>

          </tr>
          <?php

                
            }
          }
        }
   }
    /*===========================================================
    CONTAR PACIENTE
    =============================================================*/
   public function contar_paciente(){

    $cont=0;

    $contar=pacienteModelo::contador_paciente();

    if($contar->rowCount()>0){

        $contador=$contar->fetchAll();

        foreach ($contador as $row) {

            if($row['id_cita']>0){

                $cont++;

            }

        }

    }

    return $cont;

   }
    /*===========================================================
    ESTA FUNCION ES PARA MOSTRAR EN UN MODAL LOS DATOS DEL PACIENTE
    LO CONVERTI EN UN JSON LO RESIVO EN UN ARCHIVO JAVASCRIPT
    Y LO MUESTRO VER EN VISTA/PLANTILLA/JS/ACCIONES/PACIENTE.JS
    =============================================================*/
   public function datos_paciente($cedula){

        $mostrar=pacienteModelo::mostrar_paciente_modelo($cedula);

        $mostrar1=$mostrar->fetchAll();

        $datos=array();

        foreach($mostrar1 as $row){

          if($row['sexo']==1){

            $sexo='FEMENINO';

          }else {

            $sexo='MASCULINO';

          }
          $datos[]=array(
            'nombre'  => $row['nombre'],

            'apellido'=>$row['apellido'],

            'cedula'  =>$row['cedula'],

            'tipo_discapacidad'=>$row['discapacidades'],

            'municipiosN'=>$row['municipio'],

            'parroquias'=>$row['parroquias'],

            'etnias'=>$row['etnias'],

            'fechaNaci'=>$row['fecha_nacimiento'],

            'telefono'=>"+58".$row['telefono'],

            'sexo'=>$sexo,

            'sexoID'=>$row['sexo'],

            'idMunicipio'=>$row['id_municipio'],

            'idParroquia'=>$row['id_parroquia'],

          

          );

        }
        $jason=json_encode($datos);

        echo $jason;
   
}
  
       /*===========================================================
    ACTUALIZAR EN LA BASE DE DATOS LOS DATOS DEL PACIENTE
    =============================================================*/
   public function actualizar_paciente_controlador(){

    $nombre=conexionModelo::limpiar_texto($_POST['nombre']);

    $apellido=conexionModelo::limpiar_texto($_POST['apellido']);

    $cedula=conexionModelo::limpiar_texto($_POST['cedula']);

    $telefono=conexionModelo::limpiar_texto($_POST['telefono']);

    $fecha_naci=conexionModelo::limpiar_texto($_POST['fechaNaci']);

    $sexo=conexionModelo::limpiar_texto($_POST['sexo']);

    $edad=conexionModelo::limpiar_texto($_POST['edad']);

    $parroquia=conexionModelo::limpiar_texto($_POST['parroquia']);

    $municipio=conexionModelo::limpiar_texto($_POST['municipio']);

    $etnia=conexionModelo::limpiar_texto($_POST['etnia']);

    $discapacidad_p=conexionModelo::limpiar_texto($_POST['discapacidad']);

    $actualizarPaciente=pacienteModelo::actualizar_paciente($nombre,$apellido,$cedula,$fecha_naci,$telefono,$sexo,$edad,$cedula,$etnia,$discapacidad_p);

    $actualizarDireccion=pacienteModelo::actualizar_direccion($cedula,$municipio,$parroquia);

    if ($actualizarPaciente->rowCount()>0) {

      echo '1';

   }else{

    echo 2;
   }

   }



   public function buscar_Paciente($busca){
   
      $buscar=pacienteModelo::buscar_Paciente_Modelo($busca);
      
      $buscarPaciente=$buscar->fetchAll();

      $datos=array();


      foreach($buscarPaciente as $row){

        if($row['sexo']==1){
    
          $sexo='FEMENINO';
    
        }else {
    
          $sexo='MASCULINO';
    
        }
        $datos[]=array (

        'nombre'=>$row['nombre'],

        'apellido'=>$row['apellido'],
  
        'cedula'  =>$row['cedula'],
  
        'telefono'=>"+58".$row['telefono'],
  
        'sexo'=>$sexo,

        'id'=>$row['id_persona']
        );        

      }
      $jason=json_encode($datos);

      echo $jason;
   }


   public function datosPacienteActualizar($idPaciente) {
    $mostrar = pacienteModelo::mostrar_paciente_modelo($idPaciente);
    $mostrar1 = $mostrar->fetchAll();

    foreach($mostrar1 as $row) {
        echo '

           <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-signature mr-2"></i>Nombres</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">'.htmlspecialchars($row['nombre']).'</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Apellido -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-signature mr-2"></i>Apellidos</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">'.htmlspecialchars($row['apellido']).'</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cédula -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-id-card mr-2"></i>Cédula</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-address-card text-primary"></i></span>
                                </div>
                                        <p class="form-control bg-light">'.htmlspecialchars($row['cedula']).'</p>
                                <input type="hidden" name="usuario" id="cedula" value="'.htmlspecialchars($row['cedula']).'">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Teléfono -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-mobile-alt mr-2"></i>Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">'.htmlspecialchars($row['telefono']).'</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Fecha Nacimiento -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-birthday-cake mr-2"></i>Fecha Nacimiento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="far fa-calendar text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">15/03/1985</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edad -->
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary"><i class="fas fa-user-clock mr-2"></i>Edad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-primary"></i></span>
                                </div>
                                <p class="form-control bg-light">39 años</p>
                            </div>
                        </div>
                    </div>';
    }
}

public function datosCitaActualizar($idPaciente) {
    $mostrar = pacienteModelo::mostrar_citas_modelo($idPaciente);
    $mostrar1 = $mostrar->fetchAll();

    foreach($mostrar1 as $row) {
        echo '
        <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="fas fa-stethoscope mr-2"></i>Especialidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-medal text-info"></i></span>
                                </div>
                                <p class="form-control bg-light">'.htmlspecialchars($row['especialidad']).'</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Médico -->
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="fas fa-user-md mr-2"></i>Médico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user-tie text-info"></i></span>
                                </div>
                                <p class="form-control bg-light">'.htmlspecialchars($row['nombre'].' '.$row['apellido']).'</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Estado -->
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="fas fa-clipboard-check mr-2"></i>Estado</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-tasks text-info"></i></span>
                                </div>'?><?php if ($row['id_condicion']==3){

                                     echo '<p class="form-control bg-info rounded-pill px-3 py-2">'.htmlspecialchars($row['condicion']).'</p>';
                                          
                                
                                }elseif($row['id_condicion']==4){
                                
                                    echo '<p class="form-control bg-danger">'.htmlspecialchars($row['condicion']).'</p>' ;
                                
                                }else{
                                    echo ' 
                                    <select class="form-control">
                                      <option value="5" selected>---SELECCIONE---</option>
                                        <option value="1">AGENDADA</option>
                                        <option value="2">POSPUESTA</option>
                                        <option value="3">ATENDIDA</option>
                                        <option value="4">PERDIDA</option>
                                      
                                    </select>';

                                }?>
                                <?php echo'
                            </div>
                        </div>
                    </div>
                    
                    <!-- Fecha Consulta -->
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label class="font-weight-bold text-info"><i class="far fa-calendar-alt mr-2"></i>Fecha Consulta</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-clock text-info"></i></span>
                                </div>
                                <p class="form-control bg-light">'.htmlspecialchars($row['fecha_consulta']).'</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Acciones -->
                    <div class="col-md-2 d-flex align-items-end mb-3">
                        <button class="btn btn-info btn-block" id="ActualizarBtnActul" value="'.htmlspecialchars($row['id_cita']).'">
                            <i class="fas fa-save mr-2"></i>Guardar
                        </button>
                    </div>';
    }
}
}

