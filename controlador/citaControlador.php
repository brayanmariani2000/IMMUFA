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
                    
                    <button type="submit" class="btn btn-info"    id="actualizar"     value="<?php echo $row['id_cita']?>" style="margin:5px;">Actualizar Cita</button>
              
                    </div>
                    
                </td>
              </tr><?php
                    
                }
              }
            }
       }
}