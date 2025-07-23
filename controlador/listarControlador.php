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
            if($row['status']==1){
   
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

    }
    public function listar_especialidades_card2() {

        $sql=listarModelo::listar_especialidad();

          
    if($sql->rowCount()>0){
   
        $lista=$sql->fetchAll();
   
        foreach($lista as $row){
            if($row['status']==1){
   
            echo ' 
                           <div class="col s12 m4">
                        <div class="card hoverable z-depth-2">
                            <div class="card-content">
                                <span class="card-title blue-text text-darken-2" style="font-weight: 300;">
                                    <i class="material-icons left"></i>'.$row['especialidad'].'
                                </span>
                            </div>
                        </div>
                    </div>
';
}
   
        }
   
    }

    }

public function listar_especialidad_controlador(){
   
    $sql=listarModelo::listar_especialidad();
   
    if($sql->rowCount()>0){
   
        $lista=$sql->fetchAll();
   
        foreach($lista as $row){
            if($row['status']==1)
   
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

public function listar_discapacidad_controlador_tabla(){
    $con=0;
    $sql=listarModelo::listar_discapacidad();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){
            $con++;

          echo '<tr>
                <td>'.$con.'</td>
                <td>'.$row['discapacidades'].'</td>
                <td>   
                    <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning btn-sm btn-editar-discapacidad" value="'. $row['id_discapacidad'].' "
                                data-id="'. $row['id_discapacidad'].'" 
                                data-nombre="'.$row['discapacidades'].'">
                                <i class="fas fa-edit"></i> Actualizar
                            </button>
                        </div>
                </td>
                </tr>';


        }

    }
}

public function listar_etnia_controlador_tabla(){
    $con=0;
    $sql=listarModelo::listar_etnias();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){
            $con++;

          echo '<tr>
                <td>'.$con.'</td>
                <td>'.$row['etnias'].'</td>
                <td>   
                    <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning btn-sm " value="" id="actualizarEtnia"  
                                 data-id="'. $row['id_etnia'].'" 
                                data-nombre="'.$row['etnias'].'">
                                <i class="fas fa-edit"></i> Actualizar
                            </button>
                </td>
                </tr>';


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

            if($row['status']==1){

            echo '<option value="'.$row['id_dependencia'].'">'.$row['dependencia'].'</option>';
            }
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

    public function tabla_medico_controlador() {
        $sql = listarModelo::listar_medico();
        
        if($sql->rowCount() > 0) {
            $lista = $sql->fetchAll();
            foreach($lista as $row) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nombre'].' '.$row['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($row['especialidad']); ?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-info btn-sm" value="<?php echo $row['id_medico']; ?>" id="verMedicoModal">
                                <i class="fa fa-eye"></i> Ver
                            </button>
                            <button type="button" class="btn btn-warning btn-sm actualizarMedico" value="<?php echo $row['id_medico']; ?>" id="actualizarMedico">
                                <i class="fas fa-edit"></i> Actualizar
                            </button>
                            <?php 
                            if($row['estado']==1){
                            echo '<button type="button" class="btn btn-danger btn-sm" value="'. $row['id_medico'].'" id="eliminarMedico">
                                <i class="fas fa-ban mr-1"></i>Deshbilitar
                                </button>';
                            }else{
                            echo '<button type="button" class="btn btn-info btn-sm" value="'. $row['id_medico'].'" id="habilitarMedico">
                                <i class="fas fa-chek mr-1"></i> habilitar
                            </button>';
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <?php
            }
        }
    }
    public function tabla_usuario_controlador() {
        $sql = listarModelo::tabla_usuario();    
        if($sql->rowCount() > 0) {
            $lista = $sql->fetchAll();
            foreach($lista as $row) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nombre'].' '.$row['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                    <td><?php echo htmlspecialchars($row['roles']); ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="User actions">
                            <button type="button" class="btn btn-info btn-sm" value="<?php echo $row['id_usuario']; ?>" id="verUsuarioBtn">
                                <i class="fas fa-eye mr-1"></i> Ver
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" value="<?php echo $row['id_usuario']; ?>" id="actualizarUsuarioBtn">
                                <i class="fas fa-edit mr-1"></i> Actualizar
                            </button>
                            <?php if($row['status']==1){
                            echo '<button type="button" class="btn btn-danger btn-sm" value="'. $row['id_usuario'].'" id="eliminarUsuario">
                                <i class="fas fa-ban mr-1"></i> Deshabilitar
                            </button>';}else{
                                echo '<button type="button" class="btn btn-info btn-sm" value="'. $row['id_usuario'].'" id="habilitarUsuario">
                                <i class="fas fa-chek mr-1"></i> habilitar
                            </button>';
                            }?>
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
            'data' => array_column($resultados, 'total_pacientes')
        ];
        
        echo json_encode($datos);

    }
    public function listar_citas_cantidad_especialidad_json_controlador() {
        $sql = listarModelo::listar_citas_especialidad_json_modelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Paleta de 20 colores Bootstrap para las especialidades
        $colores = [
            'bg-primary',
            'bg-secondary',
            'bg-success',
            'bg-danger',
            'bg-warning',
            'bg-info',
            'bg-dark',
            'bg-light',
            'bg-indigo',
            'bg-navy',
            'bg-purple',
            'bg-fuchsia',
            'bg-pink',
            'bg-maroon',
            'bg-orange',
            'bg-lime',
            'bg-teal',
            'bg-olive',
            'bg-cyan',
            'bg-gray'
        ];
        
        // Si necesitas colores específicos para algunas especialidades conocidas
        $coloresEspeciales = [
            'CARDIOLOGÍA' => 'bg-danger',
            'PEDIATRÍA' => 'bg-info',
            'TRAUMATOLOGÍA' => 'bg-warning',
            'DERMATOLOGÍA' => 'bg-success',
            'GINECOLOGÍA' => 'bg-pink',
            // Agrega más mapeos específicos si es necesario
        ];
        
        $datos = [];
        $indiceColor = 0;
        
        foreach ($resultados as $fila) {
            // Verifica si la especialidad tiene un color asignado específicamente
            if (isset($coloresEspeciales[$fila['especialidad']])) {
                $color = $coloresEspeciales[$fila['especialidad']];
            } else {
                // Asigna un color de la paleta general de forma circular
                $color = $colores[$indiceColor % count($colores)];
                $indiceColor++;
            }
            
            $datos[] = [
                'especialidad' => $fila['especialidad'],
                'cantidad' => $fila['cantidad_citas'],
                'color' => $color
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
        $total = array_sum(array_column($resultados, 'total_pacientes'));
        
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
                        $porcentaje = ($total > 0) ? round(($row['total_pacientes'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['rango_edad']); ?></td>
                            <td class="text-center"><?php echo number_format($row['total_pacientes'], 0); ?></td>
                            <td>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar <?php echo $color; ?>" 
                                         role="progressbar" 
                                         style="width: 100%; font-weight: bold;"
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
                                         style="width: 100%; font-weight: bold;"
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
                        <th class="text-center">Cantidad de Citas</th>
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
                                         style="width: 100%; font-weight: bold;"
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
        $total = array_sum(array_column($resultados, 'numero_pacientes_atendidos'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaPacientesPorMunicipioPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Municipio</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['numero_pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_municipio']); ?></td>
                            <td class="text-center text-dark"><?php echo number_format($row['numero_pacientes_atendidos'], 0); ?></td>
                            <td>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar <?php echo $color; ?>" 
                                         role="progressbar" 
                                         style="width: 100%; font-weight: bold;"
                                         aria-valuenow="<?php echo $porcentaje; ?>" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        <?php echo $porcentaje; ?>%
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">

                                <form action="Reporetesmunicipio" method="post" style="display: inline;">
                                    <input type="hidden" name="id_municipio" value="<?php echo $row['id_municipio']; ?>">
                                    <button type="submit" class="btn btn-info btn-sm" title="Ver detalles del municipio">
                                        <i class="fa fa-eye"></i> Ver
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="table-info">
                        <td class="font-weight-bold text-right">Total:</td>
                        <td class="text-center font-weight-bold"><?php echo number_format($total, 0); ?></td>
                        <td class="font-weight-bold text-center">100%</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
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
            $datosGrafico['labels'][] = $row['nombre_municipio'] . ' ('.$row['numero_pacientes_atendidos'].')';
            $datosGrafico['datasets'][0]['data'][] = $row['numero_pacientes_atendidos'];
            
            // Asignar color consistente
            $colorIndex = $index % count($colores);
            $datosGrafico['datasets'][0]['backgroundColor'][] = $colores[$colorIndex];
            $datosGrafico['datasets'][0]['hoverBackgroundColor'][] = $this->adjustBrightness($colores[$colorIndex], -20);
        }
        
        // Devolver JSON
        echo json_encode($datosGrafico);
        exit();
    }
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
    public function listarPacientesPorEtniaTablaControlador() {
        $sql = listarModelo::pacientesPorEtniaModelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'numero_pacientes'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaPacientesPorEtniaPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Etnia</th>
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
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_etnia']); ?></td>
                            <td class="text-center text-dark"><?php echo number_format($row['numero_pacientes'], 0); ?></td>
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
    public function listarPacientesPorDiscapacidadTablaControlador() {
        $sql = listarModelo::pacientesPorDiscapacidadModelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaPacientesPorDiscapacidadPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Tipo de Discapacidad</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['tipo_discapacidad']); ?></td>
                            <td class="text-center text-dark"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
    public function generarJsonDiscapacidadDonutControlador() {
        $sql = listarModelo::pacientesPorDiscapacidadModelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $datosGrafico = [
            'labels' => [],
            'datasets' => [
                [
                    'data' => [],
                    'backgroundColor' => [],
                    'hoverBackgroundColor' => [],
                    'borderWidth' => 1,
                    'borderColor' => '#fff'
                ]
            ]
        ];
        
        // Colores consistentes con los de Bootstrap
        $colores = [
            '#28a745', // verde (success)
            '#007bff', // azul (primary)
            '#17a2b8', // cyan (info)
            '#ffc107', // amarillo (warning)
            '#dc3545', // rojo (danger)
            '#6c757d', // gris (secondary)
            '#6610f2', // morado (indigo)
            '#fd7e14', // naranja
            '#20c997', // verde agua (teal)
            '#e83e8c'  // rosa (pink)
        ];
        
        foreach($resultados as $index => $row) {
            $datosGrafico['labels'][] = $row['tipo_discapacidad'] . ' ('.$row['pacientes_atendidos'].')';
            $datosGrafico['datasets'][0]['data'][] = $row['pacientes_atendidos'];
            
            // Asignar color consistente
            $colorIndex = $index % count($colores);
            $datosGrafico['datasets'][0]['backgroundColor'][] = $colores[$colorIndex];
            $datosGrafico['datasets'][0]['hoverBackgroundColor'][] = $this->adjustBrightness($colores[$colorIndex], -20);
        }
        
        // Agregar opciones para tooltips
        $datosGrafico['options'] = [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'right',
                    'labels' => [
                        'boxWidth' => 15,
                        'padding' => 15,
                        'usePointStyle' => true
                    ]
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) {
                            let label = context.label || "";
                            let value = context.raw || 0;
                            let total = context.dataset.data.reduce((a, b) => a + b, 0);
                            let percentage = Math.round((value / total) * 100);
                            return label + ": " + value + " (" + percentage + "%)";
                        }'
                    ]
                ]
            ],
            'cutout' => '70%'
        ];
        
        // Devolver JSON
        header('Content-Type: application/json');
        echo json_encode($datosGrafico);
        exit();
    }
    public function generarJsonEtniaDonutControlador() {
        $sql = listarModelo::pacientesPorEtniaModelo();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $datosGrafico = [
            'labels' => [],
            'datasets' => [
                [
                    'data' => [],
                    'backgroundColor' => [],
                    'hoverBackgroundColor' => [],
                    'borderWidth' => 1,
                    'borderColor' => '#fff'
                ]
            ]
        ];
        
        // Paleta de colores para etnias (puedes personalizarla)
        $colores = [
            '#4e73df', // azul
            '#1cc88a', // verde
            '#36b9cc', // turquesa
            '#f6c23e', // amarillo
            '#e74a3b', // rojo
            '#858796', // gris
            '#5a5c69', // gris oscuro
            '#3a3b45', // gris más oscuro
            '#2e59d9', // azul oscuro
            '#17a673', // verde oscuro
            '#2c9faf', // azul-verde
            '#dda20a'  // amarillo oscuro
        ];
        
        foreach($resultados as $index => $row) {
            $datosGrafico['labels'][] = $row['nombre_etnia'] . ' ('.$row['numero_pacientes'].')';
            $datosGrafico['datasets'][0]['data'][] = $row['numero_pacientes'];
            
            // Asignar color consistente
            $colorIndex = $index % count($colores);
            $datosGrafico['datasets'][0]['backgroundColor'][] = $colores[$colorIndex];
            $datosGrafico['datasets'][0]['hoverBackgroundColor'][] = $this->adjustBrightness($colores[$colorIndex], -20);
        }
        
        // Configuración del gráfico
        $datosGrafico['options'] = [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'right',
                    'labels' => [
                        'boxWidth' => 15,
                        'padding' => 15,
                        'usePointStyle' => true,
                        'font' => [
                            'size' => 12
                        ]
                    ]
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) {
                            let label = context.label.split(" (")[0] || "";
                            let value = context.raw || 0;
                            let total = context.dataset.data.reduce((a, b) => a + b, 0);
                            let percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} pacientes (${percentage}%)`;
                        }'
                    ]
                ]
            ],
            'cutout' => '65%',
            'animation' => [
                'animateScale' => true,
                'animateRotate' => true
            ]
        ];
        
        // Devolver JSON
        header('Content-Type: application/json');
        echo json_encode($datosGrafico);
        exit();
    }
    public function listar_citas_cantidad_dependecias_tabla_controlador_fechas() {
        // Obtener fechas del filtro si existen
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        
        // Llamar al modelo con las fechas
        $sql = listarModelo::citasdependeciasModelosFechas($fechaInicio, $fechaFin);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
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
                        $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['dependencia']); ?></td>
                            <td class="text-center"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
    public function listarPacientesDiscapacidadTablaControlador_fechas() {
        // Obtener fechas del filtro si existen
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        
        // Llamar al modelo con las fechas
        $sql = listarModelo::pacientesDiscapacidadModeloFechas($fechaInicio, $fechaFin);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaPacientesPorDiscapacidadPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Tipo de Discapacidad</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['tipo_discapacidad']); ?></td>
                            <td class="text-center"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
    public function listarPacientesEtniaTablaControlador_fechas() {
        // Obtener fechas del filtro si existen
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        
        // Llamar al modelo con las fechas
        $sql = listarModelo::pacientesEtniaModeloFechas($fechaInicio, $fechaFin);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaPacientesPorEtniaPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Grupo Étnico</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['tipo_etnia']); ?></td>
                            <td class="text-center"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
    public function listarPacientesEdadTablaControlador_fechas() {
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        
        // Llamar al modelo con las fechas
        $sql = listarModelo::pacientesEdadModeloFechas($fechaInicio, $fechaFin);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaEdades">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Grupo de Edad</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['grupo_edad']); ?></td>
                            <td class="text-center"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
    public function listarPacientesEspecialidadTablaControlador_fechas() {
                
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        
        // Llamar al modelo con las fechas
        $sql = listarModelo::pacientesEspecialidadModeloFechas($fechaInicio, $fechaFin);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaEspecialidadesPdf">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Especialidad Médica</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 40%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($resultados as $row) {
                        $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_especialidad']); ?></td>
                            <td class="text-center"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
    public function listarPacientesMunicipioTablaControlador_fechas() {
        // Obtener fechas del filtro si existen
        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        
        // Llamar al modelo con las fechas
        $sql = listarModelo::pacientesMunicipioModeloFechas($fechaInicio, $fechaFin);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
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
                        $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                        $color = $this->getColorForPercentage($porcentaje);
                        ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_municipio']); ?></td>
                            <td class="text-center"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
    public function listarPacientesParroquiaTablaControlador_fechas() {

        $fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : null;
        $fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : null;
        
        // Llamar al modelo con las fechas
        $sql = listarModelo::pacientesParroquiaModeloFechas($fechaInicio, $fechaFin);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'pacientes_atendidos'));
        
        // Agrupar por municipio para mejor visualización
        $datosAgrupados = [];
        foreach($resultados as $row) {
            $datosAgrupados[$row['nombre_municipio']][] = $row;
        }
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablaParroquiaPDF">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Municipio</th>
                        <th class="text-center">Parroquia</th>
                        <th class="text-center">Pacientes Atendidos</th>
                        <th class="text-center" style="width: 30%;">Distribución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($datosAgrupados as $municipio => $parroquias) {
                        $rowspan = count($parroquias);
                        $firstRow = true;
                        
                        foreach($parroquias as $index => $row) {
                            $porcentaje = ($total > 0) ? round(($row['pacientes_atendidos'] / $total) * 100, 2) : 0;
                            $color = $this->getColorForPercentage($porcentaje);
                            ?>
                            <tr>
                                <?php if($firstRow): ?>
                                    <td class="font-weight-bold align-middle" rowspan="<?php echo $rowspan; ?>">
                                        <?php echo htmlspecialchars($municipio); ?>
                                    </td>
                                <?php endif; ?>
                                <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_parroquia']); ?></td>
                                <td class="text-center"><?php echo number_format($row['pacientes_atendidos'], 0); ?></td>
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
                            $firstRow = false;
                        }
                    }
                    ?>
                    <tr class="table-info">
                        <td class="font-weight-bold text-right" colspan="2">Total:</td>
                        <td class="text-center font-weight-bold"><?php echo number_format($total, 0); ?></td>
                        <td class="font-weight-bold text-center">100%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    public function listarPacientesPorParroquiaTablaControladorRecibir() {
        // Obtener el ID del municipio desde POST
        $id_municipio = isset($_POST['id_municipio']) ? $_POST['id_municipio'] : null;
        
        if(!$id_municipio) {
            echo '<div class="alert alert-danger">No se ha especificado un municipio</div>';
            return;
        }
        
        // Obtener el nombre del municipio para el título
        $sql_municipio = conexionModelo::conectar()->prepare("SELECT municipio FROM municipios WHERE id_municipio = :id_municipio");
        $sql_municipio->bindParam(":id_municipio", $id_municipio, PDO::PARAM_INT);
        $sql_municipio->execute();
        $nombre_municipio = $sql_municipio->fetchColumn();
        
        // Consultar pacientes por parroquia
        $sql = listarModelo::pacientesPorParroquiaModelo($id_municipio);
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        // Calcular total para porcentajes
        $total = array_sum(array_column($resultados, 'numero_pacientes'));
        
        // Estructura de la tabla con estilos mejorados
        ?>
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Distribución de Pacientes por Parroquias - <?php echo htmlspecialchars($nombre_municipio); ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablaPacientesPorParroquiaPDF">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Parroquia</th>
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
                                    <td class="font-weight-bold"><?php echo htmlspecialchars($row['nombre_parroquia']); ?></td>
                                    <td class="text-center text-dark"><?php echo number_format($row['numero_pacientes'], 0); ?></td>
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
            </div>
        </div>
        <?php
    }
    public function mostrarReporteConsolidadoControlador() {
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary text-white">
                            <h6 class="m-0 font-weight-bold">Reporte Consolidado de Citas Médicas</h6>
                        </div>
                        <div class="card-body" id="reporteConsolidado">
                            <!-- Sección Discapacidades -->
                            <h4 class="text-primary mb-3">Pacientes por Discapacidad</h4>
                            <div class="table-responsive mb-4">
                            <?php
                            $sql = listarModelo::pacientesPorDiscapacidadModelo();
                            $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
                            $total = array_sum(array_column($resultados, 'numero_pacientes'));
                            ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tablaPacientesPorDiscapacidadPDF">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">Tipo de Discapacidad</th>
                                            <th class="text-center">Pacientes Atendidos</th>
                                            <th class="text-center" style="width: 40%;">Distribución</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($resultados as $row): 
                                            $porcentaje = ($total > 0) ? round(($row['numero_pacientes'] / $total) * 100, 2) : 0;
                                            $color = $this->getColorForPercentage($porcentaje);
                                        ?>
                                        <tr>
                                            <td class="font-weight-bold"><?= htmlspecialchars($row['tipo_discapacidad']) ?></td>
                                            <td class="text-center text-dark"><?= number_format($row['pacientes_atendidos'], 0) ?></td>
                                            <td>
                                                <div class="progress" style="height: 25px;">
                                                    <div class="progress-bar <?= $color ?>" 
                                                         role="progressbar" 
                                                         style="width: <?= $porcentaje ?>%; font-weight: bold;"
                                                         aria-valuenow="<?= $porcentaje ?>" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        <?= $porcentaje ?>%
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-info">
                                            <td class="font-weight-bold text-right">Total:</td>
                                            <td class="text-center font-weight-bold"><?= number_format($total, 0) ?></td>
                                            <td class="font-weight-bold text-center">100%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                            <!-- Sección Edades -->
                            <h4 class="text-primary mb-3">Pacientes por Rango de Edad</h4>
                            <div class="table-responsive mb-4">
                            <?php
                            $sql = listarModelo::listar_edades_paciente_json_modelo();
                            $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
                            $total = array_sum(array_column($resultados, 'total_pacientes'));
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
                                        <?php foreach($resultados as $row): 
                                            $porcentaje = ($total > 0) ? round(($row['total_pacientes'] / $total) * 100, 2) : 0;
                                            $color = $this->getColorForPercentage($porcentaje);
                                        ?>
                                        <tr>
                                            <td class="font-weight-bold"><?= htmlspecialchars($row['rango_edad']) ?></td>
                                            <td class="text-center"><?= number_format($row['total_pacientes'], 0) ?></td>
                                            <td>
                                                <div class="progress" style="height: 25px;">
                                                    <div class="progress-bar <?= $color ?>" 
                                                         role="progressbar" 
                                                         style="width: 100%; font-weight: bold;"
                                                         aria-valuenow="<?= $porcentaje ?>" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        <?= $porcentaje ?>%
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-info">
                                            <td class="font-weight-bold text-right">Total:</td>
                                            <td class="text-center font-weight-bold"><?= number_format($total, 0) ?></td>
                                            <td class="font-weight-bold text-center">100%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                            <!-- Sección Municipios -->
                            <h4 class="text-primary mb-3">Pacientes por Municipio</h4>
                            <div class="table-responsive mb-4">
                            <?php
                            $sql = listarModelo::pacientesPorMunicipioModelo();
                            $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
                            $total = array_sum(array_column($resultados, 'numero_pacientes_atendidos'));
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
                                        <?php foreach($resultados as $row): 
                                            $porcentaje = ($total > 0) ? round(($row['numero_pacientes_atendidos'] / $total) * 100, 2) : 0;
                                            $color = $this->getColorForPercentage($porcentaje);
                                        ?>
                                        <tr>
                                            <td class="font-weight-bold"><?= htmlspecialchars($row['nombre_municipio']) ?></td>
                                            <td class="text-center text-dark"><?= number_format($row['numero_pacientes_atendidos'], 0) ?></td>
                                            <td>
                                                <div class="progress" style="height: 25px;">
                                                    <div class="progress-bar <?= $color ?>" 
                                                         role="progressbar" 
                                                         style="width: 100%; font-weight: bold;"
                                                         aria-valuenow="<?= $porcentaje ?>" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        <?= $porcentaje ?>%
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-info">
                                            <td class="font-weight-bold text-right">Total:</td>
                                            <td class="text-center font-weight-bold"><?= number_format($total, 0) ?></td>
                                            <td class="font-weight-bold text-center">100%</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                            <!-- Sección Especialidades -->
                            <h4 class="text-primary mb-3">Citas por Especialidad</h4>
                            <div class="table-responsive mb-4">
                            <?php
                            $sql = listarModelo::listar_citas_especialidad_json_modelo();
                            $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
                            $total = array_sum(array_column($resultados, 'cantidad_citas'));
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
                                        <?php foreach($resultados as $row): 
                                            $porcentaje = ($total > 0) ? round(($row['cantidad_citas'] / $total) * 100, 2) : 0;
                                            $color = $this->getColorForPercentage($porcentaje);
                                        ?>
                                        <tr>
                                            <td class="font-weight-bold"><?= htmlspecialchars($row['especialidad']) ?></td>
                                            <td class="text-center"><?= number_format($row['cantidad_citas'], 0) ?></td>
                                            <td>
                                                <div class="progress" style="height: 25px;">
                                                    <div class="progress-bar <?= $color ?>" 
                                                         role="progressbar" 
                                                         style="width: 100%; font-weight: bold;"
                                                         aria-valuenow="<?= $porcentaje ?>" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        <?= $porcentaje ?>%
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-info">
                                            <td class="font-weight-bold text-right">Total:</td>
                                            <td class="text-center font-weight-bold"><?= number_format($total, 0) ?></td>
                                            <td class="font-weight-bold text-center">100%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                            <!-- Sección Dependencias -->
                            <h4 class="text-primary mb-3">Citas por Dependencia</h4>
                            <div class="table-responsive">
                            <?php
                            $sql = listarModelo::citasdependeciasModelos();
                            $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
                            $total = array_sum(array_column($resultados, 'numero_pacientes'));
                            ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tablaDependenciasPDF">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">Dependencia</th>
                                            <th class="text-center">Cantidad de Citas</th>
                                            <th class="text-center" style="width: 40%;">Distribución</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($resultados as $row): 
                                            $porcentaje = ($total > 0) ? round(($row['numero_pacientes'] / $total) * 100, 2) : 0;
                                            $color = $this->getColorForPercentage($porcentaje);
                                        ?>
                                        <tr>
                                            <td class="font-weight-bold"><?= htmlspecialchars($row['nombre_dependencia']) ?></td>
                                            <td class="text-center"><?= number_format($row['numero_pacientes'], 0) ?></td>
                                            <td>
                                                <div class="progress" style="height: 25px;">
                                                    <div class="progress-bar <?= $color ?>" 
                                                         role="progressbar" 
                                                         style="width: 100%; font-weight: bold;"
                                                         aria-valuenow="<?= $porcentaje ?>" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        <?= $porcentaje ?>%
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-info">
                                            <td class="font-weight-bold text-right">Total:</td>
                                            <td class="text-center font-weight-bold"><?= number_format($total, 0) ?></td>
                                            <td class="font-weight-bold text-center">100%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    public function mostrarReporteConsolidadoControladorfechas(){
        $this->listar_citas_cantidad_dependecias_tabla_controlador_fechas();
        $this->listarPacientesDiscapacidadTablaControlador_fechas();
        $this->listarPacientesEtniaTablaControlador_fechas();
        $this->listarPacientesEdadTablaControlador_fechas();
        $this->listarPacientesEspecialidadTablaControlador_fechas();
        $this->listarPacientesMunicipioTablaControlador_fechas();

    }

}

