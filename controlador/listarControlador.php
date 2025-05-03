<?php if ($peticionesAjax) {
    require_once "../modelos/listarModelo.php";
} else {
    require_once "./modelos/listarModelo.php";
}

class listarControlador extends listarModelo {
    public function listar_especialidades_card() {

        $sql=listarModelo::listar_especialidad();

          
    if($sql->rowCount()>0){
   
        $lista=$sql->fetchAll();
   
        foreach($lista as $row){
   
            echo ' 
                            <div class="col-md-3">
                                <form action="tablaEspecialidad" method="POST">
                                    <button type="submit" class="card bg-success p-20" style="width: 100%; border: none; cursor: pointer;">
                                        <div class="media widget-ten">
                                            <div class="media-left meida media-middle">
                                                <span><i class="ti-vector f-s-40"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2 class="color-white"></h2>
                                                <p class="m-b-0">'.$row['especialidad'].'</p>
                                            </div>
                                        </div>
                                    </button>
                                    <input type="hidden" name="id_especialidad" value="'.$row['id_especialidad'].'">
                                </form>
                            </div>
';

   
        }
   
    }

    }

public function listar_especialidad_controlador(){
   
    $sql=listarModelo::listar_especialidad();
   
    if($sql->rowCount()>0){
   
        $lista=$sql->fetchAll();
   
        foreach($lista as $row){
   
            echo '<option value="'.$row['id_especialidad'].'">'.$row['especialidad'].'</option>';

   
        }
   
    }

}


public function listar_etnias_controlador(){

    $sql=listarModelo::listar_etnias();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_etnia'].'">'.$row['etnias'].'</option>';


        }

    }

}


public function listar_discapacidad_controlador(){

    $sql=listarModelo::listar_discapacidad();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_discapacidad'].'">'.$row['discapacidades'].'</option>';


        }

    }

}



public function listar_municipio_controlador(){

    $sql=listarModelo::listar_municipio();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_municipio'].'">'.$row['municipio'].'</option>';

        }

    }

}


public function listar_parroquia_controlador(){

    $sql=listarModelo::listar_parroquia();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        $json=array();

        foreach($lista as $row){

            $json[]=array(

                'value'=>$row['id_parroquia'],

                'parroquias'=>$row['parroquias'],

                'municipio_id'=>$row['id_municipios']

            );

        }

    }

    $jason=json_encode($json);

    echo $jason;

}


public function listar_dependencias_controlador(){

    $sql=listarModelo::listar_dependencia();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_dependencia'].'">'.$row['dependencia'].'</option>';

        }

    }

}


public function listar_medico_controlador(){

    $sql=listarModelo::listar_medico();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id'].'">'.$row['nombre'].' '.$row['apellido'].'</option>';

        }

    }

}


public function listar_roles(){

    $sql=listarModelo::listar_roles_modelo();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_rol'].'">'.$row['roles'].'</option>';

        }

    }
}


public function listar_condicion(){

    $sql=listarModelo::listar_condicion_modelo();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_condicion'].'">'.$row['condicion'].'</option>';

        }

    }
}

}







class tablaControlador extends listarModelo{

    public function tabla_medico_controlador(){

        $sql=listarModelo::listar_medico();

        if($sql->rowCount()>0){

            $lista=$sql->fetchAll();

            foreach($lista as $row){

                    ?><tr>

                        <td><?php echo $row['nombre'].' '.$row['apellido']?></td>

                        <td><?php echo $row['especialidad']?></td>

                        <td><div style=" display: flex;">

                        <div style="margin:4px ;">

                        <button type="button" class="btn btn-danger btn-sm" value="<?php echo $row['id_medico']?>" id="eliminarMedico"><i class="fas fa-trash-alt"></i> Deshabilitar
</button>

                        <button class="btn btn-info btn-sm" value="<?php echo $row['id_medico']?>"  id="verMedicoModal"><i class="fa fa-eye"></i>Ver</button>

                        <div style="margin:4px ;">


                        </td>

                    </tr><?php
                        

                    }
    
                }
   
            }

   
            public function tabla_usuario_controlador(){
   
                $sql=listarModelo::tabla_usuario();
   
                if($sql->rowCount()>0){
   
                    $lista=$sql->fetchAll();
   
                    foreach($lista as $row){
                ?>

                <tr>

   
                    <td><?php echo $row['nombre'].' '.$row['apellido']?></td>

                    <td><?php echo $row['usuario']?></td>

                    <td><?php echo $row['roles']?></td>

                    <td><div style=" display: flex;">

                    <div style="margin:4px ;">

                    <button type="button" class="btn btn-danger btn-sm" value="<?php echo $row['id_usuario']?>" id="eliminarUsuario"><i class="fas fa-trash-alt"></i> Deshabilitar
</button>

                        <button class="btn btn-info btn-sm" value="<?php echo $row['id_usuario']?>"  id="verUsuarioBtn"><i class="fa fa-eye"></i>Ver</button>
                    </div>


                    </td>

                </tr>
                
                <?php
    
            }
        }
    }

    public function listar_distribucion_paciente_json_controlador(){

        $sql=listarModelo::listar_distribucion_paciente_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Estructura de datos para Chart.js
        $datos = [
            'labels' => array_column($resultados, 'municipio'),
            'datasets' => [[
                'label' => 'Personas por Municipio',
                'data' => array_column($resultados, 'total_pacientes'),
                'backgroundColor' => [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
                    '#8AC249', '#EA5F89', '#00BFFF', '#FFD700', '#32CD32', '#DA70D6'
                ]
            ]]
        ];
        
        echo json_encode($datos);

    }

    public function listar_genero_paciente_json_controlador(){

        $sql=listarModelo::listar_genero_paciente_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Estructura de datos para Chart.js
        $datos = [
            'generos' => array_column($resultados, 'genero'),
            'cantidades' => array_column($resultados, 'cantidad'),
            'colores' => ['#FF6384', '#36A2EB'] // Rosa para mujeres, Azul para hombres
        ];
        
        echo json_encode($datos);

    }

    public function listar_edades_paciente_json_controlador(){

        $sql=listarModelo::listar_edades_paciente_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Estructura de datos para Chart.js
        $datos = [
            'labels' => array_column($resultados, 'rango_edad'),
            'data' => array_column($resultados, 'cantidad_pacientes')
        ];
        
        echo json_encode($datos);

    }
    public function listar_citas_cantidad_especialidad_json_controlador(){

        $sql=listarModelo::listar_citas_especialidad_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        
        $datos = [];
        foreach ($resultados as $fila) {
            $datos[] = [
                'especialidad' => $fila['especialidad'],
                'cantidad' => $fila['cantidad_citas'],
            ];
        }
        
        echo json_encode($datos);

    }
    public function listar_citas_cantidad_dependencia_json_controlador(){

        $sql=listarModelo::listar_citas_dependencia_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        $colores = [
            'GOBERNACION' => 'bg-danger',
            'PSUV' => 'bg-primary',
            'COMUNIDAD' => 'bg-success',
            'ALIANZAS' => 'bg-warning',
            'SATIUSUM' => 'bg-info',
            // Agrega más dependencias según sea necesario
        ];
        
        $datos = [];
        foreach ($resultados as $fila) {
            $datos[] = [
                'dependencia' => $fila['Dependencia'],
                'cantidad' => $fila['Cantidad_Pacientes'],
                'color' => $colores[$fila['Dependencia']] ?? 'bg-secondary'
            ];
        }
        
        echo json_encode($datos);

    }
    public function listar_edades_paciente_tabla_controlador() {
        $sql = listarModelo::listar_edades_paciente_json_modelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'cantidad_pacientes'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaEdades">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Rango de Edad</th>
                        <th class="text-center">Cantidad de Pacientes</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['cantidad_pacientes'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['rango_edad']); ?></td>
                            <td class="text-center"><?php echo number_format($row['cantidad_pacientes'], 0); ?></td>
                            <td>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar <?php echo $color; ?>" 
                                         role="progressbar" 
                                         style="width: <?php echo $porcentaje; ?>%; font-weight: bold;"
                                         aria-valuenow="<?php echo $porcentaje; ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        <?php echo $porcentaje; ?>%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="table-info">
                        <td class="font-weight-bold text-right">Total:</td>
                        <td class="text-center font-weight-bold"><?php echo number_format($total, 0); ?></td>
                        <td class="font-weight-bold text-center">100%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    
    // Función auxiliar para asignar colores según el porcentaje
    public function listar_citas_cantidad_especialidad_tabla_controlador() {
        $sql = listarModelo::listar_citas_especialidad_json_modelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'cantidad_citas'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaEspecialidadesPdf">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Especialidad</th>
                        <th class="text-center">Cantidad de Citas</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['cantidad_citas'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['especialidad']); ?></td>
                            <td class="text-center"><?php echo number_format($row['cantidad_citas'], 0); ?></td>
                            <td>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar <?php echo $color; ?>" 
                                         role="progressbar" 
                                         style="width: <?php echo $porcentaje; ?>%; font-weight: bold;"
                                         aria-valuenow="<?php echo $porcentaje; ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        <?php echo $porcentaje; ?>%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="table-info">
                        <td class="font-weight-bold text-right">Total:</td>
                        <td class="text-center font-weight-bold"><?php echo number_format($total, 0); ?></td>
                        <td class="font-weight-bold text-center">100%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    
    // Función auxiliar para asignar colores según el porcentaje

    public function listar_citas_cantidad_dependecias_tabla_controlador() {
        $sql = listarModelo::citasdependeciasModelos();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'numero_pacientes'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaDependenciasPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Dependencia</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['numero_pacientes'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_dependencia']); ?></td>
                            <td class="text-center"><?php echo number_format($row['numero_pacientes'], 0); ?></td>
                            <td>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar <?php echo $color; ?>" 
                                         role="progressbar" 
                                         style="width: <?php echo $porcentaje; ?>%; font-weight: bold;"
                                         aria-valuenow="<?php echo $porcentaje; ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        <?php echo $porcentaje; ?>%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="table-info">
                        <td class="font-weight-bold text-right">Total:</td>
                        <td class="text-center font-weight-bold"><?php echo number_format($total, 0); ?></td>
                        <td class="font-weight-bold text-center">100%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    
    // Función auxiliar para asignar colores según el porcentaje (la misma que antes)
    
public function listar_citas_cantidad_dependecias_js_controlador_donus(){

    $sql=listarModelo::citasdependeciasModelos();

    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Procesar resultados
        $datos = [
            'labels' => array_column($resultados, 'nombre_dependencia'),
            'data' => array_column($resultados, 'numero_pacientes')
        ];
        echo json_encode($datos);
    }

    public function listarPacientesPorMunicipioTablaControlador() {
        $sql = listarModelo::pacientesPorMunicipioModelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'numero_pacientes'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaPacientesPorMunicipioPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Municipio</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['numero_pacientes'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_municipio']); ?></td>
                            <td class="text-center"><?php echo number_format($row['numero_pacientes'], 0); ?></td>
                            <td>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar <?php echo $color; ?>" 
                                         role="progressbar" 
                                         style="width: <?php echo $porcentaje; ?>%; font-weight: bold;"
                                         aria-valuenow="<?php echo $porcentaje; ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        <?php echo $porcentaje; ?>%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="table-info">
                        <td class="font-weight-bold text-right">Total:</td>
                        <td class="text-center font-weight-bold"><?php echo number_format($total, 0); ?></td>
                        <td class="font-weight-bold text-center">100%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    
    // Función auxiliar para asignar colores según el porcentaje
    private function getColorForPercentage($percentage) {
        if ($percentage > 50) return 'bg-success';
        if ($percentage > 25) return 'bg-primary';
        if ($percentage > 10) return 'bg-info';
        if ($percentage > 5) return 'bg-warning';
        return 'bg-danger';
    }


    public function generarJsonMunicipiosDonutControlador() {
        $sql = listarModelo::pacientesPorMunicipioModelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $datosGrafico = [
            'labels' => [],
            'datasets' => [
                [
                    'data' => [],
                    'backgroundColor' => [],
                    'hoverBackgroundColor' => [],
                    'borderWidth' => 1
                ]
            ]
        ];
        
        // Colores consistentes con los de la tabla
        $colores = [
            '#28a745', // verde (success)
            '#007bff', // azul (primary)
            '#17a2b8', // cyan (info)
            '#ffc107', // amarillo (warning)
            '#dc3545', // rojo (danger)
            '#6c757d', // gris
            '#6610f2', // morado
            '#fd7e14', // naranja
            '#20c997', // verde agua
            '#e83e8c'  // rosa
        ];
        
        foreach($resultados as $index => $row) {
            $datosGrafico['labels'][] = $row['nombre_municipio'] . ' ('.$row['numero_pacientes'].')';
            $datosGrafico['datasets'][0]['data'][] = $row['numero_pacientes'];
            
            // Asignar color consistente
            $colorIndex = $index % count($colores);
            $datosGrafico['datasets'][0]['backgroundColor'][] = $colores[$colorIndex];
            $datosGrafico['datasets'][0]['hoverBackgroundColor'][] = $this->adjustBrightness($colores[$colorIndex], -20);
        }
        
        // Devolver JSON
        echo json_encode($datosGrafico);
        exit();
    }
    
    // Función para ajustar brillo del color (hover)
    private function adjustBrightness($hex, $steps) {
        $steps = max(-255, min(255, $steps));
        $hex = str_replace('#', '', $hex);
        
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
        }
        
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
        
        $r = max(0, min(255, $r + $steps));
        $g = max(0, min(255, $g + $steps));
        $b = max(0, min(255, $b + $steps));
        
        return '#'.str_pad(dechex($r), 2, '0', STR_PAD_LEFT)
                  .str_pad(dechex($g), 2, '0', STR_PAD_LEFT)
                  .str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
    }

    public function listar_citas_diarias_por_especialidad_json_controlador() {
        // Obtener la fecha actual en formato YYYY-MM-DD
        $fechaActual = date('Y-m-d');
        
        // Consulta SQL modificada para filtrar por fecha
        $sql = listarModelo::listar_citas_diarias_especialidad_modelo($fechaActual);
        
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $datos = [];
        foreach ($resultados as $fila) {
            $datos[] = [
                'especialidad' => $fila['especialidad'],
                'cantidad' => (int)$fila['cantidad_citas'], // Convertir a entero
                'fecha' => $fechaActual // Agregar la fecha como referencia
            ];
        }
        
        // Encabezados para respuesta JSON
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'data' => $datos,
            'total' => count($datos),
            'fecha_consulta' => $fechaActual
        ]);
    }

}