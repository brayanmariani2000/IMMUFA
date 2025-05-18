<?php
if ($peticionesAjax) {
  require_once "../modelos/loginModelo.php";
}else {
  require_once "./modelos/loginModelo.php";
}

class loginControlador extends loginModelo{
    /*---------controlador de inicio de sesion---------*/ 
  public function iniciar_sesion_controlador($usuario,$clave){
    $jeison=array();

    $chec_correo=new loginModelo();

    $chec_correo=$chec_correo->iniciar_sesion_modelo($usuario);

    if ($chec_correo->rowCount()>0) {

    $row=$chec_correo->fetch();

      if($row['clave']==$clave){
      
         session_start(['name'=>'Inmufa']);

      $_SESSION['Usuario']=$row['id_usuario'];

      $_SESSION['Nombre']=$row['nombre'];

      $_SESSION['apellido']=$row['apellido'];

      $_SESSION['rol']=$row['rol'];

      $_SESSION['role']=$row['roles'];

      $_SESSION['estado']=$row['status'];

      $_SESSION['token']=md5(uniqid( mt_rand(), true));

      $seccion=3;

      $jeison[]=array( 
     
        'seccion'=>$seccion,

         'rol'=> $_SESSION['rol']

      );
      $jason=json_encode($jeison);

      echo $jason;

    }
    else{
      $seccion=2;
      
      $jeison[]=array( 
     
        'seccion'=>$seccion

      );
      $jason=json_encode($jeison);

      echo $jason;
    }   

  }else{
        $seccion=1;

        $jeison[]=array( 
     
          'seccion'=>$seccion
        );
        $jason=json_encode($jeison);

        echo $jason;
  }
 
}


public function listar_cita() {
  $numeroRegistro = 2;
  $contador = 0;
  
  $list = conexionModelo::ejecutar_consulta_simple("SELECT * FROM persona 
      INNER JOIN cita ON cita.persona_id = persona.id_persona
      INNER JOIN discapacidad ON persona.id_discapacidad = discapacidad.id_discapacidad
      INNER JOIN parroquia ON persona.id_parroquia = parroquia.id_parroquia
      INNER JOIN municipios ON parroquia.id_municipios = municipios.id_municipio
      INNER JOIN estados ON municipios.id_estado = estados.id_estado
      INNER JOIN etnia ON persona.id_etnia = etnia.id_etnia
      INNER JOIN consulta ON consulta.id_consulta = cita.id_consulta
      INNER JOIN especialidad ON especialidad.id_especialidad = consulta.id_especialidad
      GROUP BY cita.persona_id");
  
  $datos = $list->fetchAll();

  foreach($datos as $row) {
      $contador++;
      // Calcular edad a partir de la fecha de nacimiento
      $fechaNacimiento = new DateTime($row['fecha_nacimiento']);
      $hoy = new DateTime();
      $edad = $hoy->diff($fechaNacimiento)->y;
      ?>
      <tr>
          <td><?php echo $contador; ?></td>
          <td><?php echo htmlspecialchars($row['nombre'].' '.$row['apellido']); ?></td>
          <td><?php echo htmlspecialchars($row['cedula']); ?></td>
          <td><?php echo htmlspecialchars($row['municipio'].', '.$row['parroquias']); ?></td>
          <td><?php echo htmlspecialchars($row['discapacidades']); ?></td>
          <td><?php echo htmlspecialchars($row['etnias']); ?></td>
          <td><?php echo $edad; ?> años</td>
          <td>
              <div class="btn-group" role="group">
                  <form action="<?php echo SERVERURL."nuevaCita"; ?>" method="POST" style="display: inline;">
                      <button type="submit" class="btn btn-success btn-sm" name="Nueva_Cita" value="<?php echo $row['id_persona']; ?>">
                          <i class="fas fa-calendar-plus"></i> Nueva Cita
                      </button>
                  </form>
                  
                  <form action="<?php echo SERVERURL."datosPaciente"; ?>" method="POST" style="display: inline;">
                      <button type="submit" class="btn btn-info btn-sm" name="verHistoria" value="<?php echo $row['id_persona']; ?>">
                          <i class="fas fa-history"></i> Historial
                      </button>
                  </form>
                  
              </div>
          </td>
      </tr>
      <?php
  }
}
public function tabla_area() {
  try {
      $sql = "SELECT id_especialidad, especialidad, status FROM especialidad ORDER BY especialidad ASC";
      $stmt = conexionModelo::ejecutar_consulta_simple($sql);
      
      if ($stmt->rowCount() > 0) {
          $areas = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
          foreach ($areas as $area) {
              $this->renderAreaRow($area);
          }
      } else {
          echo '<tr><td colspan="3" class="text-center">No hay áreas registradas</td></tr>';
      }
  } catch (PDOException $e) {
      error_log("Error al listar áreas: " . $e->getMessage());
      echo '<tr><td colspan="3" class="text-center text-danger">Error al cargar las áreas</td></tr>';
  }
}

private function renderAreaRow($area) {
    $id = htmlspecialchars($area['id_especialidad'], ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($area['especialidad'], ENT_QUOTES, 'UTF-8');
    $status = (int)$area['status'];
    
    // Botón de estado (habilitar/deshabilitar)
    $btnEstado = $status === 1 
        ? '<button type="button" class="btn btn-danger btn-sm btn-estado" value="'.$id.'" title="Deshabilitar área">
              <i class="ti-close"></i> Deshabilitar
           </button>'
        : '<button type="button" class="btn btn-success btn-sm btn-estado" value="'.$id.'" title="Habilitar área">
              <i class="ti-check"></i> Habilitar
           </button>';
    
    // Botón de editar
    $btnEditar = '<button type="button" class="btn btn-warning btn-sm btn-editar" value="'.$id.'" title="Editar área">
                     <i class="ti-pencil"></i> Editar
                  </button>';

    echo <<<HTML
    <tr>
        <td>{$id}</td>
        <td>{$nombre}</td>
        <td>
            <div class="d-flex justify-content-start">
                <div class="mx-1">
                    {$btnEditar}
                </div>
                <div class="mx-1">
                    {$btnEstado}
                </div>
            </div>
        </td>
    </tr>
    HTML;
}

  public function listar_dependencia() {
    try {
        $sql = "SELECT id_dependencia, dependencia, status FROM dependencias ORDER BY dependencia ASC";
        $stmt = conexionModelo::ejecutar_consulta_simple($sql);
        
        if ($stmt->rowCount() > 0) {
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($datos as $row) {
                $this->renderDependenciaRow($row);
            }
        } else {
            echo '<tr><td colspan="3" class="text-center">No hay dependencias registradas</td></tr>';
        }
    } catch (PDOException $e) {
        error_log("Error al listar dependencias: " . $e->getMessage());
        echo '<tr><td colspan="3" class="text-center text-danger">Error al cargar las dependencias</td></tr>';
    }
}

private function renderDependenciaRow($row) {
    $id = htmlspecialchars($row['id_dependencia'], ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($row['dependencia'], ENT_QUOTES, 'UTF-8');
    
    $btnEstado = $row['status'] == 1
        ? '<button class="btn btn-danger btn-sm" value="'.$id.'" title="Deshabilitar">
             <i class="fas fa-ban"></i> Deshabilitar
           </button>'
        : '<button class="btn btn-success btn-sm" value="'.$id.'" title="Habilitar">
             <i class="fas fa-check"></i> Habilitar
           </button>';
    
    $btnEditar = '<button class="btn btn-warning btn-sm" value="'.$id.'" title="Editar">
                    <i class="fas fa-edit"></i> Editar
                 </button>';

    echo '<tr>
            <td>'.$id.'</td>
            <td>'.$nombre.'</td>
            <td>'.$btnEditar.'  '. $btnEstado.'</td>
          </tr>';
}  

/*---------contolador cerrar sesion------*/
     public function cerrar_sesion_controlador(){
      session_start(['name'=>'Inmufa']);
      session_unset();
      session_destroy();
      header("location: ".SERVERURL."home");
      exit();
}
}

