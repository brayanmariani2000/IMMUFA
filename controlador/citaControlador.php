<?php if ($peticionesAjax) {
    require_once "../modelos/citasModelo.php";
}else {
    require_once "./modelos/citasModelo.php";
}
class citaControlador extends citaModelo{
    public function contar_cita_espera_controlador(){
        $cont=0;
        $contar=citaModelo::contar_cita_modelo();
        if ($contar->rowCount()>0) {
            $contador=$contar->fetchAll();
            foreach($contador as $row){
             if ($row['condicion_id']==1) {
                $cont=$cont+1;
             }   
            }
        }
    return $cont;
    }
    public function contar_cita_atendidas_controlador(){
        $cont=0;
        $contar=citaModelo::contar_cita_modelo();
        if ($contar->rowCount()>0) {
            $contador=$contar->fetchAll();
            foreach($contador as $row){
             if ($row['condicion_id']==3) {
                $cont=$cont+1;
             }   
            }
        }
    return $cont;
    }
    public function mostrar_citas(){
        $brayan=0;
        $mostar=citaModelo::mostrar_cita_modelo();
        if ($mostar->rowCount()>0) {
            $contador=$mostar->fetchAll();
              foreach ($contador as $row) {
                if ($row['condicion_id']==1) {
                  $brayan=$brayan+1;
                  ?>
                  <tr>
                  <td><?php echo $brayan?></td>
                  
                  <td><?php echo $row['nombre'].' '. $row['apellido']?> </td>

                  <td><?php echo  $row['cedula']?></td>
                  
                  <td><?php echo  $row['especialidad']?></td>
                  
                  <td><?php echo  $row['fecha_consulta']?></td>
                  
                  <td><?php echo  $row['dependencia']?></td>
                  
                  <td>
              
                  <div style=" display:flex;">
                    
                    <button type="submit" class="btn btn-info"    id="actualizar_cita"     value="<?php echo $row['id_cita']?>" style="margin:5px;">Actualizar Cita</button>
              
                    </div>
                    
                </td>
              </tr><?php
                    
                }
              }
            }
    }
    public function mostrar_citas_x_personas_controlador($idCita){

         $mostrarCitas=citaModelo::mostrar_cita_modelo_x_persona($idCita);

         $lista=$mostrarCitas->fetchAll();
         
         $datos=array();
         
         foreach($lista as $row){
         
          $datos[]=array(

          'nombrePaciente'=>$row['nombre'],

          'apellidoPaciente'=>$row['apellido'],

          'cedulaPaciente'=>$row['cedula'],
          
          'fechaConsulta'=>$row['fecha_consulta'],
          
          'especialidad'=>$row['especialidad'],
          
          'condicion'=>$row['id_condicion'],
          
          'id_consulta'=>$row['id_consulta'],
          
          'id_cita'=>$row['id_cita'],

          'id_especialidad'=>$row['id_especialidad']
          );
         }
         $jason=json_encode($datos);

         echo $jason;        
    }
      public function Historia_cita_controlador(){
        $mostar=citaModelo::historia_cita_modelo();
        $brayan=0;
        if ($mostar->rowCount()>0) {
          $contador=$mostar->fetchAll();
            foreach ($contador as $row) {
                $brayan=$brayan+1;
                ?>
                <tr>
                <td><?php echo $brayan?></td>
                
                <td><?php echo $row['Nombre_Paciente'] .' '. $row['Apellido_Paciente']?> </td>
                
                <td><?php echo  $row['Cedula_Paciente']?></td>
                
                <td><?php echo  $row['Especialidad']?></td>
                
                <td><?php echo   $row['Nombre_Medico'] .' '. $row['Apellido_Medico']?></td>
                
                <td><?php echo  $row['Fecha_Atencion']?></td>

                <td><?php echo  $row['Fecha_Registro']?></td>

                <td><?php echo  $row['Nombre_Registrador'] .' '. $row['Apellido_Registrador']?></td>

            </tr><?php
    
            }
          }

    }
      public function citas_dias_controlador($especialidad,$especialista,$fecha_consulta){

        $CantidadCitas=citaModelo::citas_dias_modelos($especialidad,$especialista,$fecha_consulta);

        $lista=$CantidadCitas->fetchAll();
        
        $datos=array();

        foreach($lista as $row){
         
          $datos[]=array(

          'cantidadCita'=>$row['total_citas']

          );
         }
         $jason=json_encode($datos);

         echo $jason;

    }

    public function cita_Especialidad($especialidad){
     $brayan=0;
      date_default_timezone_set('America/Caracas');

      $hoy = date('Y-m-d');
      
      $citas=citaModelo::citasEspecialidadModelos($especialidad,$hoy);

      $lista=$citas->fetchAll();

       foreach($lista as $row){
        $brayan++;
        ?>
        <tr>
        <td><?php echo $brayan?></td>
        
        <td><?php echo $row['paciente']?> </td>

        <td><?php echo  $row['cedula']?></td>
        
        <td><?php echo  $row['especialidad']?></td>
        
        <td><?php echo  $row['fecha_consulta']?></td>
        
        <td><?php echo  $row['fecha_nacimiento']?></td>

        <td><?php if($row['id_condicion']==1){
           echo  '<span class="badge badge-info rounded-pill px-3 py-2">
                        <span class="text-white font-weight-bold">'.$row['condicion'].'</span>
                    </span>'  ;
           }elseif($row['id_condicion']==2){
            echo '<span class="badge bg-warning rounded-pill px-3 py-2">
                        <span class="text-white font-weight-bold">'.$row['condicion'].'</span>
                    </span>';
           }elseif($row['id_condicion']==3){
            echo '<span class="badge bg-class  rounded-pill px-3 py-2">
                        <span class="text-white font-weight-bold">'.$row['condicion'].'</span>
                    </span>';
           }elseif($row['id_condicion']==4){
            echo'<span class="badge badge-danger rounded-pill px-3 py-2">
                        <span class="text-white font-weight-bold">'.$row['condicion'].'</span>
                    </span>';
           }?></td>
        
        <td>
    
        <div style=" display:flex;">
          
          <button type="submit" class="btn btn-info"    id="actualizar_cita"     value="<?php echo $row['id_cita']?>" style="margin:5px;">Actualizar Cita</button>
    
          </div>
          
      </td>
    </tr><?php

       }

    }

    public function cita_actualizar_Controlador($estado_cita,$id){

      $citas=citaModelo::citas_actualizar_Modelo($estado_cita,$id);

      if($citas->rowCount() > 0) {
        echo json_encode([
            'success' => true,
            'message' => 'Estado de la cita actualizado correctamente'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No se encontró la cita o no hubo cambios'
        ]);
    }

    }
    public function mostrar_citas_atendidas(){
      $brayan=0;
      $mostar=citaModelo::mostrar_cita_modelo();
      if ($mostar->rowCount()>0) {
          $contador=$mostar->fetchAll();
            foreach ($contador as $row) {
              if ($row['condicion_id']==3) {
                $brayan=$brayan+1;
                ?>
                <tr>
                <td><?php echo $brayan?></td>
                
                <td><?php echo $row['nombre'].' '. $row['apellido']?> </td>

                <td><?php echo  $row['cedula']?></td>
                
                <td><?php echo  $row['especialidad']?></td>
                
                <td><?php echo  $row['fecha_consulta']?></td>
                
                <td><?php echo  $row['dependencia']?></td>
                
            </tr><?php
                  
              }
            }
          }
  }
  public function mostrar_citas_perdidas(){
    $brayan=0;
    $mostar=citaModelo::mostrar_cita_modelo();
    if ($mostar->rowCount()>0) {
        $contador=$mostar->fetchAll();
          foreach ($contador as $row) {
            if ($row['condicion_id']==4) {
              $brayan=$brayan+1;
              ?>
              <tr>
              <td><?php echo $brayan?></td>
              
              <td><?php echo $row['nombre'].' '. $row['apellido']?> </td>

              <td><?php echo  $row['cedula']?></td>
              
              <td><?php echo  $row['especialidad']?></td>
              
              <td><?php echo  $row['fecha_consulta']?></td>
              
              <td><?php echo  $row['dependencia']?></td>
              
          </tr><?php
                
            }
          }
        }
}
}