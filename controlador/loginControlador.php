<?php
if ($peticionesAjax) {
  require_once "../modelos/loginModelo.php";
}else {
  require_once "./modelos/loginModelo.php";
}

class loginControlador extends loginModelo{
    public $contadorPaciente;
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


public function listar_cita($pagina = 1) {
    $registrosPorPagina = 10;
    $inicio = ($pagina - 1) * $registrosPorPagina;
    
    // 1. Primero contamos el total de registros sin LIMIT
    $consultaTotal = "SELECT COUNT(id_persona) as total FROM persona INNER JOIN discapacidad,etnia
        WHERE persona.id_discapacidad=discapacidad.id_discapacidad
        AND persona.id_etnia=etnia.id_etnia";
    
    $this->contadorPaciente = conexionModelo::ejecutar_consulta_simple($consultaTotal)->fetch()['total'];
    $totalPaginas = ceil($this->contadorPaciente / $registrosPorPagina);
    
    // 2. Consulta para obtener los datos de la página actual
    $consultaDatos = "SELECT * FROM persona INNER JOIN discapacidad,etnia
        WHERE persona.id_discapacidad=discapacidad.id_discapacidad
        AND persona.id_etnia=etnia.id_etnia
        LIMIT $inicio, $registrosPorPagina";
    
    $datos = conexionModelo::ejecutar_consulta_simple($consultaDatos)->fetchAll();
    
    // 3. Retornamos ambos conjuntos de datos
    return [
        'datos' => $datos,
        'paginacion' => [
            'totalRegistros' => $this->contadorPaciente,
            'totalPaginas' => $totalPaginas,
            'paginaActual' => $pagina,
            'registrosPorPagina' => $registrosPorPagina
        ]
    ];
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
              <i class="fas fa-ban"></i> Deshabilitar
           </button>'
        : '<button type="button" class="btn btn-success btn-sm btn-estado-habilitar" value="'.$id.'" title="Habilitar área">
              <i class="ti-check"></i> Habilitar
           </button>';
    
    // Botón de editar
    $btnEditar = '<button class="btn btn-info btn-sm btn-editar-area" data-id="'.$id.'"
     data-nombre="'.$nombre.'">
     <i class="fas fa-edit"></i> Editar
</button>';

    echo <<<HTML
    <tr>
        <td>{$id}</td>
        <td id="nombreEspecialidad">{$nombre}</td>
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
        ? '<button class="btn btn-danger btn-sm btn-desabilitar-dependecia" value="'.$id.'" title="Deshabilitar">
             <i class="fas fa-ban"></i> Deshabilitar
           </button>'
        : '<button class="btn btn-success btn-sm btn-habilitar-dependecia" value="'.$id.'" title="Habilitar">
             <i class="fas fa-check"></i> Habilitar
           </button>';
    
    $btnEditar = '<button class="btn btn-info btn-sm btn-editar-Dependencia" data-id="'.$id.'"
     data-nombre="'.$nombre.'">
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

