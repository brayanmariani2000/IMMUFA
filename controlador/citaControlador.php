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

    public function contar_cita_Pedidas_controlador(){
      $cont=0;
      $contar=citaModelo::contar_cita_modelo();
      if ($contar->rowCount()>0) {
          $contador=$contar->fetchAll();
          foreach($contador as $row){
           if ($row['condicion_id']==4) {
              $cont=$cont+1;
           }   
          }
      }
  return $cont;
  }
  public function contar_pacientes_controlador_total() {
    $resultado = citaModelo::contar_pacientes_modelo();
    return $resultado['total'];
}
  public function mostrar_citas($pagina = 1){
    $registrosPorPagina = 10; // Número de registros por página
    $inicio = ($pagina - 1) * $registrosPorPagina;
    
    // Obtener el total de citas
    $totalCitas = citaModelo::contar_citas_modelo_espera();
    $totalPaginas = ceil($totalCitas / $registrosPorPagina);
    
    // Obtener citas para la página actual
    $mostrar = citaModelo::mostrar_cita_modelo($inicio, $registrosPorPagina);
    
    $html = '';
    $contador = $inicio + 1;
    
    if ($mostrar->rowCount() > 0) {
        foreach ($mostrar->fetchAll() as $row) {
            $html .= '
            <tr>
                <td>'.$contador.'</td>
                <td>'.htmlspecialchars($row['nombre'].' '.$row['apellido']).'</td>
                <td>'.htmlspecialchars($row['cedula']).'</td>
                <td>'.htmlspecialchars($row['especialidad']).'</td>
                <td>'.htmlspecialchars($row['fecha_consulta']).'</td>
                <td>'.htmlspecialchars($row['dependencia']).'</td>
                <td>
                    <div style="display:flex;">
                        <button type="submit" class="btn btn-info" id="actualizar_cita" value="'.$row['id_cita'].'" style="margin:5px;">Actualizar Cita</button>
                    </div>
                </td>
            </tr>';
            $contador++;
        }
    } else {
        $html .= '<tr><td colspan="7" class="text-center">No hay citas registradas</td></tr>';
    }
    
    return [
        'html' => $html,
        'paginacion' => [
            'totalCitas' => $totalCitas,
            'totalPaginas' => $totalPaginas,
            'paginaActual' => $pagina,
            'registrosPorPagina' => $registrosPorPagina
        ]
    ];
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
    public function Historia_cita_controlador($pagina = 1) {
      $registrosPorPagina = 10;
      $inicio = ($pagina - 1) * $registrosPorPagina;
      
      $datos = citaModelo::historia_cita_modelo($inicio, $registrosPorPagina);
      $totalRegistros = citaModelo::contar_citas_modelo();
      $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
      
      $html = '';
      $contador = $inicio + 1;
      
      if ($datos->rowCount() > 0) {
          foreach ($datos->fetchAll() as $row) {
              $html .= '<tr>
                  <td>'.$contador.'</td>
                  <td>'.$row['Nombre_Paciente'].' '.$row['Apellido_Paciente'].'</td>
                  <td>'.$row['Cedula_Paciente'].'</td>
                  <td>'.$row['Especialidad'].'</td>
                  <td>'.$row['Nombre_Medico'].' '.$row['Apellido_Medico'].'</td>
                  <td>'.date('d/m/Y', strtotime($row['Fecha_Atencion'])).'</td>
                  <td>'.date('d/m/Y', strtotime($row['Fecha_Registro'])).'</td>
                  <td>'.$row['Nombre_Registrador'].' '.$row['Apellido_Registrador'].'</td>
              </tr>';
              $contador++;
          }
      } else {
          $html .= '<tr><td colspan="8" class="text-center">No hay registros</td></tr>';
      }
      
      return [
          'datos' => $html,
          'paginacion' => [
              'totalPaginas' => $totalPaginas,
              'paginaActual' => $pagina,
              'totalRegistros' => $totalRegistros
          ]
      ];
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

    public function cita_Especialidad($especialidad, $pagina = 1) {
      $brayan = 0;
      date_default_timezone_set('America/Caracas');
      $hoy = date('Y-m-d');
      
      // Configuración de paginación
      $registrosPorPagina = 17;
      $inicio = ($pagina - 1) * $registrosPorPagina;
      
      // Obtener citas paginadas
      $citas = citaModelo::citasEspecialidadModelos($especialidad, $hoy, $inicio, $registrosPorPagina);
      $lista = $citas->fetchAll();
      
      // Obtener total de registros para paginación
      $totalRegistros = citaModelo::contarCitasEspecialidad($especialidad, $hoy);
      $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
      
      // Generar HTML
      $html = '';
      foreach($lista as $row) {
          $brayan++;
          
          // Calcular la edad
          $fechaNacimiento = new DateTime($row['fecha_nacimiento']);
          $hoyObj = new DateTime();
          $edad = $fechaNacimiento->diff($hoyObj)->y;
          
          $html .= '<tr>
              <td>'.($brayan + $inicio).'</td>
              <td>'.htmlspecialchars($row['paciente'], ENT_QUOTES, 'UTF-8').'</td>
              <td>'.htmlspecialchars($row['cedula'], ENT_QUOTES, 'UTF-8').'</td>
              <td>'.htmlspecialchars($row['especialidad'], ENT_QUOTES, 'UTF-8').'</td>
              <td>'.date('d/m/Y', strtotime($row['fecha_consulta'])).'</td>
              <td>'.$edad.' años</td>
              <td>';
          
          if($row['id_condicion']==1) {
              $html .= '<span class="badge badge-info rounded-pill px-3 py-2">
                          <span class="text-white font-weight-bold">'.htmlspecialchars($row['condicion'], ENT_QUOTES, 'UTF-8').'</span>
                      </span>';
          } elseif($row['id_condicion']==2) {
              $html .= '<span class="badge bg-warning rounded-pill px-3 py-2">
                          <span class="text-white font-weight-bold">'.htmlspecialchars($row['condicion'], ENT_QUOTES, 'UTF-8').'</span>
                      </span>';
          } elseif($row['id_condicion']==3) {
              $html .= '<span class="badge bg-success rounded-pill px-3 py-2">
                          <span class="text-white font-weight-bold">'.htmlspecialchars($row['condicion'], ENT_QUOTES, 'UTF-8').'</span>
                      </span>';
          } elseif($row['id_condicion']==4) {
              $html .= '<span class="badge badge-danger rounded-pill px-3 py-2">
                          <span class="text-white font-weight-bold">'.htmlspecialchars($row['condicion'], ENT_QUOTES, 'UTF-8').'</span>
                      </span>';
          }
          
          $html .= '</td>
              <td>
                  <div style="display:flex;">
                      <button type="submit" class="btn btn-info" id="actualizar_cita" value="'.$row['id_cita'].'" style="margin:5px;">
                          <i class="fas fa-edit"></i> Actualizar
                      </button>
                  </div>
              </td>
          </tr>';
      }
      
      // Devolver toda la información necesaria
      return [
          'html' => $html,
          'totalRegistros' => $totalRegistros,
          'totalPaginas' => $totalPaginas,
          'paginaActual' => $pagina
      ];
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
    public function mostrar_citas_atendidas($pagina = 1){
      $registrosPorPagina = 10;
      $inicio = ($pagina - 1) * $registrosPorPagina;
      
      // Obtener el total de citas atendidas
      $totalCitas = citaModelo::contar_citas_modelo_atendidas();
      $totalPaginas = ceil($totalCitas / $registrosPorPagina);
      
      // Obtener citas atendidas para la página actual
      $mostrar = citaModelo::mostrar_cita_modelo_atendidas($inicio, $registrosPorPagina);
      
      $html = '';
      $contador = $inicio + 1;
      
      if ($mostrar->rowCount() > 0) {
          foreach ($mostrar->fetchAll() as $row) {
              $html .= '
              <tr>
                  <td class="text-center">'.$contador.'</td>
                  <td class="text-start">'.htmlspecialchars($row['nombre'].' '.$row['apellido']).'</td>
                  <td class="text-center">'.htmlspecialchars($row['cedula']).'</td>
                  <td class="text-start">'.htmlspecialchars($row['especialidad']).'</td>
                  <td class="text-center">'.htmlspecialchars($row['fecha_consulta']).'</td>
                  <td class="text-start">'.htmlspecialchars($row['dependencia']).'</td>
              </tr>';
              $contador++;
          }
      } else {
          $html .= '<tr><td colspan="6" class="text-center">No hay citas atendidas registradas</td></tr>';
      }
      
      return [
          'html' => $html,
          'paginacion' => [
              'totalCitas' => $totalCitas,
              'totalPaginas' => $totalPaginas,
              'paginaActual' => $pagina,
              'registrosPorPagina' => $registrosPorPagina
          ]
      ];
  }
  public function mostrar_citas_perdidas($pagina = 1){
    $registrosPorPagina = 10;
    $inicio = ($pagina - 1) * $registrosPorPagina;
    
    // Obtener el total de citas perdidas
    $totalCitas = citaModelo::contar_citas_modelo_perdidos();
    $totalPaginas = ceil($totalCitas / $registrosPorPagina);
    
    // Obtener citas perdidas para la página actual
    $mostrar = citaModelo::mostrar_cita_modelo_perdidos($inicio, $registrosPorPagina);
    
    $html = '';
    $contador = $inicio + 1;
    
    if ($mostrar->rowCount() > 0) {
        foreach ($mostrar->fetchAll() as $row) {
            $html .= '
            <tr>
                <td>'.$contador.'</td>
                <td>'.htmlspecialchars($row['nombre'].' '.$row['apellido']).'</td>
                <td>'.htmlspecialchars($row['cedula']).'</td>
                <td>'.htmlspecialchars($row['especialidad']).'</td>
                <td>'.htmlspecialchars($row['fecha_consulta']).'</td>
                <td>'.htmlspecialchars($row['dependencia']).'</td>
            </tr>';
            $contador++;
        }
    } else {
        $html .= '<tr><td colspan="6" class="text-center">No hay citas perdidas registradas</td></tr>';
    }
    
    return [
        'html' => $html,
        'paginacion' => [
            'totalCitas' => $totalCitas,
            'totalPaginas' => $totalPaginas,
            'paginaActual' => $pagina,
            'registrosPorPagina' => $registrosPorPagina
        ]
    ];
}
}